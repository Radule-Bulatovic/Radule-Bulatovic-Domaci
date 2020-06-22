function brojDana(){
    godine = document.getElementById('input');
    if(isNaN(godine.value)){
        swal("Greška!","Pogrešno unijet podatak", "error");
        return;
    }
    swal("Broj dana je " + (godine.value * 365));
}