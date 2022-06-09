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
let contenedorJd = document.querySelector(".grid");



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

// -------- DISTRITOS ---------------------

let segudaPeticion = fetch("directoriojds.json")
    .then(res2 => res2.json())
    .then(res => {
      for (let i = 1; i <= 20; i++) {
        
        
        let obj = res["jd"+i];
        console.log(obj);
        let calle = document.createElement("p");
        let col = document.createElement("p");
        let referencia = document.createElement("p");
        let cp = document.createElement("p");
        let mpio = document.createElement("p");

        for (const vocal in obj) {
            
            if(vocal == 6 ){
              let gridCelda = document.createElement("div");
              let gridDireccion = document.createElement("div");
              let direccion = obj[vocal].direccion;
                
                calle.textContent = direccion[0].calle +" Num. "+ direccion[0].numero;
                col.textContent = direccion[0].colonia;
                referencia.textContent = direccion[0].referencia;
                cp.textContent = direccion[0].cp;
                mpio.textContent = direccion[0].mpio;
              
                
                gridDireccion.appendChild(calle);
                gridDireccion.appendChild(col);
                gridDireccion.appendChild(referencia);
                gridDireccion.appendChild(cp);
                gridDireccion.appendChild(mpio);

                gridCelda.appendChild(gridDireccion);
                // console.log(gridCelda);
                fragmento.appendChild(gridCelda);
                contenedorJd.appendChild(fragmento);
                // console.log(contenedorJd);
                // break;
            }else if (vocal == 7) {
               let telefonos = obj[vocal].telefonos[0];
               let gridCelda = document.createElement("div");
               let tels = document.createElement("div");
               console.log( telefonos);
               for (const tel in telefonos) {
                  let p = document.createElement("p");
                  let span = document.createElement("span");
                  span.textContent = telefonos[tel];
                  p.appendChild(span);
                  tels.appendChild(p);
                }
                
                gridCelda.appendChild(tels);
                fragmento.appendChild(gridCelda);
                contenedorJd.appendChild(fragmento);
              
              
            }
            
            
            else{

                
                let gridC = document.createElement("div");
                let adscripcion = document.createElement("div");
                let ads = obj["junta"][vocal].junta;
                let p =  document.createElement("p");
                p.textContent = ads.id +" " + ads.ubiciacion; 
                
                adscripcion.appendChild(p);

                gridC.appendChild(adscripcion);
                fragmento.appendChild(gridC);
                contenedorJd.appendChild(fragmento);
                
                                  

                let gridCelda = document.createElement("div");
                let gridBody = document.createElement("div");
                
                let gridImage = document.createElement("div");
                let img = document.createElement("img");
                
                let gridTextos = document.createElement("div");
                let nombre = document.createElement("p");
                let appaterno = document.createElement("p");
                let apmaterno = document.createElement("p");
                let email = document.createElement("p");
                let link = document.createElement("a");
                
                let rutaImagen = obj[vocal].foto;
                img.src = rutaImagen;
                gridImage.appendChild(img);
                
                nombre.textContent = obj[vocal].nombres;
                appaterno.textContent = obj[vocal].appaterno;
                apmaterno.textContent = obj[vocal].apmaterno;
                email.textContent = obj[vocal].email;
                link.appendChild(email);
    
                            
                gridTextos.appendChild(nombre);
                gridTextos.appendChild(appaterno);
                gridTextos.appendChild(apmaterno);
                gridTextos.appendChild(link);
                
                gridBody.appendChild(gridImage);
                gridBody.appendChild(gridTextos);
                gridCelda.appendChild(gridBody);
                
                
                
                
                
                
                fragmento.appendChild(gridCelda);
                contenedorJd.appendChild(fragmento);
                
            }
        }  
      }
        document.body.appendChild(contenedorJd);
       

    })