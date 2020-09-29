<?php
  
  ini_set("display_errors", "on");
  include '../connect.php';
  include '../funkcije.php';

  autorizacija();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>maxISP | Prijava</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="./index2.html"><b>max</b>ISP</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Promjena lozinke</p>

    <form action="promjena_lozinke_back.php" method="POST">
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" required placeholder="Stara lozinka">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="new_password" required placeholder="Nova lozinka">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="confirmation" required placeholder="Potvrdite novu lozinku">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" onclick="promijeni_lozinku()" class="btn btn-primary btn-block">Sačuvaj</button>
          </div>
        </div>
    </form>

      <p class="mb-1">
        <a href="forgot-password.html">Zaboravili ste lozinku?</a>
      </p>
    </div>
  </div>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script>
    $(document).ready(function(){
        $("input[name='new_password']").keyup(function(){
            if($("input[name='new_password']").val() == $("input[name='confirmation']").val()){
                $('button[type="submit"]').removeAttr('disabled');
            }else{
                $('button[type="submit"]').attr('disabled','disabled');
            }
        });
        $('input[name="confirmation"]').keyup(function(){
            if($("input[name='new_password']").val() == $("input[name='confirmation']").val()){
                $('button[type="submit"]').removeAttr('disabled');
            }else{
                $('button[type="submit"]').attr('disabled','disabled');
            }
        });
    });
</script>

</body>
</html>
