<?php

include './connect.php';

$fileType = explode("/", $_FILES['slika']['type']);
$fileType = $fileType[0];
// var_dump($fileType);
// exit();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['podnosilac']) && is_numeric($_POST['podnosilac'])) {
        $podnosilac = $_POST['podnosilac'];
    } else {
        exit("Podnosilac nije izabran!");
    }
    if (isset($_POST['grad']) && is_numeric($_POST['grad'])) {
        $grad = $_POST['grad'];
    } else {
        exit("Grad nije izabran!");
    }
    if (isset($_POST['opis']) && $_POST['opis'] != "") {
        $opis = $_POST['opis'];
    } else {
        exit("Opis nije unijet!");
    }
    if(isset($_FILES['slika'])){
        $slika = $_FILES['slika'];
        $tip = explode("/", $slika['type']);
        $tip = $tip[0];
        if($tip == 'image'){
            $format = explode('.' , $slika['name']);
            $ime_slike = uniqid(true) . '.' . end($format);
            $putanja = "./images/$ime_slike";
            // var_dump($slika);
            // exit();
            move_uploaded_file($slika['tmp_name'], $putanja);
        }else{
            exit('Uploadovani fajl nije slika');
        }
    }else{
        exit("Niste uploadovali sliku!");
    }
    $putanja = "./resources/images/$ime_slike";
    $sql_insert = " INSERT INTO primjedba  
									(
										opis,
										slika_putanja,
										podnosilac_id,
                                        grad_id
									)
								VALUES
									(
										'$opis',
										'$putanja',
										$podnosilac,
                                        $grad
									)
						";
    $res = mysqli_query($dbcon, $sql_insert);
    if ($res) {
        header("location: ../index.php");
        exit();
    } else {
        exit("Greska pri izvrsavanju upita!");
    }
} else {
    exit("Nedozvoljen metod!");
}
