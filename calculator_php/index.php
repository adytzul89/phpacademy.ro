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
    </style>
</head>
<body>

<section class="calculator">

<h2 class="textCenter">Calculator</h2>
<hr/>

    <form action="" method="get">

        <label for="numberX">Introduceti numarul pentru X</label>
        <input type="number" name="numberX" id="numberX" required/>
        <br/><br/>
        <label for="alegeOperator">Alege operator</label>
        <select name="alegeOperator" id="alegeOperator">
            <option name="plus" value="+">adunare ' + '</option>
            <option name="minus" value="-">scadere ' - '</option>
            <option name="inmultire" value="*">inmultire ' * '</option>            
            <option name="impartire" value="/">impartire ' / '</option>
        </select>
        <br/><br/>
        <label for="numberY">Introduceti numarul pentru Y</label>
        <input type="number" name="numberY" id="numberY" required/>
        <br/><br/>
        <input type="reset" name="reset" id="reset" value="Reseteaza"/> 
        sau
        <input type="submit" name="calculeaza" id="calculeaza" value="Calculeaza"/>
        <br/><br/>
        Rezultatul este: ...

    </form>

</section>

<br/><br/>

<footer class="textCenter">
&copy; Copyright - Adi Pop
</footer>

</body>
</html>

<?php

?>