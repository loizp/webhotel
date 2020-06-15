<form method="post" action="">
  <p>
  <input type="radio" name="radio[]" value="opcion 1">
  opcion 1<br>
  <input type="radio" name="radio[]" value="opcion 2">
  opcion 2<br>
  <input type="radio" name="radio[]" value="opcion 3">
  opcion 3 <br>
  <br>
  <input type="submit" name="Submit" value="Enviar">
</p>
</form>

<?php
if(isset($_POST["Submit"]))
{
    if(isset($_POST["radio"][0]))
        echo "Selecciono la primer opcion con valor = ".$_POST["radio"][0]."<br />";
    
    if(isset($_POST["radio"][1]))
        echo "Selecciono la segunda opcion con valor = ".$_POST["radio"][1]."<br />";
    
    if(isset($_POST["radio"][2]))
        echo "Selecciono la tercera opcion con valor = ".$_POST["radio"][2]."<br />";

}
?>