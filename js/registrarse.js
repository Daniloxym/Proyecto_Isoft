const estudiante= document.getElementById("estudiante");
const profesor = document.getElementById("profesor");
const pasword= document.getElementById("password");
const paswordC = document.getElementById("passwordC");
const form= document.getElementById("form");
const correo= document.getElementById("correo");
const sub= document.getElementById("enviar");
const inicio= document.getElementById("inicio");
const registrarse= document.getElementById("registrarse");
let aceptar= location.hash;
const file= document.getElementById("foto");
const especialidad1= document.getElementById("especialidad");

file.addEventListener("change",()=>{
    var pdrs = file.files[0].name;
    document.getElementById('info-f').textContent = pdrs;
})


let pagina= location.pathname.split("/");
pagina=pagina[pagina.length-1];

if(pagina=="registrarse2"){
    
    const select= document.getElementById("materia");
    fetch("materias")
    .then(res=>res.json())
    .then(res=>{
        
        const fragmento= document.createDocumentFragment();
        for(const valor of res){
            const opcion= document.createElement("option");
            opcion.setAttribute("value",valor.nombre);
            opcion.textContent=valor.nombre;
            fragmento.append(opcion);
        }
        select.append(fragmento);
    })
}

pasword.addEventListener("keyup",()=>{
    if(pasword.value!=paswordC.value){
        paswordC.classList.add("red");
    }
    else{
        paswordC.classList.remove("red");
    }
})

paswordC.addEventListener("keyup",()=>{
    if(pasword.value!=paswordC.value){
        paswordC.classList.add("red");
    }
    else{
        paswordC.classList.remove("red");
    }
})

form.addEventListener("submit",(e)=>{
    e.preventDefault();
    const ExpReg=  /^(([^<>()\[\]\\.,:\s@"]+(\.[^<>()\[\]\\.,:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/g;
    let email=false;
    let pass=false;
    if(paswordC.value==pasword.value){
        pass=true;
    }
    if(ExpReg.test(correo.value)==true){
        email=true;
    }
    let cont=0;
        if(foto.value!=""){
            cont++;
        }
    if(email==true && pass==true && cont!=0){
        const nombre= document.getElementById("nombre").value;
        const apellido= document.getElementById("apellido").value;
        const cedula= document.getElementById("cedula").value;
        const celular= document.getElementById("celular").value;
        const correo= document.getElementById("correo").value;
        const pass= document.getElementById("password").value;
        const foto=document.getElementById("foto");
        const Data= new FormData();
        
        Data.append("nombre",nombre);
        Data.append("apellido",apellido);
        Data.append("cedula",cedula);
        Data.append("celular",celular);
        Data.append("correo",correo);
        Data.append("pasword",pass);
        Data.append("foto",foto.files[0]);
        
        if(pagina=="registrarse"){
            Data.append("tipo","registrarE");
        }
        else if(pagina=="registrarse2"){
            const materia= document.getElementById("materia").value;
            const especialidad= document.getElementById("especialidad").value;
            Data.append("materia",materia);
            Data.append("tipo","registrarP");
            Data.append("especialidad",especialidad);
        }
        
            fetch("confirmacion",{
            method: "POST",
            body: Data
            })
            .then(res=>res.json())
            .then(res=>{
                alert(res);
            })
            .catch(res=>{
                alert("EL USUARIO NO SE PUDO REGISTRAR")
            })
        
        
        
        
    }
    else{
        if(email!= true && pass!= true){
            alert("EL CORREO NO ES VALIDO Y LAS CONTRASEÑAS NO COINCIDEN");
        }
        else if(pass!=true){
            alert("LAS CONTRASEÑAS NO COINCIDEN");
        }
        else if(email!=true){
            alert("EL CORREO NO ES VALIDO");
        }
        else if(cont==0){
            alert("No ha seleccionado una foto de perfil");
        }
    }

})



