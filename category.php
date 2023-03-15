<!DOCTYPE html>
<head>
    <title>Category</title>
    <link rel="stylesheet" href="CSS/Category.css">
    <script src="javascript/jquery.js" type="text/javascript"></script>
    <script src="javascript/JQ.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filesaver.js"></script>
</head>
<body>
<?php
    $cat = $_GET['cat'];
    echo "<script> var categ='$cat';</script>";
    echo '<h1>'.$cat.'</h1>';
?>
<div class="form-filtrage" id="filtrer" style="display: block;">
 <form action="">
 <label for="purchase"><b>Purchase date  : </b></label>
 <input type="date" id="dattt" name="purchase">
 <br><br><br><br>
 <b> Filtrage Par etat:</b>
  <table>
    <tr>
        <td><label for="disponible"><b>Disponible </b></label></td>
        <td><input type="checkbox" class="common_selector etat" name="disponible" > </td>
    </tr>
    <tr>
        <td><label for="perdu"><b>perdu </b></label></td>
        <td>  <input type="checkbox" class="common_selector etat" name="perdu"></td>
    </tr>
    <tr>
        <td><label for="panne"><b>en panne </b></label></td>
        <td><input type="checkbox" class="common_selector etat" name="panne"></td>
    </tr>

  </table>
 </form>
</div>
<div class="form-popup" id="myForm" style="display: none;">
  <?php echo '<form action="insert.php?type='.$cat.'" class="form-container" method="post" >'; ?>

        <label for="name"><b>Name: </b></label>
        <input type="text" placeholder="Enter the name"  onkeyup="search()" name="name" required>

        <label for="purchase"><b>Purchase date: </b></label>
        <input type="date"  name="purchase" required>

        <label for="quantity"><b>Quantity: </b></label>
        <input type="text" name="quantity" required>

        <label for="etat"><b>Status: </b></label>
        <select class="choose" name="etat">
            <option>Disponible</option>
            <option>Perdu</option>
            <option>En Panne</option>
        </select>

        <button type="submit" class="btn" onclick="insert()">save</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<?php echo '<button type="button" onclick="openForm()">Add '.$cat.'</button>';?>
<button type="button" class="bouton" id="export"> Export Excel List</button>



<hr>
<div class='filter_data'>
  
  
</div>

<script>
    function openForm() {
    document.getElementById("myForm").style.display = "block";
    document.getElementById("filtrer").style.display = "none";
    }

    function closeForm() {
    document.getElementById("myForm").style.display = "none";
    document.getElementById("filtrer").style.display = "block";
    }
</script>

<script>
/***********************************      filtrage     ***************************************************/
/********************************************************************************************************/

filter_data();
var data_t = [];
function filter_data()
{
    var action = 'fetch_data';
    var etat = get_filter('etat');
    var dateValue;
    sendAjax();
    $("#dattt").on("change", function(){
        dateValue = $(this).val();
        sendAjax();
    });

    function sendAjax() {
        $.ajax({
            url:"filtrage.php",
            method:"POST",
            data:{action:action,etat:etat,categ:categ,dateValue:dateValue},
            success:function(data){
                $('.filter_data').html(data);
                data_t=[];
                $('.product-table tr').each(function(row, tr){
                    data_t[row]=[];
                    $(tr).find('th').each(function(col, th){
                        data_t[row][col] = $(th).text();
                    });   
                    $(tr).find('td').each(function(col, td){
                    if($(td).find("img").length > 0){
                        data_t[row][col] = $(td).find('img').attr('src');
                    }else{
                        data_t[row][col] = $(td).text();
                    }
                    });
                });
                console.log(data_t);
            }
        });
    }

}

function get_filter(class_name)
{
    var filter = [];
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).attr("name"));
    });
    return filter;
}


$('.common_selector').click(function(){
        filter_data();
    });

   
/****************************    exporter ficher exel ***************************************************/
/********************************************************************************************************/

$("#export").on("click", function(){
    var json = JSON.stringify(data_t);
    json=json.replace(/,"\\n                Modifier\\n                Supprimer\\n                "/g,'');
    json=json.replace(/\],\[/g,'\n');
    json=json.replace(/\[\[/g,'');
    json=json.replace(/\]\]/g,'');
    json=json.replace(/"/g,'');
    json=json.replace(/Actions/g,'');
    json=json.replace(/Image/g,'               Image                   ');
    json = json.replace(/,/g,';');
    var blob = new Blob([json], {type: 'text/csv;charset=utf-8;'});
    saveAs(blob, "data.csv");
});
</script>

</body>
</html>