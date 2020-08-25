<?php
include './connect.php';
if($_SERVER['REQUEST_METHOD'] == "GET"){
    if( isset($_GET['id']) && is_numeric($_GET['id']) ){
        $id = $_GET['id'];
        $select_putanja = "SELECT slika_putanja from primjedba where id = $id";
        $putanja = mysqli_query($dbcon, $select_putanja);
        $putanja = mysqli_fetch_assoc($putanja);
        $putanja = $putanja["slika_putanja"];
        $putanja = str_replace("./resources/","", $putanja);
        $sql_del = "DELETE from primjedba where id = $id";
        $res = mysqli_query($dbcon, $sql_del);
        if($res){
            unlink($putanja);
            header("location: ../index.php");
            exit();
        }
        exit("Greska u upitu!");
    }
    exit("Morate odabrati prijavu za brisanje!");
}
exit("Pogresan metod!");
?>