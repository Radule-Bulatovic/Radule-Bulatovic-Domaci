function sortiraj(){
    input = document.getElementById('input').value.split(' ');
    for(i = 0; i < input.length; i++){
        if(isNaN(input[i])){
            swal("Greška!","Pogrešno unijet podatak", "error");
            return;
        }
    }
    input.sort(function(a,b){return b-a});
    document.getElementById('output').innerHTML = input;
    return;
}