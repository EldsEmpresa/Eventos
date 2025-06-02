let i = 1;
document.getElementById("rd1").checked = true;

setInterval( function(){
    verificar();
    trocar();
}, 6000)

function verificar(){
    for(var j=1;j<4;j++){
        if(document.getElementById("rd"+j).checked == true){
            i=j;
            break;
        }
    }
}

function trocar(){
    i++;
    if(i>3){
        i=1;
    }
    document.getElementById("rd"+i).checked = true;
    console.log(i);
}