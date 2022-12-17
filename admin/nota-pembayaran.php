<?php

require "../fpdf/fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=9400_atma_auto','root','');

class myPDF extends FPDF{
    function header(){
        $this->image('../fpdf/Logo_ATMA_AUTO.png',10,10);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'ATMA AUTO',0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','',14);
        $this->Cell(276,10,'Motorcycle Sparepart and Services',0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->Cell(276,10,'Jl. Babarsari no 43 Yogyakarta 552181',0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->Cell(276,10,'Telp. (0274) 487711',0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->Cell(276,10,'_______________________________________________________________________________________________________________________________________________',0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','B',12);
        $this->Cell(276,5,'NOTA PEMBAYARAN',0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','',10);
        setlocale(LC_TIME, "");
        date_default_timezone_set('Asia/Bangkok');
        $date = utf8_encode(strftime('%d %B %Y'));
        $this->Cell(450,5,$date,0,0,'C');
        $this->Ln();
        $this->Ln();
        $this->Ln();
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

    }
    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(90,10,'Nama Customer',1,0,'C');
        $this->Cell(90,10,'Pembelian',1,0,'C');
        $this->Cell(90,10,'Harga',1,0,'C');
        $this->Ln();
        
    }
    function viewTable($db){
        $this->SetFont('Times','',12);
        $stmt = $db->query('select * from 9400_transaksi_penjualan');
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(90,10,$data->nama_customer,1,0,'C');
            $this->Cell(90,10,$data->nama_spareparts,1,0,'C');
            $this->Cell(90,10,$data->harga_spareparts,1,0,'C');
            $this->Ln();
        }
    }

}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();