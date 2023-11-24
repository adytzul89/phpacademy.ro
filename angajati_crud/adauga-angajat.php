<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Aplicatie simpla CreateReadUpdateDelete">
    <meta name="author" content="Adi AP">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angajati CRUD - Create-R-U-D</title>

    <link rel="stylesheet" href="styles.css">

    <style>
        .styleForm {
                padding:10px 0 10px 0;
        }

        label {
            display:block;
            margin-bottom:5px;
            font-weight:bold;
        }
        label address { font-size:12px; color:gray; }
        input[type=text]{
            width:95%;
            padding:10px;
            margin-bottom:10px;
            border:1px solid gray;
            border-radius:5px;
        }
        input[type=date]{
            width:200px;
            padding:10px;
            margin-bottom:10px;
            border:1px solid gray;
            border-radius:5px;
        }
        input[type=submit] {
            background-color:#007bff;
            opacity: .65;
            color:#fff;
            cursor:pointer;
            border:none;
            padding:10px 20px;
            border-radius:5px;
        }
        input[type=submit]:hover {
            background-color:#007bff;
            opacity: 1;
        }
    </style>

</head>
<body>
    
    <section class="menu nunito">
        <nav>
            <ul>
                <li><a href="index.php">Pagina principala</a></li>
                <li><a href="create-db.php">Create -> DB si tabel angajati</a></li>
                <li><a class="pagina-curenta" href="adauga-angajat.php">Add / Angajat</a></li>
                <li><a href="read_angajat.php">Read -> Angajat</a></li>
                <li><a href="update_angajat.php">Update -> Angajat</a></li>
                <li><a href="delete_angajat.php">Delete -> Angajat</a></li>
                </ul>
        </nav>
    </section>

    <section class="content">
        
        <div>
            
            <h3 class="fontBold">Adauga angajati</h3>
            
        </div>
        
        <hr>
        
        <div class="styleForm">

            <form action="adauga-angajat.php" method="POST">

                <label for="fnameAngajat">Nume angajat</label>
                <input type="text" name="fnameAngajat" id="fnameAngajat" required><br>
                
                <label for="lnameAngajat">Prenume angajat</label>
                <input type="text" name="lnameAngajat" id="lnameAngajat" required><br>
                
                <div class="clear">&nbsp;</div>

                <label for="phoneAngajat">Telefon Angajat</label>
                <input type="text" name="phoneAngajat" id="phoneAngajat" required><br>
                
                <label for="emailAngajat">Email Angajat</label>
                <input type="text" name="emailAngajat" id="emailAngajat" required><br>
                
                <div class="clear">&nbsp;</div>

                <label for="cnpAngajat">CNP Angajat</label>
                <input type="text" name="cnpAngajat" id="cnpAngajat" required><br>

                <div class="clear">&nbsp;</div>

                <label for="dataStartAngajat">Data Start Angajat</label>
                <input type="date" name="dataStartAngajat" id="dataStartAngajat" pattern="\d{4}-\d{2}-\d{2}" min="2023-01-01" max="2023-12-31" value="2023-01-01"><br>

                <div class="clear">&nbsp;</div>

                <input type="submit" name="trimiteDatele" value="ADAUGA">

            </form>

        </div>

<div style="background:black; color:#00f700; padding:10px">        

<?php

    if(isset($_POST['trimiteDatele'])){
        $fnameAngj = $_POST['fnameAngajat'];
        $lnameAngj = $_POST['lnameAngajat'];
        $phoneAngj = $_POST['phoneAngajat'];
        $emailAngj = $_POST['emailAngajat'];
        $cnpAngj = $_POST['cnpAngajat'];
        $startAngj = $_POST['dataStartAngajat'];

        // includem config pentru conexiune la db
        include_once ("config.php");

        // adaugam datele din formular in db
        $result = mysqli_query($conn, "INSERT INTO angajati(nume_angajat,prenume_angajat,telefon_angajat,email_angajat,cnp_angajat,data_start_angajat) VALUES ('$fnameAngj','$lnameAngj','$phoneAngj','$emailAngj','$cnpAngj','$startAngj')");
        
        // confirmare pentru adaugare cu success
        echo "Angajat adaugat cu success.";

    }
    else { echo "<i>Completeaza formularul pentru a inregistra un aganjat!</i>"; }
    ?>

</div>

    </section>

    <footer>
        <div class="copyright">
            <p class="textCenter">© Copyright 2023-11nov-- Adi Pop</p>
        </div>
    </footer>

</body>
</html>