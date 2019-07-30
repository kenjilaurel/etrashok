<?php
require('../vendor/fpdf17/fpdf.php');
require '../connection/dbconnect.php';
include '../api/functions.php';

		
		
class PDF extends FPDF {

	private $name;
	// private $image;
	private $address;
	private  $collector;
	

	public function setAddress($address){
        $this->address = $address;
    }
    public function getAddress(){
        return $this->address;
    }
	// public function setImage($image){
 //        $this->image = $image;
 //    }
 //    public function getImage(){
 //        return $this->image;
 //    }

	public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
  	public function setCollector($collector){
        $this->collector = $collector;
    }
    public function getCollector(){
        return $this->collector;
    }

	function Header(){
	

		$this->SetFont('Arial','B',15);
		
		//dummy cell to put logo
		//$this->Cell(12,0,'',0,0);
		//is equivalent to:
		$this->Cell(12);
		
		//put logo ./images/noimage.png
		// $this->Image($this->getImage(),10,10,10,'C');
		
		// $this->Cell(165,10,$this->getName(),0,1,'C');
		$this->SetFont('Arial','',25);
		$this->Cell(170,10,$this->getAddress(),0,1,'C');
		$this->SetFont('Arial','B',12);
		$this->Cell(190,10,'Violation Report',0,1,'C');
		$this->SetFont('Arial','',10);

		//dummy cell to give line spacing
		//$this->Cell(0,5,'',0,1);
		//is equivalent to:
		$this->Ln(5);
		
		$this->SetFont('Arial','B',11);
		
		$this->SetFillColor(220, 220, 220);
		$this->SetDrawColor(239, 239, 239);
		
		$this->Cell(6,10,'',1,0,'',true);
		$this->Cell(24,10,'Date',1,0,'',true);
		$this->Cell(35,10,'Resident',1,0,'',true);		
		$this->Cell(40,10,'Waste',1,0,'',true);
		$this->Cell(65,10,'Violation',1,0,'',true);
		$this->Cell(22,10,'Penalty',1,1,'',true);
		
		
	}
	function Footer(){
		//add table's bottom line
		// $this->Cell(190,0,'','T',1,'',true);
		
		//Go to 1.5 cm from bottom
		$this->SetY(-15);
				
		$this->SetFont('Arial','',8);
		
		//width = 0 means the cell is extended up to the right margin
		$this->Cell(0,10,'Page '.$this->PageNo()." / {pages}",0,0,'C');
	}
}




//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new PDF('P','mm','A4'); //use new class

//initialize get variable



$pdf->setName("Barangay Waste Management");
$pdf->setAddress("Barangay Toril District");
// $pdf->setImage('./images/'.$image_path);
//define new alias for total page numbers
$pdf->AliasNbPages('{pages}');

$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();

$pdf->SetFont('Arial','',9);
$pdf->SetDrawColor(180,180,255);

$sql = "SELECT rs.id rsid,
			  	firstname,
				middlename,
				lastname,
				wc.category wccat,
				date_collected,
				v.description,
				penalty,
				collector_id,
				sitio,
				sitio_name
			FROM resident_segragation rs 
			INNER JOIN segregation_remarks sr
			ON rs.segregation_remarks_id = sr.id
			INNER JOIN user 
			ON user.id = rs.resident_id
			INNER JOIN waste_category wc
			ON wc.id = rs.category_id
			INNER JOIN violation v
			ON sr.violation_id = v.id
			INNER JOIN sitio 
			ON user.sitio = sitio.id
			WHERE rs.deleted = 0 AND collected = 1
			AND sr.violation_id != 0";

if(isset($_GET['from'])){
	$from 	= $_GET['from'];
	$to 	= $_GET['to'];
	$sql .= " AND date_collected BETWEEN '$from' AND '$to'";

}	
if(isset($_GET['sitio'])){
	$url_sitio = $_GET['sitio'];
	$sql .= " AND sitio = '$url_sitio' ";
}		
$sql .= " GROUP BY lastname,wccat";	
$query=mysqli_query($mysqli,$sql);
$count = 0;
while($row=mysqli_fetch_array($query)){
	$penalty = number_format((float)$row['penalty'], 2, '.', '');
	$resident = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];
	$date_collected = $row['date_collected'];
	$w_cat = $row['wccat'];
	$collector = getUserName($mysqli,$row['collector_id']);
	$count++;
	
	$pdf->Cell(6,10,$count.'. ','',0);
	$pdf->Cell(24,10,$date_collected,'',0);
	$pdf->Cell(35,10,$resident,'',0);	
	$pdf->Cell(40,10,$w_cat,'',0);
	$pdf->Cell(65,10,$row['description'],'',0);
	$pdf->Cell(25,10,'P '.$penalty,'',1);

	$pdf->SetFillColor(220,220,220);
	$pdf->SetDrawColor(220, 220, 220);
	$pdf->Cell(190,0,'','T',1,'',true);
	$pdf->Ln(1);
	$pdf->setX(14);
	if(isset($_GET['sitio'])){
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(10,10,'Sitio: ','','R',0);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(20,10,$row['sitio_name'],'','R',1);	
		$pdf->Ln(6);
	}
	$pdf->setX(5);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(25,10,'Collector: ','','R',0);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(25,10,$collector,'','R',1);
	$pdf->Ln(10);
	$pdf->SetFillColor(220,220,220);
	$pdf->SetDrawColor(220, 220, 220);
	$pdf->Cell(190,0,'','T',1,'',true);

	/*
	if($pdf->GetStringWidth($data['email']) > 65){
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(65,5,$data['email'],'LR',0);
		$pdf->SetFont('Arial','',9);
	}else{
		$pdf->Cell(65,5,$data['email'],'LR',0);
	}
	$pdf->Cell(60,5,$data['address'],'LR',1);
	*/
}

$pdf->Output();
?>
