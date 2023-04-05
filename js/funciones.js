const nombre = "Carlos Rodolfo",
  d = document,
  apellidop = "Callejas",
  apellidom = "Landa",
  tipo = "2",
  rama = "3",
  foto = "file",
  objeto = "",
  botonEnviar = d.getElementById("enviar");

let json = {
  nombre,
  apellidop,
  apellidom,
  tipo,
  rama,
  foto,
};

const ajax = (opciones) => {
  let { url, metodo, success, error, data } = opciones;
  const xhr = new XMLHttpRequest();
  xhr.addEventListener("readystatechange", (e) => {
    if (xhr.readyState !== 4) return;
    if (xhr.status >= 200 && xhr.status < 300) {
      let res = xhr.responseText;
      success(res);
    } else {
      let mensaje = xhr.statusText || "Ha ocurrido un error";
      error(`Error: ${xhr.status}: ${mensaje}`);
    }
  });

  xhr.open(metodo || "GET", url);
  xhr.setRequestHeader("Content-type", "application/json;charset=utf-8");
  xhr.send(JSON.stringify(data));
};

const enviarData = () => {
  ajax({
    url: "validaEditarImagen.php",
    method: "POST",
    success: (res) => {
      console.info(res);
    },
    error: (error) => {
      console.error(error);
    },
    data: JSON.stringify(json),
  });
};

d.addEventListener("DOMContentLoaded", (e) => {
  // e.preventDefault();
  botonEnviar.addEventListener("click", enviarData());
  d.getElementById("imgLoaded").addEventListener("change", (e) => {
    imgPreview(e, "#imgPrev");
    console.log(objeto);
  });
});

function imgPreview(evento, idimg) {
  const input = evento.target;


  let $imgPreview = document.querySelector(idimg);

  if (!input.files.length) return;

  file = input.files[0];
  fileExt = file.type;
  // console.log("tipo", file.type);
  match = ["image/jpeg", "image/png"];
  if (!fileExt === match[0] || !fileExt === match[1]) {
    alert("los archivos validos son: jpg, png");
    file.name = "";
    return false;
  }
  console.log(file);

  objectURL = URL.createObjectURL(file);
  console.log("ObjetoURL",objectURL);
  $imgPreview.src = objectURL;
}
