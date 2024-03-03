<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
include_once dirname(__FILE__) . '/../viewers/HeaderViewer.php';

class Vtiger_PDF_InventoryHeaderViewer extends Vtiger_PDF_HeaderViewer
{

    function totalHeight($parent)
    {
        $height = 100;

        if ($this->onEveryPage)
            return $height;
        if ($this->onFirstPage && $parent->onFirstPage())
            $height;
        return 0;
    }

    function display($parent)
    {
        $pdf         = $parent->getPDF();
        $headerFrame = $parent->getHeaderFrame();
        if ($this->model) {
            $headerColumnWidth = $headerFrame->w / 3.0;
            $modelColumns      = $this->model->get('columns');
            $offsetX           = 10;

            //pr($headerFrame->x);
            // row 1 Col 1
						$modelColumn0 = $modelColumns[0];
						//pr($modelColumns);

            list($imageWidth, $imageHeight, $imageType, $imageAttr) = $parent->getimagesize($modelColumn0['logo']);
						//division because of mm to px conversion
						$w = $imageWidth / 3;
						if ($w > 20) {
								$w = 20;
						}
						$h = $imageHeight / 3;
						if ($h > 7) {
								$h = 7;
						}
						$pdf->Image($modelColumn0['logo'], $headerFrame->w-10, $headerFrame->y, $w, $h,'','','',false,300,'R',false,false,1);
						$imageHeightInMM = 30;

            // row 1 Col 2
            $contentX = $headerColumnWidth + 10;
						$pdf->SetFont('mitra', 'B',15);
            $pdf->MultiCell($headerColumnWidth, 7, $modelColumn0['summary'], 0, 'C', 0, 1, $contentX, $headerFrame->y);
            $pdf->SetFont('mitra', 'B', 10);
            $pdf->MultiCell($headerColumnWidth, 3, $this->model->get('moduleTitle'), 0, 'C', 0, 1, $contentX, $headerFrame->y+6);
            // row 1 Col 3
            $contentX = ($headerColumnWidth * 2.0)+ ($headerColumnWidth/2.0) + 10;

            $pdf->SetFont('mitra', '', 7);
            $pdf->MultiCell($contentWidth * 2.0, 3, $this->model->get('title'), 0, 'R', 0, 1, $contentX, $headerFrame->y+1);
						$modelColumn2 = $modelColumns[2];
						$yPos=$headerFrame->y+1;
						foreach ($modelColumn2['dates'] as $label => $value) {
								$yPos=$yPos+3;
								$pdf->MultiCell($contentWidth * 2.0, 3, sprintf('%s: %s', $label, $value), 0, 'R', 0, 1, $contentX, $yPos);
						}

						// row 2
            $offsetY = 10;
						$pdf->MultiCell($headerFrame->w, 0, "", 0, 'L', 0, 1, $headerFrame->x, $pdf->GetY());
						$sellerY=$pdf->GetY()+10;
						$sellerColumnWidth = $headerFrame->w / 12.0;
            $pdf->SetFont('mitra', '',8);
            $sellerlabel="فروشنده";
            $pdf->MultiCell($sellerColumnWidth, 8, $sellerlabel, 1, 'C', 0, 1, $headerFrame->x, $sellerY);
						//$saleColumnWidth = $headerFrame->w-$sellerColumnWidth;
						$sellerContent="شرکت : ".$modelColumn0['summary'];
						if(isset($modelColumn0['info']['vatid']) && !empty($modelColumn0['info']['vatid'])) $sellerContent.="               ".$modelColumn0['info']['vatid'];
						if(isset($modelColumn0['info']['phone']) && !empty($modelColumn0['info']['phone'])) $sellerContent.="               ".$modelColumn0['info']['phone'];
						if(isset($modelColumn0['info']['fax']) && !empty($modelColumn0['info']['fax'])) $sellerContent.="               ".$modelColumn0['info']['fax'];
						if(isset($modelColumn0['info']['address']) && !empty($modelColumn0['info']['address'])) $sellerContent.="\nآدرس: ".$modelColumn0['info']['address'];
						$pdf->MultiCell($saleColumnWidth, 8, $sellerContent, 1, 'R', 0, 1, $headerFrame->x+$sellerColumnWidth, $sellerY);
						// row 3
						$modelColumn1 = $modelColumns[1];
            $offsetY = 10;
						$pdf->MultiCell($headerFrame->w, 0, "", 0, 'L', 0, 1, $headerFrame->x, $pdf->GetY());
						$customerY=$pdf->GetY();
						$customerColumnWidth = $headerFrame->w / 12.0;
            $pdf->SetFont('mitra', '',8);
            $customerlabel="خریدار";
            $pdf->MultiCell($customerColumnWidth, 8, $customerlabel, 1, 'C', 0, 1, $headerFrame->x, $customerY);
						$customerContent="سازمان / شرکت : ".$modelColumn1['orgname'];
						if(isset($modelColumn1['info']['phone']) && !empty($modelColumn1['info']['phone'])) $customerContent.="               ".$modelColumn1['info']['phone'];
						if(isset($modelColumn1['info']['fax']) && !empty($modelColumn1['info']['fax'])) $customerContent.="               ".$modelColumn1['info']['fax'];
						if(isset($modelColumns[2]['billingAddress']) && !empty($modelColumns[2]['billingAddress'])) $customerContent.="\nآدرس: ".$modelColumns[2]['billingAddress'];
						$pdf->MultiCell($saleColumnWidth, 8, $customerContent, 1, 'R', 0, 1, $headerFrame->x+$customerColumnWidth, $customerY);
        }

    }

}
