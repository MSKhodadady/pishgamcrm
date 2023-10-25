<?php
class PDFMaker_checkGenerate_Model extends Vtiger_Module_Model {
    protected $print = false;
    protected $PDFMakerModuleModel = false;
    protected $PDFAttributes = array('record', 'mode', 'language', 'source_module');
    function __construct() {
        PDFMaker_Debugger_Model::GetInstance()->Init();
        $this->log = LoggerManager::getLogger('account');
        foreach ($this->PDFAttributes AS $atr) {
            $this->set($atr, '');
        }
        $this->set('generate_type', 'attachment');
    }
    static function getInstance() {
        $instance = new self();
        return $instance;
    }
    function setPrint($isprint = true) {
        if ($isprint) {
            $this->print = true;
        } else {
            $this->print = false;
        }
    }
    function generate(Vtiger_Request $request) {
        $PDFMaker = new PDFMaker_PDFMaker_Model();
        $this->PDFMakerModuleModel = Vtiger_Module_Model::getInstance('PDFMaker');
        foreach ($this->PDFAttributes AS $atr) {
            if ($request->has($atr) && !$request->isEmpty($atr)) {
                $this->set($atr, $request->get($atr));
            }
        }
        if ($request->has('relmodule') && !$request->isEmpty('relmodule')) {
            $relmodule = $request->get('relmodule');
            $this->set('source_module', $relmodule);
        } else {
            $relmodule = $this->get('source_module');
        }
        $language = $this->get('language');
        if (empty($language)) {
            $language = Vtiger_Language_Handler::getLanguage();
        }
        $record = $this->get('record');
        if (empty($relmodule) && isset($record)) {
            $relmodule = getSalesEntityType($record);
            $request->set('relmodule', $relmodule);
        }
        $mpdf = '';
        $name = $PDFMaker->GetPreparedMPDF($mpdf, $record, $relmodule, $language);
        if ($request->has('print') && !$request->isEmpty('print')) {
            if ($request->get('print') == 'true') {
                $this->print = true;
            }
        }
        // pr($this);
        // exit();
        if ($this->print == true) {
            $mpdf->AutoPrint(true);
            $this->set('generate_type', 'inline');
        }
        $content = $mpdf->Output('', 'S');
        @ob_clean();
        header('Content-Type: application/pdf');
        header('Content-Length: ' . strlen($content));
        $generate_type = $this->get('generate_type');
        header('Content-Disposition: ' . $generate_type . '; filename="' . $name . '.pdf"');
        header('Content-Description: PHP Generated Data');
        header('Pragma: public');
        echo $content;
        exit();
    }
    private function fixImg($content) {
        $e = 'site_URL';
        $surl = vglobal($e);
        $http = 'http://';
        $simple_html_dom_file = $this->getSimpleHtmlDomFile();
        require_once ($simple_html_dom_file);
        $html = str_get_html($content);
        if (is_array($html->find('img'))) {
            foreach ($html->find('img') as $img) {
                if (strpos($img->src, $http) === false) {
                    $newPath = $surl . '/' . $img->src;
                    $img->src = $newPath;
                }
            }
            return $html->save();
        } else {
            return $content;
        }
    }
    private function getSimpleHtmlDomFile() {
        return 'include/simplehtmldom/simple_html_dom.php';
    }
} ?>
