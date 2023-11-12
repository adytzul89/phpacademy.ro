<?php
/*
conexiunea la baza de date prin formualar
html / css / php
*/

/*
if($_SERVER["REQUEST_METHOD"] == "POST" ){

    //obtinem date din formular
    $localhost = $_POST["localhost"];
    $dbName = $_POST["dbName"];
    $username = $_POST["dbusername"];
    $password = $_POST["dbpassword"];

    //connectare la mysql
    $conn = new mysqli($localhost,$username,$password);

    //verificare conexiune
    if($conn->connect_error){
        die("Conexiune ratata" . $conn->connect_error);
    }

    //facem baza de date

     //cream bd apoi tabele 

    $sql = "CREATE DATABASE `$dbName`";
    
    executeQuery($conn,$sql, "DB creata cu succes!");

    //selectam baza de date
    $conn->select_db($dbName);

    //cream tabel - users
    $sql = "CREATE TABLE users(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        utilizator VARCHAR(60) NOT NULL,
        parola VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

    executeQuery($conn,$sql, "Tabel creat cu succes!");

    if($conn->multi_query($sql) === "TRUE"){

        $_SESSION['successMessage'] = 'Baza de date a fost configurata cu succes!';
        $_SESSION['dbData'] = array (
            'localhost' => $localhost,
            'dbName' => $dbName,
            'username' => $username,
            'password' => $password
        );
        header(header: "Location: index.php");
        exit();
    } else {
        echo "Eroare: ". $conn->error. "<br>";
    }
    $conn->close();

} else {
    echo "Datele din formular nu au fost trimise corect!";
}

function executeQuery($conn,$sql,$successMessage){
    if($conn->multi_query($sql) === TRUE) {
        echo $successMessage . '<br>';
    }
}
*/

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //obtinem datele din forms

    $localhost = $_POST["localhost"];
    $dbName = $_POST["dbName"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    //ne conectam la server mysql

    $conn = new mysqli($localhost,$username,$password);
    //verificam conexiunea

    if($conn->connect_error){
        die("Conexiune esuata!" . $conn->connect_error);
    }
    //facem baza de date

    /*
     * facem baza de date apoi tabela
     */

    $sql = "CREATE DATABASE `$dbName`";

    executeQuery($conn,$sql,"Baza de date creata cu success!");

    //selectam baza de date

    $conn->select_db($dbName);

    //creare tabel - users

    $sql = "CREATE TABLE users(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        utilizator VARCHAR(60) NOT NULL,
        parola VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

        executeQuery($conn,$sql,"Tabelul creat cu succes!");

        if($conn->multi_query($sql) === "TRUE"){

            $_SESSION['successMessage'] = 'Baza de date configurate cu bine!';
            $_SESSION['dbData'] = array(
                'localhost' => $localhost,
                'dbName' => $dbName,
                'username' => $username,
                'password' => $password
            );
            header(header:"Location: index.php");
            exit();

        } else {
            echo "Eroare: ". $conn->error. "<br>";
        }
        $conn->close();

} else {
    echo "Datele din formular nu au fost trimise corect!";
}

function executeQuery($conn,$sql,$successMessage){

    if($conn->multi_query($sql) === TRUE){
        echo $successMessage . '<br>';
    } else {
        echo "Eroare: " .$conn->error . '<br>';
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

                <form action="" method="">

                    <label for="localhost">Localhost</label>
                    <input type="text" name="localhost" id="localhost"><br>
                    
                    <div class="clear">&nbsp;</div>

                    <label for="dbName">DB Name</label>
                    <input type="text" name="dbName" id="dbName"><br>
                    
                    <div class="clear">&nbsp;</div>

                    <label for="dbusername">DB Username</label>
                    <input type="text" name="dbusername" id="dbusername"><br>

                    <div class="clear">&nbsp;</div>

                    <label for="dbpassword">Password</label>
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