function maxNumber(){
    var input = document.getElementById('input').value.split(' ');
    outputMaxVar = Math.max(...input);
    for( var i = 0; i < input.length; i++){
        if(input[i] == outputMaxVar){
            outputIndex = i + 1;
        }
        if(isNaN(input[i])){
            swal("Greška!","Pogrešno unijet podatak", "error");
            return;
        }
    }
    swal('Najveci broj u nizu je broj ' + outputMaxVar + ', koji se nalazi na poziciji ' + outputIndex + ' u nizu.');
    return;
}