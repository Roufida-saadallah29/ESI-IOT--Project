<?php

require "autoload.php";
use \PHPOffice\PhpWord\PhpWord;
use \PHPOffice\PhpWord\Style\Font;
//use \PHPOffice\PhpWord\IOFactory;

//$phpword= new PhpWord();
$phpWord = new PhpWord();
$header = ['size' => 16, 'bold' => true];
$section = $phpWord->addSection();
// $section->addText('color', ['color' => '996699']);

$section->addText(''.$_POST['name'].'', $header);
$fancyTableStyleName = 'Fancy Table';
$fancyTableStyle = ['borderSize' => 0,5, 'borderColor' => '006699', 'cellMargin' => 80, 'alignment' => \PHPOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50];
$fancyTableFirstRowStyle = ['borderBottomSize' => 2, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF'];
$fancyTableCellStyle = ['valign' => 'center'];
$fancyTableCellBtlrStyle = ['valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR];
$fancyTableFontStyle = ['bold' => false];
$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);

$table->addRow(900);
$table->addCell(2000, $fancyTableCellStyle)->addText('Nom Produit', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('Categorie', $fancyTableFontStyle);




if (isset($_POST['produits'])) {
    $connect = new PDO("mysql:host=localhost;dbname=esi-iot", "root", "");

    // $section->addText('color', ['color' => '996699']);
    $produits = implode("','", $_POST['produits']);
    $query = "SELECT * FROM produits WHERE id IN('".$produits."') "; 
    $statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount(); 
	if($total_row > 0)
	{
        foreach($result as $row)
		{
            $table->addRow();
            $table->addCell(2000)->addText(''.$row["nom"].'');
            $table->addCell(2000)->addText(''.$row["categorie"].'');
            $quant=intval($row["quantite"])-1;
            $query2 = "  UPDATE produits SET quantite='".strval($quant)."' WHERE id='".$row["id"]."'";
            $statement2 = $connect->prepare($query2);
            $statement2->execute();
          
        }   
    }
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('decharge/'.$_POST['name'].'.docx');
    echo '<script> alert("Succed");<\script>';
    header(header:'location: Dashboard.php');
} 
else
{
    header(header:'location: formDecharge.php');
}

