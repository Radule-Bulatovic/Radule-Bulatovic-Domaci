<?php
include './connect.php';
if($_SERVER['REQUEST_METHOD'] == "GET"){
    if( isset($_GET['id']) && is_numeric($_GET['id']) ){
        $id = $_GET['id'];
        $sql_del = "DELETE from podnosilac where id = $id";
        $res = mysqli_query($dbcon, $sql_del);
        if($res){
            header("location: ./podnosilac.php");
            exit();
        }
        exit("Greska u upitu!");
    }
    exit("Morate odabrati podnosioca za brisanje!");
}
exit("Pogresan metod!");
?>