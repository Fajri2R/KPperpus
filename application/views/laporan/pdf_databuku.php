<?php
//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Perpustakaan');
$pdf->SetTitle('Laporan Data Buku');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times');

// add a page
$pdf->AddPage();
$tgl_pinjam = date('Y-m-d');

$table1 = '<table border="0" width="650px">';
$table1 .= '<tr> 
				<td style="text-align:center; font-family:sans-serif; font-size:16px; font-weight:bold;">LAPORAN DATA BUKU</td>
				</tr>';
$table1 .= '<tr> 
					<td style="text-align:right; font-family:sans-serif; font-size:12px; font-weight:bold;">Per tanggal ' . mediumdate_indo($tgl_pinjam) . '</td>
					</tr>';

$table1 .= '</table> <br/><br/>';

$table2 = '<table border="1" width="650px">';
$table2 .= '<tr style="background-color:lightblue;"> 
				<td height="30" style="text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">ID Buku</td>
				<td style="text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Tanggal Terima</td>
				<td style="text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Nomor Induk</td>
				<td style="text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Judul Buku</td>
				<td style="text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Pengarang</td>
				<td style="text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Penerbit</td>
				<td style="text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Tahun Terbit</td>
				<td style="text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Sumber</td>
			</tr>';

foreach ($data as $row) {
    $table2 .= '<tr> 
					<td style="text-align:center; font-family:sans-serif; font-size:12px;">' . $row->id_buku . '</td>
					<td style="text-align:center; font-family:sans-serif; font-size:12px;">' . slashdate_indo($row->tgl_terima) . '</td>
					<td style="text-align:center; font-family:sans-serif; font-size:12px;">' . $row->nomor_induk . '</td>
					<td style="text-align:center; font-family:sans-serif; font-size:12px; text-transform: capitalize;">' . $row->judul_buku . '</td>
					<td style="text-align:center; font-family:sans-serif; font-size:12px; text-transform: capitalize;">' . $row->nama_pengarang . '</td>
					<td style="text-align:center; font-family:sans-serif; font-size:12px; text-transform: capitalize;">' . $row->nama_penerbit . '</td>
					<td style="text-align:center; font-family:sans-serif; font-size:12px;">' . $row->tahun_terbit . '</td>
					<td style="text-align:center; font-family:sans-serif; font-size:12px;">' . $row->sumber . '</td>
				</tr>';
}
$table2 .= '</table>';



// print a block of text using Write()
// $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
$pdf->WriteHTMLCell(0, 0, '', '', $table1, 0, 1, 0, true, 'L', true);
$pdf->WriteHTMLCell(0, 0, '', '', $table2, 0, 1, 0, true, 'L', true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('laporan_databuku.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+