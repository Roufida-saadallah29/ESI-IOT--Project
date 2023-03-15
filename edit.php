<!DOCTYPE html>
<head>
    <title>Category</title>
    
    <script src="javascript/jquery.js" type="text/javascript"></script>
    <script src="javascript/JQ.js"></script>
    <link rel="stylesheet" href="CSS/edit.css">
</head>
<body>
<?php

$connect = new PDO("mysql:host=localhost;dbname=esi-iot", "root", "");
    $id = $_GET['idelem'];
    $cat=$_GET['cat'];
    $sql = "SELECT * FROM produits where id = '$id'";
    $result = $connect->query($sql);
    $data = $result->fetch($connect::FETCH_ASSOC);
?>
<h1>Edit Product <?=$data['nom']?></h1>
<div class="form-popup" id="myForm" style="display: block;">
 
<?php echo '<form action="modify.php?type='.$cat.'&&id='.$id.'" class="form-container" method="post" >'; ?>

        <label for="purchase"><b>Purchase date: </b></label>
        <input type="date" placeholder="yyyy/mm/dd" name="purchase" value="<?= $data['dateAchat']?>" required>

        <label for="quantity"><b>Quantity: </b></label>
        <input type="text" name="quantity" required value="<?= $data['quantite']?>">

        <label for="etat"><b>Status: </b></label>
        <select class="choose" name="etat">
            <option value="Disponible">Disponible</option>
            <option value="Perdu">Perdu</option>
            <option value="Panne">En Panne</option>
        </select>

        <button type="submit" class="btn" >save</button>
</form>
</div>

</body>
</html>
