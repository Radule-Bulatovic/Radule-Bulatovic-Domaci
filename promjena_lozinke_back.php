<?php
    include '../connect.php';
    include '../funkcije.php';
  
    autorizacija();
    isset($_POST['password']) ? $pass = $_POST['password'] : exit("Password error1");
    $user_id = $_SESSION['prijava']['korisnik_id'];
    $pass = md5($pass);
    $sql = "SELECT * FROM korisnik WHERE password = '$pass' AND id = $user_id";
    $res = mysqli_query($dbconn, $sql);
    $res =  (1 == mysqli_num_rows($res));
    $pass = $_POST['new_password'];
    $pass = md5($pass);
    $sql_update = "UPDATE korisnik SET password = '$pass' WHERE id = $user_id";
    if($res){
        $res1 = mysqli_query($dbconn, $sql_update);
        session_destroy();
        header('location: ../login.html');
    }else{
        exit("Pogresna lozinka");
    }
?>