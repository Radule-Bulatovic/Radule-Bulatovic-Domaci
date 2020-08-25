<?php

include './connect.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['ime']) && $_POST['ime'] != "") {
		$ime = $_POST['ime'];
	} else {
		exit("Morate unijeti ime!");
	}
	if (isset($_POST['prezime']) && $_POST['prezime'] != "") {
		$prezime = $_POST['prezime'];
	} else {
		exit("Morate unijeti prezime!");
	}
	if (isset($_POST['jmbg']) && is_numeric($_POST['jmbg'])) {
		$jmbg = $_POST['jmbg'];
	} else {
		exit('Morate unijeti JMBG!');
	}
	if (isset($_POST['grad']) && is_numeric($_POST['grad'])) {
		$grad = $_POST['grad'];
	} else {
		exit("Morate izabrati grad!");
	}
	$sql_insert = " INSERT INTO podnosilac  
									(
										ime,
										prezime,
										jmbg,
                                        grad_id
									)
								VALUES
									(
										'$ime',
										'$prezime',
										$jmbg,
                                        $grad
									)
						";
	$res = mysqli_query($dbcon, $sql_insert);
	if ($res) {
		header("location: ./podnosilac.php");
		exit();
	} else {
		exit("Greska pri izvrsavanju upita!");
	}
} else {
	exit("Nedozvoljen metod!");
}
?>