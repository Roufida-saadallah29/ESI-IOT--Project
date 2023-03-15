<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Category.css">
    <script src="javascript/jquery.js" type="text/javascript"></script>
    <script src="javascript/JQ.js"></script>
    <title>Form</title>
</head>
<body>
<div>
<!-- <form>
  <input type="checkbox" class="selectable" value="option1">Option 1 <br>
  <input type="checkbox" class="selectable" value="option2">Option 2 <br>
  <input type="checkbox" class="selectable" value="option3">Option 3 <br>
</form> -->
<h1>Decharge</h1>

  <form action="creeWord.php" class="form-container" method="post" >
   
    <label for="name"><b>Etudiant Name: </b></label>
    <input type="text" placeholder="Enter the name" name="name" required>
    <br>
    <br>
    <div class='filter_data'>
  
  
    </div>
    <br>
    <br>
    <button type="submit" class="bouton">submit</button>

  </form> 
</div>
<script>

$(document).ready(function(){
        $("form").submit(function(){
            if(!$('input[type="checkbox"]').is(':checked')){
                alert("You must select at least one option");
                return false;
            }
        });
    });
filter_data();
    var selected = [];
$('.selectable').change(function() {
    if(this.checked) {
        selected.push($(this).val());
    }else{
        var index = selected.indexOf($(this).val());
        selected.splice(index, 1);
    }
});
function filter_data()
{
    var action = 'fetch_data';

    sendAjax();
    function sendAjax() {
        $.ajax({
            url:"options.php",
            method:"POST",
            data:{action:action},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

}
</script>
</body>
</html>