<?php

//fetch_data.php

$connect = new PDO("mysql:host=localhost;dbname=esi-iot", "root", "");

if(isset($_POST["action"]))
{
	$query = "SELECT * FROM produits";
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
                <input type="checkbox" class="selectable" value="'.$row["id"].'" name="produits[]" >
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