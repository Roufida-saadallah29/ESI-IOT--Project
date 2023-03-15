<?php
   
    $nom = $_POST['name'];
    $date = $_POST['purchase'];
    $quantity = $_POST['quantity'];
    $etat = $_POST['etat'];
    $type = $_GET['type'];
   
    $connect = new PDO("mysql:host=localhost;dbname=esi-iot", "root", "");
    $image="";
    $image = image($nom,$type,$connect);
    function image($nom,$type,$connect) {
    
    $requete2 = "SELECT image from possible where nom = '".$nom."'";
    $result = $connect->query($requete2);
    $final = $result->fetch($connect::FETCH_ASSOC);
    if ($final)
    {
        
      $requete = "INSERT INTO produits(nom, dateAchat, etat, quantite, image, categorie) 
      VALUES ('$nom', '$date', '$etat', '$quantity', '$image', '$type')";
     $query = $connect->exec($requete);
        
        return $final['image'];
    }
    else
    {
        echo '<script>
        if (confirm("'.$nom.' doesnt exist in our database ")) {
            window.location.href = "category.php?cat='.$type.'";
        }
        else{window.location.href = "category.php?cat='.$type.'";}
        </script>';
        
    }
   
    };

    if($image!="")
    {
        echo '<script>
        if (confirm("insertion succed")) {
            window.location.href = "category.php?cat='.$type.'";
        }
        else{window.location.href = "category.php?cat='.$type.'";}
        </script>'; 
    }


