<?php
require('fpdf/fpdf.php');
require('conexionReceta.php');
/*$busqueda=;*/
$id=1;
$consulta = "SELECT * FROM testreceta WHERE id_Enfermo like '%$id%'";//posible a borrar
$resultado = $mysqli->query($consulta);
$resultado2 = $mysqli->query($consulta);

date_default_timezone_set('America/Mexico_city');
$fecha = date("d/m/Y");
$hora = date("H:i:s");

class PDF extends FPDF
{
    var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();//hacemos una instancia
$pdf->AliasNbPages();
$pdf->AddPage();//Añadir una pagina en blanco 
$pdf->SetFont('Times','B',20);
$pdf->Image ('assets/imagenes/icono3.PNG',0,0,50);//Imagen (archivo)
//Datos del enfermo
$row2 = $resultado2->fetch_assoc();

//Datos de la base de datos
$pdf->setXY(80,15);
$pdf->Cell(30,8,'Receta electronica java crew',0,1,'C',0);
$pdf->setXY(110,19);
$pdf->SetFont('Helvetica','B',11);
$pdf->Cell(80,8,'SM-MED-026',0,0,'R',0);
$pdf->setXY(80,22);
$pdf->SetFont('Helvetica','',10);
$pdf->Cell(40,8,'Calle 8a. poniente Norte, No. Exterior 30, Colonia, Barrancos, colonia Centro',0,0,'C',0);
$pdf->setXY(80,26);
$pdf->Cell(30,8,'Puerto Madero, Chiapas, Mexico, CP 30830',0,0,'C',0);
$pdf->setXY(110,26);
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(80,8,'Folio: 105767',0,0,'R',0);
$pdf->setXY(0,38);
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(0,0,'Receta medica',0,0,'C',0);
$pdf->setXY(1,45);
$pdf->SetFont('Helvetica','B',10);
$pdf->Cell(171,0,'Fecha:',0,0,'R',0);
$pdf->setXY(170,41);
$pdf->SetFont('Helvetica','',10);
$pdf->Cell(20,8,$fecha,0,0,'R',0);
$pdf->setXY(6,53);
$pdf->SetFont('Helvetica','B',10);
$pdf->Cell(170,0,'Hora de consulta:',0,0,'R',0);
$pdf->setXY(169,53  );
$pdf->SetFont('Helvetica','',10);
$pdf->Cell(0,0,$hora.' horas',0,0,'R',0);
$pdf->setXY(40,45);
$pdf->SetFont('Helvetica','B',10);
$pdf->Cell(0,0,'Nombre: ',0,0,'L',0);
$pdf->SetFont('Helvetica','',10);
$pdf->setXY(55,40);
$pdf->Cell(10,10,utf8_decode($row2['nombre_Enfermo']),0,0,'L',0);
$pdf->setXY(40,52);
$pdf->SetFont('Helvetica','B',10);
$pdf->Cell(0,0,'Sexo:',0,0,'L',0);
$pdf->SetFont('Helvetica','',10);
$pdf->setXY(50,52);
$pdf->Cell(0,0,utf8_decode($row2['sexo']),0,0,'',0);
$pdf->setXY(40,59);
$pdf->SetFont('Helvetica','B',10);
$pdf->Cell(0,0,'Edad:',0,0,'L',0);
$pdf->SetFont('Helvetica','',10);
$pdf->setXY(50,59);
$pdf->Cell(0,0,utf8_decode($row2['edad'].' años'),0,0,'',0);
$pdf->setXY(40,66);
$pdf->SetFont('Helvetica','B',10);
$pdf->Cell(0,0,'Enfermedad: ',0,0,'L',0);
$pdf->SetFont('Helvetica','',10);
$pdf->setXY(62,66);
$pdf->Cell(0,0,utf8_decode($row2['enfermedad']),0,0,'',0);
$pdf->setXY(0,80);
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(0,0,'Tratamiento',0,0,'C',0);


$pdf->LN(10);
$pdf->SetX(5);
$pdf->Cell(10,8,'N',1,0,'C',0);
$pdf->Cell(30,8,'Medicina',1,0,'C',0);
$pdf->Cell(20,8,'MG/ML',1,0,'C',0);
$pdf->Cell(45,8,'Cada cuanto tiempo',1,0,'C',0);
$pdf->Cell(45,8,'Por cuanto tiempo',1,0,'C',0);
$pdf->Cell(50,8,'Via de administracion',1,1,'C',0);
//Datos del enfermo

//colores
$pdf->SetFillColor(233,229,235);
$pdf->SetDrawColor(61,61,61);

$pdf->SetFont('Arial','',12);
//El ancho de las celdas
$pdf->SetWidths(array(185));
//Datos de la receta
    
while ($row = $resultado->fetch_assoc()) {
    $pdf->setX(5);
    $pdf->Cell(10,8,utf8_decode($row['n_Medicamento']),1,0,'C',1);
    $pdf->Cell(30,8,$row['medicina'],1,0,'C',0);
    $pdf->Cell(20,8,$row['mg/ml'],1,0,'C',0);
    $pdf->Cell(45,8,$row['horas'].' horas',1,0,'C',0);
    $pdf->Cell(45,8,$row['dias'].' dias',1,0,'C',0);
    $pdf->Cell(50,8,$row['administracion'],1,1,'C',0);

}
    
$pdf->SetFont('Helvetica','B',12);
$pdf->setXY(10,150);
$pdf->Cell(0,0,'Nombre del doctor:',0,0,'L',0 );
$pdf->setXY(50,150);
$pdf->SetFont('Helvetica','',10);
$pdf->Cell(0,0,'DR. '.utf8_decode($row2['nombre_Doctor']),0,0,'',0);
$pdf->setXY(10,160);
$pdf->SetFont('Helvetica','B',15);
$pdf->Cell(0,0,'Favor de tomar el tratamineto completo.',0,0,'L',0 );
$pdf->setXY(10,180);
$pdf->SetFont('Helvetica','B',10);
$pdf->Cell(0,0,'Firma: ',0,0,'L',0 );
$pdf->setXY(22,181);
$pdf->Cell(45,0,'','B',0,'L',0 );
$pdf->Image ('assets/firmasdoctores/firma.png',23,162,35);
$pdf->SetFont('Helvetica','B',12);
$pdf->setXY(10,190);
$pdf->Row(array(utf8_decode
('Si se sientes mal nuevamnete o alguna persona que conosca, entre a nuestro sitio web para una consulta')));
$pdf->Image ('codigo_qr/temp/receta 1.png',70,205,70);
$pdf->Output();
?>
