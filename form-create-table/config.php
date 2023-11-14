<?php
/*
conexiunea la baza de date prin formualar
html / css / php
*/

if($_SERVER["REQUEST_METHOD"] === "POST"){

    //obtinem datele din forms

    $localhost = $_POST["localhost"];
    $dbName = $_POST["dbName"];
    $username = $_POST["dbusername"];
    $password = $_POST["dbpassword"];

        //ne conectam la server mysql

        $conn = new mysqli($localhost,$username,$password);
        //verificam conexiunea

        if ($conn->connect_error){
            die("Conexiune esuata!" . $conn->connect_error);
        }
        //facem baza de date

        //creare baza de date --> tabel

        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";

        executeQuery($conn,$sql,"Baza de date numita '$dbName' creata cu success!<br>");

        //selectam baza de date

        $conn->select_db($dbName);

        //creare tabel

        $sqlcontact = "CREATE TABLE contact(
            id_contact INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nume VARCHAR(255) NOT NULL,
            subiect_contact VARCHAR(255) NOT NULL,
            email_contact VARCHAR(255) NOT NULL,
            data_trimitere_contact TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        executeQuery($conn,$sqlcontact, "Tabelul 'contact' creat cu succes!");

        $sqlstudenti = "CREATE TABLE studenti(
            id_studenti INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(255) NOT NULL,
            last_name VARCHAR(255) NOT NULL,
            passwordStudenti VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            photo VARCHAR(255) NOT NULL,
            friends VARCHAR(255) NOT NULL,
            course VARCHAR(255) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        executeQuery($conn,$sqlstudenti, "Tabelul 'studenti' creat cu succes!");

        $sqlplatile = "CREATE TABLE plati(
            id_plati INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            metoda_plata ENUM('paypal', 'revolut', 'bt') NOT NULL,
            statusPlata ENUM('in_curs_de_plata', 'platit', 'plata_respinsa', 'plata_acceptata', 'plata_in_curs_de_verificare')NOT NULL
        )";
        executeQuery($conn,$sqlplatile, "Tabelul 'plati' creat cu succes!");

        $sqlsmtp = "CREATE TABLE smtpsetting(
            ssl_smtp VARCHAR(255) NOT NULL,
            tls_smtp VARCHAR(255) NOT NULL,
            server_host VARCHAR(255) NOT NULL,
            nume_host VARCHAR(255) NOT NULL,
            parola_host VARCHAR(255) NOT NULL,
            email_host VARCHAR(255) NOT NULL
        )";
        executeQuery($conn,$sqlsmtp, "Tabelul 'SMTP' creat cu succes!");

        $sqlsite = "CREATE TABLE sitesetting(
            id_site INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nume_site VARCHAR(255) NOT NULL,
            limba_site VARCHAR(255) NOT NULL,
            contact_site VARCHAR(255) NOT NULL
        )";
        executeQuery($conn,$sqlsite, "Tabelul 'site setting' creat cu succes!");

        $sqlvdeo = "CREATE TABLE videoclipuri(
            id_video INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nume_video VARCHAR(255) NOT NULL,
            link_video VARCHAR(255) NOT NULL
        )";
        executeQuery($conn,$sqlvdeo, "Tabelul 'videoclipuri' creat cu succes!");

        $sqlstaff = "CREATE TABLE staff(
            id_admin INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            permisiuni ENUM('super_admin','medium_admin','minim_admin') NOT NULL,
            link_video VARCHAR(255) NOT NULL
        )";
        executeQuery($conn,$sqlstaff, "Tabelul 'staff' creat cu succes!");

        $sqlcursuri = "CREATE TABLE cursuri(
            id_curs INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nume_curs VARCHAR(255) NOT NULL,
            pret_curs VARCHAR(255) NOT NULL,
            descriere_curs VARCHAR(255) NOT NULL,
            poza_curs VARCHAR(255) NOT NULL,
            instructor_curs VARCHAR(255) NOT NULL,
            ora_curs VARCHAR(255) NOT NULL,
            data_curs VARCHAR(255) NOT NULL,
            sfarsit_curs VARCHAR(255) NOT NULL
        )";
        executeQuery($conn,$sqlcursuri, "Tabelul 'cursuri' creat cu succes!");

        try{
            if($conn->multi_query($sql) == "TRUE"){

                echo '<br>---<br>';
                $_SESSION['successMessage'] = 'Baza de date si tabelele au fost inregistrare cu success!';
                $_SESSION['dbData'] = array(
                    'localhost' => $localhost,
                    'dbName' => $dbName,
                    'username' => $username,
                    'password' => $password
                );
                //header(header:"Location: index.php");
                echo $_SESSION['successMessage'];
                //exit();

            }
        } catch (Exception $exception) {
                echo "UPS: ". $conn->error. "<br>";
            }

            $conn->close();

} else {
    echo "Completati campurile!";
}

function executeQuery($conn,$sql,$successMessage){
    try{
        if($conn->multi_query($sql) === TRUE){
            echo $successMessage . '<br>';
    }
    } catch(Exception $eroare) {
            echo "Eroare: ". $conn->error . '<br>';
    }
}

?>

<!DOCTYPE html>
<html lang="ro">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formular - Conexiunea la baza de date</title>

        <style>

            body { 
                background-color:#f1f1f1;
                padding:10px;
            }

            .firstSection {
                margin:auto;
                display:block;
                position:relative;
                max-width:600px;
                background-color:#fff;
                padding:10px;
                border:1px solid gray;
                border-radius:10px;
                font-size:16px;
            }

            .styleForm {
                padding:10px 0 10px 0;
            }

            label {
                display:block;
                margin-bottom:5px;
                font-weight:bold;
            }
            label address { font-size:12px; color:gray; }
            input[type=text], input[type=password] {
                width:95%;
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

            footer { 
                display:block;
                margin-top:5rem;
                padding:20px 0 0 10px;
                border-top:2px solid gray;
            }

        </style>

    </head>
    <body>
        
        <section class="firstSection">

            <h2>Conectare la baza de date</h2>

            <div class="styleForm">

                <form action="" method="POST">

                    <label for="localhost">Localhost*<br><address>default is localhost</address></label>
                    <input type="text" name="localhost" id="localhost" value="localhost"><br>
                    
                    <div class="clear">&nbsp;</div>

                    <label for="dbName">DB Name</label>
                    <input type="text" name="dbName" id="dbName"><br>
                    
                    <div class="clear">&nbsp;</div>

                    <label for="dbusername">DB Username*<br><address>default is root</address></label>
                    <input type="text" name="dbusername" id="dbusername" value="root"><br>

                    <div class="clear">&nbsp;</div>

                    <label for="dbpassword">Password*<br><address>default is blank</address></label>
                    <input type="text" name="dbpassword" id="dbpassword"><br>

                    <div class="clear">&nbsp;</div>

                    <input type="submit" value="CONNECT">

                </form>

            </div>

        </section>

        <footer>
            &copy; Copyright 2023-11nov-- Adi Pop
        </footer>
    </body>
</html>