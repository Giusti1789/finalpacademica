function mostrarU(){
    document.getElementById('formularioUsuario').style.display='block';
    document.getElementById('formularioPartida').style.display='none';
    document.getElementById('formularioCarrera').style.display='none';
}
function mostrarP(){
    document.getElementById('formularioPartida').style.display='block';
    document.getElementById('formularioUsuario').style.display='none';
    document.getElementById('formularioCarrera').style.display='none';
}
function mostrarC(){
    document.getElementById('formularioPartida').style.display='none';
    document.getElementById('formularioUsuario').style.display='none';
    document.getElementById('formularioCarrera').style.display='block';
}
function habilitar(){
    var verif=document.getElementById('verificador');
    if (verif.value!="administrador"){
        boton2.disabled=true;
    }else{
        boton2.disabled=false;
    }


}