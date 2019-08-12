<?php require_once("../controller/ControllerListar.php");?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include("head.php");?>

<head>
<link rel="stylesheet" href="css/estiloIndex.css">
</head>

<body >
   <?php include("menu.php"); ?>
<div id="table">
    <table class="table table-hover">
    <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Autor</th>
                <th>Qtd de Páginas</th>
                <th>Preço</th>
                <th>Data</th>
                <th>Status</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php new listarController();  ?>

        </tbody>
    </table>
</div>
    <img src="img/fundoIndex2.jpg" alt="some text">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
