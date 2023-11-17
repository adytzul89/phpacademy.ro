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
    </style>

</head>
<body>
    
    <section class="menu nunito">
        <nav>
            <ul>
                <li><a href="index.php">Pagina principala</a></li>
                <li><a class="pagina-curenta" href="create-db.php">Create / DB si tabel angajati</a></li>
                <li><a href="adauga-angajat.php">Add -> Angajat</a></li>
                <li><a href="read_angajat.php">Read -> Angajat</a></li>
                <li><a href="update_angajat.php">Update -> Angajat</a></li>
                <li><a href="delete_angajat.php">Delete -> Angajat</a></li>
                </ul>
        </nav>
    </section>

    <section class="content">
        
        <div>
            
            <h3 class="fontBold">Creaza DB cu tabel 'angajati'</h3>
            
        </div>
        
        <hr>
        
        <div class="styleForm">

            <form action="" method="POST">

                <label for="localhost">Localhost*<br><address>default is localhost</address></label>
                <input type="text" name="localhost" id="localhost" value="localhost"><br>
                
                <div class="clear">&nbsp;</div>

                <label for="dbName">DB Name</label>
                <input type="text" name="dbName" id="dbName" value="angajati_2023"><br>
                
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

<div style="background:black; color:#00f700; padding:10px">        
    <?php

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

                $sqlangajati = "CREATE TABLE angajati(
                    id_angajat INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    nume_angajat VARCHAR(255) NOT NULL,
                    prenume_angajat VARCHAR(255) NOT NULL,
                    telefon_angajat VARCHAR(255) NOT NULL,
                    email_angajat VARCHAR(255) NOT NULL,
                    cnp_angajat VARCHAR(255) NOT NULL,
                    data_start_angajat VARCHAR(255) NOT NULL,
                    reg_angajat TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
                executeQuery($conn,$sqlangajati, "Tabela 'angajati' creat cu succes!");

                try{
                    if($conn->multi_query($sql) == "TRUE"){

                        echo '<br>---<br>';
                        $_SESSION['successMessage'] = 'Baza de date si tabela sunt inregistrate cu success!';
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
            echo "<address>Completati campurile!</address>";
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
</div>

    </section>

    <footer>
        <div class="copyright">
            <p class="textCenter">© Copyright 2023-11nov-- Adi Pop</p>
        </div>
    </footer>

</body>
</html>