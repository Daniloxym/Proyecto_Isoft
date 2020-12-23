let pagina= location.pathname.split("/");
pagina=pagina[pagina.length-1];

if(pagina=="index2"){
    const body= document.getElementsByTagName("body")[0];
    body.classList.add("fondo-img");
    const form= document.getElementById("iniciarS");
    const input= document.getElementsByName("tipoLogin");
    
for(let i=0;i<input.length;i++){
    input[i].addEventListener("click",()=>{
        if(i==1){
            input[0].checked=false;
        }
        else{
            input[1].checked=false;
        }
    })
}

form.addEventListener("submit",(e)=>{
    e.preventDefault();
    const correo= document.getElementById("correo").value;
    const pass= document.getElementById("pass").value;
    let tipoLogin;
    let cont=0;
    for(let i=0;i<input.length;i++){
        if(input[i].checked){
            cont++;
            tipoLogin=input[i].value;
        }
    }
    if(cont!=0){
        const Data= new FormData();
    
        Data.append("correo",correo);
        Data.append("pass",pass);
        Data.append("tipoLogin",tipoLogin);
        fetch("iniciarSecion",{
            method: "POST",
            body: Data
        })
        .then(res=>res.json())
        .then(res =>{
            if(tipoLogin=="Estudiante"){
                form.setAttribute("action","perfilEstudiante");
            }
            else if(tipoLogin=="Profesor"){
                form.setAttribute("action","perfilProfesor");
            }
             form.submit();  
        })
        .catch(res=> alert("EL CORREO O LA CONTRASEÑA SON INCORRECTOS"));
    
    }
    else{
        alert("Seleccione si es Profesor ó Estudiante");
    }
})
}

