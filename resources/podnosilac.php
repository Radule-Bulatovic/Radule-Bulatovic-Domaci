<?php
include './connect.php';
$sql = "
            SELECT  
                p.id as id,
                p.ime as ime,
                p.prezime as prezime,
                p.jmbg as jmbg,
                g.naziv as grad
            FROM podnosilac as p 
            JOIN grad as g
            ON p.grad_id = g.id";
$res = mysqli_query($dbcon, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css" />
</head>

<body>
    <div class="container">
        <p class="display-4 text-center mt-5">Tabela podnosilaca</p>
        <a href="../index.php" class="btn btn-success mt-5 mb-3">Prijave</a>
        <a href="./novi_podnosilac.php" class="btn btn-primary pull-right mt-5 mb-3">Dodaj podnosioca</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Grad</th>
                        <th>JMBG</th>
                        <th>Izmjena</th>
                        <th>Brisanje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $ime = $row['ime'];
                        $prezime = $row['prezime'];
                        $jmbg = $row['jmbg'];
                        $grad = $row['grad'];
                        $izmjena = "<a href=\"./izmjena_podnosioca.php?id=$id\"><i class=\"fa fa-edit fa-2x pl-3\"></i></a>";
                        $brisanje = "<a href=\"./brisanje_podnosioca.php?id=$id\"><i class=\"fa fa-trash-o fa-2x pl-3\"></i></a>";
                        echo "<tr><td>" . $ime . "</td><td>" . $prezime . "</td><td>" . $grad . "</td><td>" . $jmbg . "</td><td>" . $izmjena . "</td><td>" . $brisanje . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
</body>

</html>