<?php
// extend TCPF with custom functions
class MYPDF extends TCPDF
{

    //Separated Header Drawing into it's own function for reuse.
    public function BuildHeader($name)
    {
        // Logo
        $image_file = 'webroot/img/con.jpg';
        $this->Image($image_file, 10, 10, 35, '', 'JPG', '', 'T', false, 300, 'L', false, false, 0, false, false, false);
        // Position at 25 mm from bottom
        $this->SetY(30);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, $name, 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    public function DrawHeader($header, $size)
    {
        // Colors, line width and bold font
        $this->SetFillColor(19, 32, 65);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(19, 32, 65);
        $this->SetLineWidth(0.1);
        $this->SetFont('helvetica', 'B', 13);
        // Header
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($size[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetFont('helvetica', '', 10);
    }

    // Colored table
    public function ColoredTable($header, $size, $records)
    {
        $num_pages = $this->getNumPages();
        $this->DrawHeader($header, $size);
        // Data
        $fill = 0;
        foreach ($records as $row) {
            $this->startTransaction();
            for ($i = 0; $i < count($header); ++$i) {
                $this->Cell($size[$i], 6, $row[$i], 'LR', 0, 'C', $fill);
            }

            if ($num_pages < $this->getNumPages()) {
                $num_pages++;
                $this->rollbackTransaction(true);
                $this->DrawHeader($header, $size);

                for ($i = 0; $i < count($header); ++$i) {
                    $this->Cell($size[$i], 6, $row[$i], 'LR', 0, 'C', $fill);
                }
            }
            $this->Ln();
            //$fill=!$fill;
        }
        $this->Cell(array_sum($size), 0, '', 'T');
    }

    // Page footer
    public function Footer()
    {
        $this->SetLineWidth(0.3);
        $this->Ln(10);
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', '', 8);
        // Page number
        $this->Cell(0, 10, 'Contactus © ', 0, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->Cell(15, 10, 'Página ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER + 25);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set font
$pdf->SetFont('times', '', 12);

$pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');

// add a page
$pdf->AddPage($mode, $pageize);
$pdf->BuildHeader($name);

$pdf->Ln(15);

// print colored table
$pdf->ColoredTable($header, $size, $records);

// close and output PDF document
$pdf->Output($name . '.pdf', 'D');
