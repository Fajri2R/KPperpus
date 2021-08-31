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

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{
    //Page header
    public function Header()
    {
        // Logo
        $image_file = K_PATH_IMAGES . 'logo.jpg';
        $this->Image($image_file, 15, 10, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', '', 20);
        // Title
        // $this->Cell(0, 50, 'SMA PELITA RAYA KOTA JAMBI', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetY(15);
        $isi_header = "<table align=\"center\" style=\"padding-left:80px;\">
					<tr>
						<td style=\"font-size:26px;\"><b>SMA PELITA RAYA KOTA JAMBI</b></td>	
					</tr>
					<tr>
						<td style=\"font-size:18px;\">Jln. Sersan Udara Syawal Rt.03 No.104 Talang Bakung</td>	
					</tr>
					<tr>
						<td style=\"font-size:18px;\">Email : PelitaRaya@gmail.com Telp : 0741-57372301</td>
					</tr>
					<hr>
				</table>";
        $this->writeHTML($isi_header, true, false, false, false, '');
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Perpustakaan');
$pdf->SetTitle('Laporan Pengembalian');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// remove default header/footer
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

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
$notbl = 1;

$table1 = '<br><br><br><br><br><br><table border="0" width="650px">';
$table1 .= '<tr> 
				<td style="text-align:center; font-family:sans-serif; font-size:16px; font-weight:bold;">LAPORAN PENGEMBALIAN BUKU</td>	
				</tr>';
$table1 .= '<tr> 
					<td style="text-align:center; font-family:sans-serif; font-size:16px; font-weight:bold;">PERPUSTAKAAN SMA PELITA RAYA KOTA JAMBI</td>
					</tr>';

$table1 .= '</table> <br/><br/>';

$table2 = '<table border="1" width="650px" style="margin-left: auto; margin-right: auto; white-space: normal;table-layout: fixed; width:100%;">';
$table2 .= '<tr style="background-color:lightblue;"> 
				<td style="width:5%; text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;"><div style="font-size:5pt">&nbsp;</div>No.</td>
				<td style="width:11%; text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Id Anggota</td>
				<td style="width:18%; text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;"><div style="font-size:5pt">&nbsp;</div>Nama Peminjam</td>
				<td style="width:18%; text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;"><div style="font-size:5pt">&nbsp;</div>Judul Buku</td>
				<td style="width:12%; text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Tanggal Pinjam</td>
				<td style="width:12%; text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Tanggal Kembali</td>
				<td style="width:14%; text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Tanggal di Kembalikan</td>
				<td style="width:10%; text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;"><div style="font-size:5pt">&nbsp;</div>Denda</td>
			</tr>';

foreach ($data as $row) {
    $tgl_kembali = new DateTime($row->tgl_kembali);
    $tgl_kembalikan = new DateTime($row->tgl_kembalikan);
    $selisih = $tgl_kembalikan->diff($tgl_kembali)->format("%a");
    $test = ($tgl_kembali >= $tgl_kembalikan or $selisih == 0) ? "Tidak ada denda" : $this->m_pengembalian->rp(1000 * $selisih);
    $table2 .= '<tr> 
					<td style="text-align:center; font-family:sans-serif; font-size:12px;">' . $notbl++ . '</td>
					<td style="text-align:center; font-family:sans-serif; font-size:12px;">' . $row->id_anggota . '</td>
					<td style="text-align:center; font-family:sans-serif; font-size:12px; text-transform: capitalize;">' . $row->nama . '</td>
					<td style="text-align:center; font-family:sans-serif; font-size:12px; text-transform: capitalize;">' . $row->judul_buku . '</td>
					<td style="text-align:center; font-family:sans-serif; font-size:12px;">' . slashdate_indo($row->tgl_pinjam) . '</td>
					<td style="text-align:center; font-family:sans-serif; font-size:12px;">' . slashdate_indo($row->tgl_kembali) . '</td>
					<td style="text-align:center; font-family:sans-serif; font-size:12px;">' . slashdate_indo($row->tgl_kembalikan) . '</td>
					<td style="text-align:center; font-family:sans-serif; font-size:12px;">' .  $test   . '</td>
				</tr>';
}
$table2 .= '</table>';
$ttd = '<br><br><span>Jambi, ' . mediumdate_indo($tgl_pinjam) . '</span><br><span>Petugas Perpustakaan</span><br><br><br><br><span>' . $user['nama'] . '</span>';


// print a block of text using Write()
// $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
$pdf->WriteHTMLCell(0, 0, '', '', $table1, 0, 1, 0, true, 'L', true);
$pdf->WriteHTMLCell(0, 0, '', '', $table2, 0, 1, 0, true, 'L', true);
$pdf->writeHTMLCell(0, 0, '', '', $ttd, 0, 1, 0, true, 'R', true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('laporan_pengembalian_' . shortdate_indo($tgl_pinjam) . '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+