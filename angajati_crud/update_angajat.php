<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Aplicatie simpla CreateReadUpdateDelete">
    <meta name="author" content="Adi AP">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angajati CRUD - C-R-Update-D</title>

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

        .txtWhite { color:#fff }
    </style>

</head>
<body>
    
    <section class="menu nunito">
        <nav>
            <ul>
                <li><a href="index.php">Pagina principala</a></li>
                <li><a href="create-db.php">Create -> DB si tabel angajati</a></li>
                <li><a href="adauga-angajat.php">Add -> Angajat</a></li>
                <li><a href="read_angajat.php">Read -> Angajat</a></li>
                <li><a class="pagina-curenta" href="update_angajat.php">Update / Angajat</a></li>
                <li><a href="delete_angajat.php">Delete -> Angajat</a></li>
                </ul>
        </nav>
    </section>

    <section class="content">
        
        <div>
            
            <h3 class="fontBold">Actualizare angajat: < NUME ></h3>
            
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
                <input type="date" name="dataStartAngajat" id="dataStartAngajat" min="2023-01-01" max="2023-12-31" value="2023-01-01"><br>

                <div class="clear">&nbsp;</div>

                <input type="submit" name="trimiteDatele" value="ACTUALIZEAZA">

            </form>

        </div>

    </section>

    <footer>
        <div class="copyright">
            <p class="textCenter">© Copyright 2023-11nov-- Adi Pop</p>
        </div>
    </footer>

</body>
</html>