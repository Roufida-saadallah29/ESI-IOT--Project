<?php

//fetch_data.php

$connect = new PDO("mysql:host=localhost;dbname=esi-iot", "root", "");

if(isset($_POST["action"]))
{
    $cat=$_POST["categ"];
	$query = "SELECT * FROM produits WHERE categorie='$cat'  ";
	if(isset($_POST["etat"]))
	{
		$etat_filter = implode("','", $_POST["etat"]);
		$query .= "
        AND etat IN('".$etat_filter."')
		";
	}
    if (!empty($_POST['dateValue'])) {
        $dateValue = $_POST['dateValue'];
        $query .= "
        AND dateAchat='".$dateValue."'
		";
    }
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
        $output .= '<table class="product-table">
        <thead><tr>
         <th>Nom</th>
         <th>Date d\'achat</th>
         <th>Etat</th>  <th>Quantité</th>  
         <th>Image</th>   
         <th>Actions</th> </tr> 
         </thead>
         <tbody>
         ';
		foreach($result as $row)
		{
			$output .= '
            <tbody>
            <tr> 
                <td>'.$row["nom"].'</td> 
                <td>'.$row["dateAchat"].'</td>  
                <td>'.$row["etat"].'</td>  
                <td>'.$row["quantite"].'</td>
                <td><img src="imageprod/'.$row["image"].' " width="80" height="80"></td>
                <td>
                <button  class="modify-btn" onclick="window.location.href =\'edit.php?idelem='.$row["id"].'&&cat='.$cat.'\'">Modifier</button>
                <button  class="delete-btn" onclick="window.location.href =\'delete.php?idelem='.$row["id"].'&&cat='.$cat.'\'">Supprimer</button>
                </td> 
            </tr> ';
		}
            
        $output .= '  </tbody></table>';

	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>