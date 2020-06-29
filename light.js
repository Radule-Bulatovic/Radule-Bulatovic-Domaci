var toggleRound = 0;
function changeBackground(){
    var color = document.getElementById("range-opacity").value;
    if(toggleRound % 2 == 0){
    colorRGB = 'rgb(' + color + ',' + color + ',' + color + ')';
    document.body.style.backgroundColor = colorRGB;
    }
    else{
        color = 255 - color;
        colorRGB = 'rgb(' + color + ',' + color + ',' + color + ')';
        document.body.style.backgroundColor = colorRGB;
    }
}
function toggleClick(){
    toggleRound++;
    changeBackground();
}