function nameVal(){
    var txt = document.getElementById('name').value;
    var nameError = document.getElementById('nameError');
    var twoWordcheck = txt.split(' ');

    if (!(txt.includes(" ")) || txt.length < 6 || twoWordcheck[1] == "") {
        document.getElementById("nameError").style.visibility = "visible";
        document.getElementById("nameError").style.color = "red";
        nameError.innerHTML = "Ime mora imati razmak i minimum 5 karaktera";
        return true;
    }
    else {
        document.getElementById("nameError").style.visibility = "hidden";
        return false;
    }
}

function mailVal(){
    var mailVar = document.getElementById('mail').value;
    var mailResponse = document.getElementById('mailError')
    if (!mailVar.includes("@") || !mailVar.includes(".com") || mailVar.length > 50){
        document.getElementById('mailError').style.visibility = "visible";
        document.getElementById('mailError').style.color = "red";
        mailResponse.innerHTML = 'E-mail adresa mora biti kraca od 50 karaktera i mora sadrzati @ i .com!';
        return true;
    }
    else{
        document.getElementById('mailError').style.visibility = "hidden";
        return false;
    }
}

function dateVal(){
    var dateVar = document.getElementById("datum").value;
    var dateError = document.getElementById('dateError')
    if(dateVar == ""){
        document.getElementById('dateError').style.visibility = "visible";
        document.getElementById('dateError').style.color = "red";
        dateError.innerHTML = "Unesite godinu rodjenja";
        return true;
    }
    if(dateVar < 2003){
        document.getElementById('dateError').style.visibility = "hidden";
        return false;
    }
    else{
        document.getElementById('dateError').style.visibility = "visible";
        document.getElementById('dateError').style.color = "red";
        dateError.innerHTML = "Imas manje od 18 godina";
        return true;
    }
}

function validacija(){
    var btn = document.getElementById('btn');
    btn.disabled = (nameVal() || mailVal() || (dateVal() == 1));
}

function submitResponse(){
    alert("Ime:   " + document.getElementById('name').value + "\n" + "E-mail adresa:   " + document.getElementById("mail").value + '\n' + 'Godina rodjenja:   ' + document.getElementById("datum").value)
}