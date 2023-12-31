<?php 

// facem conexiunea la db
include_once ("config.php");

//selectam datele din tabela angajati pentru a afisa mai jos in tabel
$result = mysqli_query($conn,"SELECT * FROM angajati ORDER BY id_angajat ASC");

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Aplicatie simpla CreateReadUpdateDelete">
    <meta name="author" content="Adi AP">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angajati CRUD - C-Read-U-D</title>

    <link rel="stylesheet" href="styles.css">

    <style>
        /* stilizare tabel angajati */
        table { border:2px solid #f1f1f1; }
        th, td { 
            border:1px solid #cccccc;
            padding:10px }
    </style>
    
</head>
<body>
    
    <section class="menu nunito">
        <nav>
            <ul>
                <li><a href="index.php">Pagina principala</a></li>
                <li><a href="create-db.php">Create -> DB si tabel angajati</a></li>
                <li><a href="adauga-angajat.php">Add -> Angajat</a></li>
                <li><a class="pagina-curenta" href="read_angajat.php">Read / Angajat</a></li>
                <li><a href="update_angajat.php">Update -> Angajat</a></li>
                <li><a href="delete_angajat.php">Delete -> Angajat</a></li>
                </ul>
        </nav>
    </section>

    <section class="content">
        
        <div>
            
            <h3 class="fontBold">Afiseaza angajati</h3>
            
        </div>
        
        <hr>
        
        <div>

            <table class="tg" style="width:100%">
                <thead>
                <tr>
                    <th class="">ID</th>
                    <th class="">Nume / Prenume</th>
                    <th class="">Telefon</th>
                    <th class="">Email</th>
                    <th class="">CNP</th>
                    <th class="">Data angajare</th>
                    <th class="">reg</th>
                    <th class="">Modifica</th>
                </tr>
                </thead>
                <tbody>

                <?php
                    while ($user_data = mysqli_fetch_array($result)){

                        //preluam datele din db si le afisam in tabel

                        echo "<tr>";
                        echo "<td>".$user_data['id_angajat']."</td>";
                        echo "<td>".$user_data['nume_angajat'].' '.$user_data['prenume_angajat']."</td>";
                        echo "<td>".$user_data['telefon_angajat']."</td>";
                        echo "<td>".$user_data['email_angajat']."</td>";
                        echo "<td>".$user_data['cnp_angajat']."</td>";
                        echo "<td>".$user_data['data_start_angajat']."</td>";
                        echo "<td>".$user_data['reg_angajat']."</td>";
                        echo "<td><a href='edit.php?id=$user_data[id_angajat]'>Edit</a> | <a href='delete.php?id=$user_data[id_angajat]'>Delete</a>";
                        //DE ADAUGAT: coloana cu vechime, calcul cu vechime
                    }
                ?>

                <!-- <tr>
                    <td class="">1</td>
                    <td class="">Adi AP</td>
                    <td class="">0723111111</td>
                    <td class="">adytzul89@gmail.com</td>
                    <td class="">1890000000000</td>
                    <td class="">2023-11-24</td>
                    <td class="">2023-11-25 23:11:59</td>

                </tr>
                <tr>
                <td class="">2</td>
                    <td class="">Dorel Mare</td>
                    <td class="">0723222222</td>
                    <td class="">dorel.mare@mail.com</td>
                    <td class="">1790000000000</td>
                    <td class="">2023-09-21</td>
                    <td class="">2023-09-22 23:11:59</td>
                </tr> -->
                </tbody>
            </table>

        </div>

    </section>

    <footer>
        <div class="copyright">
            <p class="textCenter">© Copyright 2023-11nov-- Adi Pop</p>
        </div>
    </footer>

</body>
</html>