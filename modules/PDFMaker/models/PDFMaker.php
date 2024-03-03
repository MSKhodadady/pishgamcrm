<?php
class PDFMaker_PDFMaker_Model extends Vtiger_Module_Model {
    private $version_type = "Free";
    private $version_no;
    private $basicModules;
    private $pageFormats;
    var $log;
    var $db;
    function __construct() {
        PDFMaker_Debugger_Model::GetInstance()->Init();
        $this->log = LoggerManager::getLogger('account');
        $this->db = PearDatabase::getInstance();
        $this->basicModules = array("20", "21", "22", "23");
        $this->name = 'PDFMaker';
        $this->id = getTabId('PDFMaker');
        $_SESSION['KCFINDER']['uploadURL'] = 'test/upload';
        $_SESSION['KCFINDER']['uploadDir'] = '../test/upload';
    }
    public function GetVersionType() {
        return $this->version_type;
    }
    public function GetPageFormats() {
        return $this->pageFormats;
    }
    public function GetBasicModules() {
        return $this->basicModules;
    }
    public function GetListviewData() {
        $R_Atr = array('Invoice', 'Quotes', 'SalesOrder', 'PurchaseOrder');
        $sql = 'SELECT vtiger_pdfmaker.templateid, vtiger_pdfmaker.description, vtiger_pdfmaker.module
                FROM vtiger_pdfmaker LEFT JOIN vtiger_pdfmaker_settings USING(templateid) WHERE module IN (?, ?, ?, ?)';
        $result = $this->db->pquery($sql, $R_Atr);
        $return_data = Array();
        $num_rows = $this->db->num_rows($result);
        for ($i = 0;$i < $num_rows;$i++) {
            $currModule = $this->db->query_result($result, $i, 'module');
            $templateid = $this->db->query_result($result, $i, 'templateid');
            $pdftemplatearray = array();
            $pdftemplatearray['templateid'] = $templateid;
            $pdftemplatearray['description'] = $this->db->query_result($result, $i, 'description');
            $pdftemplatearray['module'] = vtranslate($currModule, $currModule);
            $pdftemplatearray['edit'] = '<li><a href="index.php?module=PDFMaker&view=EditFree&return_view=List&templateid=' . $templateid . '">' . vtranslate('LBL_EDIT', $MODULE) . '</a></li>';
            $return_data[] = $pdftemplatearray;
        }
        return $return_data;
    }
    public function GetDetailViewData($templateid) {
        $R_Atr = array($templateid, 'SalesOrder', 'Invoice', 'Quotes', 'PurchaseOrder');
        $sql = 'SELECT vtiger_pdfmaker.*, vtiger_pdfmaker_settings.*
			FROM vtiger_pdfmaker
                        LEFT JOIN vtiger_pdfmaker_settings USING(templateid)
			WHERE vtiger_pdfmaker.templateid=? AND vtiger_pdfmaker.module IN (?, ?, ?, ?)';
        $result = $this->db->pquery($sql, $R_Atr);
        $pdftemplateResult = $this->db->fetch_array($result);
        $pdftemplateResult['templateid'] = $templateid;
        return $pdftemplateResult;
    }
    public function GetEditViewData($templateid) {
        $sql = 'SELECT vtiger_pdfmaker.*, vtiger_pdfmaker_settings.*
    			FROM vtiger_pdfmaker
    			LEFT JOIN vtiger_pdfmaker_settings USING(templateid)
    			WHERE vtiger_pdfmaker.templateid=?';
        $result = $this->db->pquery($sql, array($templateid));
        $pdftemplateResult = $this->db->fetch_array($result);
        return $pdftemplateResult;
    }
    public function GetPreparedMPDF(&$mpdf, $record, $module, $language) {
        require_once ('modules/PDFMaker/resources/pdfjs.php');
        $focus = CRMEntity::getInstance($module);
        foreach ($focus->column_fields as $cf_key => $cf_value) {
            $focus->column_fields[$cf_key] = '';
        }
        $focus->retrieve_entity_info($record, $module);
        $focus->id = $record;
        $PDFContent = $this->GetPDFContentRef($module, $focus, $language);
        $Settings = $PDFContent->getSettingsForModule($module);
        $pdf_content = $PDFContent->getContent();
        $header_html = $pdf_content['header'];
        $body_html = $pdf_content['body'];
        $footer_html = $pdf_content['footer'];
        if ($Settings['orientation'] == 'landscape') {
            $orientation = 'L';
        } else {
            $orientation = 'P';
        }
        $format = $Settings['format'];
        $formatPB = $format;
        if (strpos($format, ';') > 0) {
            $tmpArr = explode(';', $format);
            $format = array($tmpArr[0], $tmpArr[1]);
            $formatPB = $format[0] . 'mm ' . $format[1] . 'mm';
        } elseif ($Settings['orientation'] == 'landscape') {
            $format.= '-L';
            $formatPB.= '-L';
        }
        $mpdf = new ITS4You_PDFMaker_JavaScript('', $format, '', '', $Settings['margin_left'], $Settings['margin_right'], 0, 0, $Settings['margin_top'], $Settings['margin_bottom'], $orientation);
        if (mPDF_VERSION == 5.6) {
            $mpdf->SetAutoFont();
        }
        
        $this->mpdf_prepare_header_footer_settings($mpdf, $Settings);
        @$mpdf->SetHTMLHeader($header_html);
        @$mpdf->SetHTMLFooter($footer_html);
        @$mpdf->WriteHTML($body_html);
        $name = $this->GenerateName($record, $module);
        $name = str_replace(array(' ', '/', ','), array('-', '-', '-'), $name);
        return $name;
    }
    public function GenerateName($record, $module) {
        $focus = CRMEntity::getInstance($module);
        $focus->retrieve_entity_info($record, $module);
        $module_tabid = getTabId($module);
        $result = $this->db->pquery('SELECT fieldname FROM vtiger_field WHERE uitype=? AND tabid=?', array('4', $module_tabid));
        $fieldname = $this->db->query_result($result, 0, 'fieldname');
        if (isset($focus->column_fields[$fieldname]) && $focus->column_fields[$fieldname] != '') {
            $name = $this->generate_cool_uri($focus->column_fields[$fieldname]);
        } else {
            $templatesStr = implode('_', $templates);
            $recordsStr = implode('_', $record);
            $name = $templatesStr . $recordsStr . date('ymdHi');
        }
        return $name;
    }
    public function GetPDFContentRef($module, $focus, $language) {
        return new PDFMaker_PDFContent_Model($module, $focus, $language);
    }
    public function DeleteAllRefLinks() {
        require_once ('vtlib/Vtiger/Link.php');
        $link_res = $this->db->pquery('SELECT tabid FROM vtiger_tab WHERE isentitytype=?', array('1'));
        while ($link_row = $this->db->fetchByAssoc($link_res)) {
            Vtiger_Link::deleteLink($link_row['tabid'], 'DETAILVIEWWIDGET', 'PDFMaker');
            Vtiger_Link::deleteLink($link_row['tabid'], 'LISTVIEWMASSACTION', 'PDF Export', "javascript:getPDFListViewPopup2(this,'$MODULE$');");
        }
    }
    public function AddHeaderLinks() {
        require_once ('vtlib/Vtiger/Module.php');
        $link_module = Vtiger_Module::getInstance('PDFMaker');
        $link_module->addLink('HEADERSCRIPT', 'PDFMakerJS', 'layouts/v7/modules/PDFMaker/resources/PDFMakerActions.js', '', '1');
    }
    public function actualizeLinks() {
        $this->AddHeaderLinks();
    }
    private function mpdf_prepare_header_footer_settings(&$mpdf, &$Settings) {
        $disp_header = $Settings['disp_header'];
        $disp_optionsArr = array("dh_first", "dh_other");
        $disp_header_bin = str_pad(base_convert($disp_header, 10, 2), 2, '0', STR_PAD_LEFT);
        for ($i = 0;$i < count($disp_optionsArr);$i++) {
            if (substr($disp_header_bin, $i, 1) == '1') $mpdf->PDFMakerDispHeader[$disp_optionsArr[$i]] = true;
            else $mpdf->PDFMakerDispHeader[$disp_optionsArr[$i]] = false;
        }
        $disp_footer = $Settings['disp_footer'];
        $disp_optionsArr = array("df_first", "df_last", "df_other");
        $disp_footer_bin = str_pad(base_convert($disp_footer, 10, 2), 3, '0', STR_PAD_LEFT);
        for ($i = 0;$i < count($disp_optionsArr);$i++) {
            if (substr($disp_footer_bin, $i, 1) == '1') $mpdf->PDFMakerDispFooter[$disp_optionsArr[$i]] = true;
            else $mpdf->PDFMakerDispFooter[$disp_optionsArr[$i]] = false;
        }
    }
    public function GetAvailableSettings() {
        $menu_array = array();
        return $menu_array;
    }
    public function GetProductBlockFields($select_module = "") {
        $current_user = Users_Record_Model::getCurrentUserModel();
        $result = array();
        $Article_Strings = array("" => vtranslate("LBL_PLS_SELECT", "PDFMaker"), vtranslate('LBL_PRODUCTS_AND_SERVICES', 'PDFMaker') => array("PRODUCTBLOC_START" => vtranslate("LBL_ARTICLE_START", "PDFMaker"), 'PRODUCTBLOC_END' => vtranslate('LBL_ARTICLE_END', 'PDFMaker')),
        vtranslate('LBL_PRODUCTS_ONLY', 'PDFMaker') => array("PRODUCTBLOC_PRODUCTS_START" => vtranslate("LBL_ARTICLE_START", "PDFMaker"), 'PRODUCTBLOC_PRODUCTS_END' => vtranslate('LBL_ARTICLE_END', 'PDFMaker')), vtranslate('LBL_SERVICES_ONLY', 'PDFMaker') => array("PRODUCTBLOC_SERVICES_START" => vtranslate("LBL_ARTICLE_START", "PDFMaker"), 'PRODUCTBLOC_SERVICES_END' => vtranslate('LBL_ARTICLE_END', 'PDFMaker')),);
        $result['ARTICLE_STRINGS'] = $Article_Strings;
        $Product_Fields = array("PS_CRMID" => vtranslate("LBL_RECORD_ID", "PDFMaker"), 'PS_NO' => vtranslate('LBL_PS_NO', 'PDFMaker'), 'PRODUCTPOSITION' => vtranslate('LBL_PRODUCT_POSITION', 'PDFMaker'), 'CURRENCYNAME' => vtranslate('LBL_CURRENCY_NAME', 'PDFMaker'), 'CURRENCYCODE' => vtranslate('LBL_CURRENCY_CODE', 'PDFMaker'), 'CURRENCYSYMBOL' => vtranslate('LBL_CURRENCY_SYMBOL', 'PDFMaker'), 'PRODUCTNAME' => vtranslate('LBL_VARIABLE_PRODUCTNAME', 'PDFMaker'), 'PRODUCTTITLE' => vtranslate('LBL_VARIABLE_PRODUCTTITLE', 'PDFMaker'), 'PRODUCTEDITDESCRIPTION' => vtranslate('LBL_VARIABLE_PRODUCTEDITDESCRIPTION', 'PDFMaker'), 'PRODUCTDESCRIPTION' => vtranslate('LBL_VARIABLE_PRODUCTDESCRIPTION', 'PDFMaker'));
        if ($this->db->num_rows($this->db->query("SELECT tabid FROM vtiger_tab WHERE name='Pdfsettings'")) > 0) $Product_Fields['CRMNOWPRODUCTDESCRIPTION'] = vtranslate('LBL_CRMNOW_DESCRIPTION', 'PDFMaker');
        $Product_Fields['PRODUCTQUANTITY'] = vtranslate('LBL_VARIABLE_QUANTITY', 'PDFMaker');
        $Product_Fields['PRODUCTUSAGEUNIT'] = vtranslate('LBL_VARIABLE_USAGEUNIT', 'PDFMaker');
        $Product_Fields['PRODUCTLISTPRICE'] = vtranslate('LBL_VARIABLE_LISTPRICE', 'PDFMaker');
        $Product_Fields['PRODUCTTOTAL'] = vtranslate('LBL_PRODUCT_TOTAL', 'PDFMaker');
        $Product_Fields['PRODUCTDISCOUNT'] = vtranslate('LBL_VARIABLE_DISCOUNT', 'PDFMaker');
        $Product_Fields['PRODUCTDISCOUNTPERCENT'] = vtranslate('LBL_VARIABLE_DISCOUNT_PERCENT', 'PDFMaker');
        $Product_Fields['PRODUCTSTOTALAFTERDISCOUNT'] = vtranslate('LBL_VARIABLE_PRODUCTTOTALAFTERDISCOUNT', 'PDFMaker');
        $Product_Fields['PRODUCTVATPERCENT'] = vtranslate('LBL_PRODUCT_VAT_PERCENT', 'PDFMaker');
        $Product_Fields['PRODUCTVATSUM'] = vtranslate('LBL_PRODUCT_VAT_SUM', 'PDFMaker');
        $Product_Fields['PRODUCTTOTALSUM'] = vtranslate('LBL_PRODUCT_TOTAL_VAT', 'PDFMaker');
        if ($select_module != '') {
            $sql1 = 'SELECT * FROM vtiger_inventorytaxinfo';
            $result1 = $this->db->pquery($sql1, array());
            while ($row1 = $this->db->fetchByAssoc($result1)) {
                $Taxes[$row1['taxname']] = $row1['taxlabel'];
            }
            $select_moduleid = getTabid($select_module);
            $sql2 = "SELECT fieldname, fieldlabel, uitype FROM vtiger_field WHERE tablename = ? AND tabid = ? AND fieldname NOT IN ('productid','quantity','listprice','comment','discount_amount','discount_percent')";
            $result2 = $this->db->pquery($sql2, array("vtiger_inventoryproductrel", $select_moduleid));
            while ($row2 = $this->db->fetchByAssoc($result2)) {
                if ($row2['uitype'] == '83') {
                    $label = vtranslate('Tax');
                    $label.= ' (';
                    $label.= vtranslate($Taxes[$row2['fieldname']], $select_module);
                    $label.= ')';
                } else {
                    $label = vtranslate($row2['fieldlabel'], $select_module);
                }
                $Product_Fields['PRODUCT_' . strtoupper($row2['fieldname']) ] = $label;
            }
        }
        $result['SELECT_PRODUCT_FIELD'] = $Product_Fields;
        $prod_fields = array();
        $serv_fields = array();
        $in = getTabId('Products');
        $in.= ', ' . getTabId('Services');
        $sql = 'SELECT  t.tabid, t.name,
                        b.blockid, b.blocklabel,
                        f.fieldname, f.fieldlabel
                FROM vtiger_tab AS t
                INNER JOIN vtiger_blocks AS b USING(tabid)
                INNER JOIN vtiger_field AS f ON b.blockid = f.block
                WHERE t.tabid IN (' . $in . ')
                    AND (f.displaytype != 3 OR f.uitype = 55)
                ORDER BY t.name ASC, b.sequence ASC, f.sequence ASC, f.fieldid ASC';
        $res = $this->db->pquery($sql, array());
        while ($row = $this->db->fetchByAssoc($res)) {
            $module = $row['name'];
            $fieldname = $row['fieldname'];
            if (getFieldVisibilityPermission($module, $current_user->id, $fieldname) != '0') continue;
            $trans_field_nam = strtoupper($module) . '_' . strtoupper($fieldname);
            switch ($module) {
                case 'Products':
                    $trans_block_lbl = vtranslate($row['blocklabel'], 'Products');
                    $trans_field_lbl = vtranslate($row['fieldlabel'], 'Products');
                    $prod_fields[$trans_block_lbl][$trans_field_nam] = $trans_field_lbl;
                break;
                case 'Services':
                    $trans_block_lbl = vtranslate($row['blocklabel'], 'Services');
                    $trans_field_lbl = vtranslate($row['fieldlabel'], 'Services');
                    $serv_fields[$trans_block_lbl][$trans_field_nam] = $trans_field_lbl;
                break;
                default:
                    continue;
            }
        }
        $result['PRODUCTS_FIELDS'] = $prod_fields;
        $result['SERVICES_FIELDS'] = $serv_fields;
        return $result;
    }
    public function getSideBarLinks($linkParams) {
        $currentUserModel = Users_Record_Model::getCurrentUserModel();
        $type = 'SIDEBARLINK';
        $quickLinks = array();
        if ($linkParams["ACTION"] == "ProfilesPrivilegies") {
            $quickSLinks = array('linktype' => "SIDEBARLINK", 'linklabel' => "LBL_RECORDS_LIST", 'linkurl' => "index.php?module=PDFMaker&view=List", 'linkicon' => '');
            $links['SIDEBARLINK'][] = Vtiger_Link_Model::getInstanceFromValues($quickSLinks);
        } elseif ($linkParams['ACTION'] == 'IndexAjax' && $linkParams['MODE'] == 'showSettingsList') {
            if ($currentUserModel->isAdminUser()) {
                $SettingsLinks = $this->GetAvailableSettings();
                foreach ($SettingsLinks as $stype => $sdata) {
                    $quickLinks[] = array('linktype' => 'SIDEBARLINK', 'linklabel' => $sdata["label"], 'linkurl' => $sdata["location"], 'linkicon' => '');
                }
            }
        } else {
            $linkTypes = array('SIDEBARLINK', 'SIDEBARWIDGET');
            $links = Vtiger_Link_Model::getAllByType($this->getId(), $linkTypes, $linkParams);
            $quickLinks[] = array('linktype' => 'SIDEBARLINK', 'linklabel' => 'LBL_RECORDS_LIST', 'linkurl' => $this->getListViewUrl(), 'linkicon' => '',);
        }
        if (count($quickLinks) > 0) {
            foreach ($quickLinks as $quickLink) {
                $links[$type][] = Vtiger_Link_Model::getInstanceFromValues($quickLink);
            }
        }
        if ($currentUserModel->isAdminUser() && $linkParams['ACTION'] != 'Edit' && $linkParams['ACTION'] != 'Detail') {
            $quickS2Links = array('linktype' => "SIDEBARWIDGET", 'linklabel' => "LBL_SETTINGS", 'linkurl' => "module=PDFMaker&view=IndexAjax&mode=showSettingsList&pview=" . $linkParams["ACTION"], 'linkicon' => '');
            $links['SIDEBARWIDGET'][] = Vtiger_Link_Model::getInstanceFromValues($quickS2Links);
        }
        return $links;
    }
    function generate_cool_uri($name) {
        $Search = array("$", "€", "&", "%", ")", "(", ".", " - ", "/", " ", ",", "ľ", "š", "č", "ť", "ž", "ý", "á", "í", "é", "ó", "ö", "ů", "ú", "ü", "ä", "ň", "ď", "ô", "ŕ", "Ľ", "Š", "Č", "Ť", "Ž", "Ý", "Á", "Í", "É", "Ó", "Ú", "Ď", "\"", "°", "ß");
        $Replace = array("", "", "", "", "", "", "-", "-", "-", "-", "-", "l", "s", "c", "t", "z", "y", "a", "i", "e", "o", "o", "u", "u", "u", "a", "n", "d", "o", "r", "l", "s", "c", "t", "z", "y", "a", "i", "e", "o", "u", "d", "", "", "ss");
        $return = str_replace($Search, $Replace, $name);
        return $return;
    }
    public function getDetailViewLinks($templateid = '') {
        $linkTypes = array('DETAILVIEWTAB');
        $detail_url = 'index.php?module=PDFMaker&view=DetailFree&templateid=' . $templateid . '&record=t' . $templateid;
        $detailViewLinks = array(array('linktype' => 'DETAILVIEWTAB', 'linklabel' => vtranslate('LBL_PROPERTIES', 'PDFMaker'), 'linkurl' => $detail_url, 'linkicon' => ''));
        foreach ($detailViewLinks as $detailViewLink) {
            $linkModelList['DETAILVIEWTAB'][] = Vtiger_Link_Model::getInstanceFromValues($detailViewLink);
        }
        return $linkModelList;
    }
} ?>
