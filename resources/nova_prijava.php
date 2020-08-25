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
        <div class="row mb-5">
            <div class="col-6 offset-3">
                <p class="display-4 text-center mt-5">Nova prijava</p>
                <form action="./nova_prijava_back.php" method="post" enctype="multipart/form-data">
                    <div class=" form-group">
                        <label for="">Podnosilac:</label>
                        <select name="podnosilac" class="form-control" id="podnosilac-select">
                            <option value="">Odaberite podnosioca</option>
                            <?php
                            $sql = "SELECT * FROM podnosilac";
                            $res = mysqli_query($dbcon, $sql);
                            while ($row = mysqli_fetch_assoc($res)) {
                                $ime = $row['ime'];
                                $prezime = $row['prezime'];
                                $id = $row['id'];
                                $grad_id = $row['grad_id'];
                                echo "<option data-id=\"$grad_id\" value=\"" . $id . "\" >" . $ime . " " . $prezime . "</option>";
                            }
                            ?>
                        </select>
                        <div class="form-check mt-4 pl-1">
                            <input type="checkbox" name="" id="check">
                            <label for="check" id="odgovor">Prijava se odnosi na grad u kojem zivim</label>
                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="">Grad:</label>
                        <select name="grad" class="form-control" id="grad-select">
                            <option value="">Odaberite grad</option>
                            <?php

                            $sql = "SELECT * FROM grad";
                            $res = mysqli_query($dbcon, $sql);
                            while ($row = mysqli_fetch_assoc($res)) {
                                $ime = $row['naziv'];
                                $id = $row['id'];
                                echo "<option value=\"" . $id . "\">" . $ime . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class=" form-group">
                        <label for="">Opis:</label>
                        <textarea class="form-control" name="opis" rows="4" cols="50" placeholder="Unesite opis">
                        </textarea>
                    </div>
                    <div class=" form-group">
                        <label for="">Uploadujte sliku:</label>
                        <input type="file" name="slika" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="sumbit" name="submit" class="btn btn-success btn-block mt-5">
                                Sacuvaj prijavu
                            </button>
                        </div>
                        <div class="col">
                            <a href="../index.php" class="btn btn-danger btn-block mt-5">
                                Otkazi prijavu
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>

    <script type="text/javascript">
        var grad_id = null;

        function selGrad() {
            $.ajax({
                type: 'GET',
                url: './nova_prijava.php',
                contentType: "application/json; charset=utf-8",
                success: function(response) {
                    $('#podnosilac-select').change(function() {
                        if ($("#check").is(':checked')) {
                            grad_id = $("#podnosilac-select").find(':selected').data("id");
                            $('#grad-select').val(grad_id);
                        }
                    })
                    $("#check").on("click", function() {
                        grad_id = $("#podnosilac-select").find(':selected').data("id");
                        $('#grad-select').val(grad_id);
                    })
                }
            })
        }
        $(document).ready(function() {
            selGrad();
        });
    </script>
</body>

</html>