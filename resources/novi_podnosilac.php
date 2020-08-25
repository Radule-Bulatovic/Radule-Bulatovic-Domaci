<?php
include "./connect.php";

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
        <div class="row">
            <div class="col-6 offset-3">
                <p class="display-4 text-center mt-5">Dodaj podnosioca</p>
                <form action="./novi_podnosilac_back.php" method="post">
                    <div class=" form-group">
                        <label for="">Ime:</label>
                        <input class="form-control" type="text" name="ime">
                    </div>
                    <div class=" form-group">
                        <label for="">Prezime:</label>
                        <input class="form-control" type="text" name="prezime">
                    </div>
                    <div class=" form-group">
                        <label for="">JMBG:</label>
                        <input class="form-control" type="text" name="jmbg">
                    </div>
                    <div class=" form-group">
                        <label for="">Grad:</label>
                        <select name="grad" class="form-control">
                            <option value="">- Odaberite grad -</option>
                            <?php
                            $sql = "SELECT * FROM grad";
                            $res = mysqli_query($dbcon, $sql);
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $grad = $row['naziv'];
                                echo "<option value=\"$id\" >$grad</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <button type="sumbit" name="submit" class="btn btn-success btn-block mt-5">Dodaj podnosioca</button>
                        </div>
                        <div class="col">
                            <a href="./podnosilac.php" class="btn btn-danger btn-block mt-5">Otkazi</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
</body>

</html>