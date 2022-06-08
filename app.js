// Fetch
// Esta basado en promesas, simepre devuelve una promesa encapsulada
// Tiene el método GET por defecto


// ------------- PETICIION GET ---------------------

// let peticion = fetch("https://reqres.in/api/users?page=2")
// .then(res => res.json())
// .then(res => console.log(res))
    
// ------------- PETICION POST --------------------

// let peticion  = fetch("https://reqres.in/api/users", {
//     method: "POST",
//     body: JSON.stringify({
//         "nombre":"Carlos",
//         "apellido":"Callejas"
//     }),
//     headers: {"Content-type":"application/json"}
// }).then(res => res.json())
//   .then(res => console.log(res))
//   .catch(rej => console.log(rej))


// ---------------- BLOB ---------------------------


// const imagen = document.querySelector(".imagen");

// let peticion = fetch("fondo.jpg")
// .then(res => res.blob())
// .then(img => imagen.src = URL.createObjectURL(img));

let fragmento = document.createDocumentFragment();
let contenedor = document.querySelector(".contenedor_fichas");



let peticion = fetch("directoriojl.json")
.then(res => res.json())
.then(res => {
    let personal = res.datos;
    
    for (const p in personal) {
        let ficha = document.createElement("div");
        let ficha_cuerpo = document.createElement("div");
        let ficha_encabezado = document.createElement("div");
        let ficha_imagen = document.createElement("div");
        let ficha_textos = document.createElement("div");
        let ficha_pie = document.createElement("div");
        
        let foto = document.createElement("img");
        let cargo = document.createElement("h3");
        let nombre = document.createElement("p");
        let appaterno = document.createElement("p");
        let apmaterno = document.createElement("p");
        let email = document.createElement("p");
        
        // -------- ENCABEZADO --------------
        cargo.innerText = personal[p].cargo;
        ficha_encabezado.appendChild(cargo);
        ficha.appendChild(ficha_encabezado);
        ficha_encabezado.classList.add("titulo");
        ficha_encabezado.appendChild(cargo);
        // console.log(ficha);
        
        // -------- CUERPO IMAGEN  -----------------
        let cadena = personal[p].foto;
        foto.src = cadena;
        ficha_imagen.appendChild(foto);
        ficha_imagen.classList.add("imagen");
        ficha_cuerpo.appendChild(ficha_imagen);
        
        
        // -------- CUERPO TEXTOS  -----------------
        
        nombre.innerText = personal[p].nombres;
        appaterno.innerText = personal[p].appaterno;
        apmaterno.innerText = personal[p].apmaterno;
        email.innerHTML = `<a href="mailto:${personal[p].email}">${personal[p].email}</a>`;
        
        ficha_textos.appendChild(nombre);
        ficha_textos.appendChild(appaterno);
        ficha_textos.appendChild(apmaterno);
        ficha_textos.appendChild(email);
        ficha_textos.classList.add("ficha_textos");
        
        ficha_cuerpo.appendChild(ficha_imagen);
        ficha_cuerpo.appendChild(ficha_textos);
        ficha.appendChild(ficha_cuerpo);
        ficha_cuerpo.classList.add("cuerpo");
        ficha.appendChild(ficha_pie);
        ficha_pie.classList.add("ficha_pie");
        ficha.classList.add("ficha");
        
        contenedor.appendChild(ficha);
        
        fragmento.appendChild(ficha);
        contenedor.appendChild(fragmento);
    }
    document.body.appendChild(contenedor);
})

let segudaPeticion = fetch("directoriojds.json")
    .then(res2 => res2.json())
    .then(res => {
        console.log(res);
    })