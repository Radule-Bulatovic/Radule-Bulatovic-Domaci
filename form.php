<?php

function nameValidation()
{
    if ((strpos($_POST['name'], " ")) == null || (strlen($_POST["name"])) > 50) {
        exit("Error!!<br>Wrong value at name input!");
    }
}

function mailValidation()
{
    if ((strpos($_POST['email'], "@")) == null || (strpos($_POST["email"], ".com")) ==  null) {
        exit("Error!!<br>Wrong value at e-mail input!");
    }
}

function phoneValidation()
{
    if (!preg_match('#^[0-9 +-/]*$#', $_POST['phoneNum']) || strlen($_POST['phoneNum']) < 3) {
        exit("Error!!<br>Wrong value at phone number input!");
    }
}

function pictureValidation()
{
    if ($_FILES['picture']['size'] > 5000000) {
        exit("Error!!<br>Picture is too big!");
    }
    $pictureFormat = strtolower(pathinfo("images/" . basename($_FILES["picture"]["name"]), PATHINFO_EXTENSION));
    if ($pictureFormat != 'jpg' && $pictureFormat != 'svg' && $pictureFormat != 'png') {
        exit("Error!!<br>Picture format is not supported!");
    }
    move_uploaded_file($_FILES["picture"]["tmp_name"], "images/" . $_FILES["picture"]["name"]);
    echo "<h2>Upload successful!</h2>";
}

function inputCheck()
{
    if (empty($_POST['name']) == 1 || empty($_POST['email']) == 1 || empty($_POST['phoneNum']) == 1) {
        exit("Error!!<br>All input fields must be set!");
    }
}
inputCheck();
nameValidation();
mailValidation();
phoneValidation();
pictureValidation();