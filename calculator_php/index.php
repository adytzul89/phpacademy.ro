<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator PHP si HTML by Adi AP</title>

    <style>
        body { background-color:#f1f1f1 }
        .textCenter { text-align:center }
        section.calculator {
            position:relative;
            width:500px;
            margin:0 auto;
            background:#cccccc;
            padding:2rem;
            border-bottom-right-radius: 50px;
        }
        section.calculator input#rezultat { width:50px }
    </style>
</head>
<body>

<section class="calculator">

<h2 class="textCenter">Calculator</h2>
<hr/>

<?php
if (isset($_POST['submit'])) {
  // obtine valorile din formular
  $num1 = $_POST['num1'];
  $operator = $_POST['operator'];
  $num2 = $_POST['num2'];

  // verifica operator ales si incepe calul
  if ($operator == 'add') {
    $result = $num1 + $num2;
  } elseif ($operator == 'subtract') {
    $result = $num1 - $num2;
  } elseif ($operator == 'multiply') {
    $result = $num1 * $num2;
  } elseif ($operator == 'divide') {
    $result = $num1 / $num2;
  } elseif ($operator == 'pow') {
    $result = pow($num1,$num2);
  }
  
} 
?>

<form action="index.php" method="post">
    <label for="numar1">Introduceti numarul pentru X</label>  
    <input type="text" name="num1" id="numar1">
    <br/><br/>
    <label for="operator">Alege operator</label>
    <select name="operator" id="operator">
        <option value="add">adunare +</option>
        <option value="subtract"> scadere -</option>
        <option value="multiply">inmultire *</option>
        <option value="divide">impartire /</option>
        <option value="pow">ridicare la putere</option>
    </select>
    <br/><br/>
    <label for="numar2">Introduceti numarul pentru Y</label>
    <input type="text" name="num2" id="numar2">
    <br/><br/>
    <input type="reset" name="reset" value="Reseteaza"/> 
        sau
    <input type="submit" name="submit" value="Calculeaza">

</form>

<br/><br/>
    <!-- <div for="rezultat">Rezultatul calcului dintre <?php //echo $num1 '<sup><i>' $operator '</i></sup>' $num2 ?> este: </div> -->
    <span>
    <?php
        if (isset($result)) {
            echo " Rezultatul calcului dintre x=$num1 utilizand operatorul <sup>$operator</sup> si y=$num2 este <b>$result</b>"; }
            else { echo 'Alege un numar X urmat de un operator apoi un numar Y si calculeaza'; }
    ?>
    </span>

</section>

<br/><br/>

<footer class="textCenter">
&copy; Copyright - Adi Pop
</footer>

</body>
</html>