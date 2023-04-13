const d = document;

let formulario = d.getElementById("form");
console.log(formulario);

const nombre = "nombre",
  apellidop = "paterno",
  apellidom = "materno",
  email = "email",
  tipo = "tipo",
  rama = "rama",
  id = "id",
  ubicacion = "ubicacion";
foto = "foto";

botonEnviar = d.getElementById("enviar");
botonEnviar.classList.add = "desactivado";

const ajax = () => {
  let fd = new FormData();
  let msj = "";
  if (!formulario.nombre.value == "") {
    fd.append(nombre, formulario.nombre.value);
  } else {
    msj = "* El nombre es obligatorio \n";
  }
  if (formulario.paterno.value == "") {
    let v = prompt("¿Cuenta con apellido paterno el Vocal?");
    if (v === "no") {
      formulario.paterno.value = "XXX";
    } else {
      return;
    }
  } else {
    fd.append(apellidop, formulario.paterno.value);
  }

  if (!formulario.materno.value == "") {
    fd.append(apellidom, formulario.materno.value);
  } else {
    let v = prompt("¿Cuenta con apellido materno el Vocal?");
    if (v === "no") {
      formulario.materno.value = "XXX";
    } else {
      return;
    }
  }

  if (formulario.email.value == "") {
    msj +=
      "* El correo es obligatorio (solo debe definir el nombre.apellido)\n ";
  } else {
    fd.append(email, formulario.email.value);
  }

  // validar FILES

  if (formulario.archivo.files.length === 0) {
    msj += "se debe agregar la fotografia ";
  } else {
    fd.append(foto, formulario.archivo.files[0]);

    console.log(formulario.archivo.files);
  }

  // validar FILES

  if (msj) {
    alert(msj);
  } else {
    console.log(
      formulario.nombre.value,
      formulario.paterno.value,
      formulario.materno.value,
      formulario.email.value,
      formulario.archivo.files
    );
    fd.append(tipo, formulario.tipo.value);
    fd.append(rama, formulario.rama.value);
    fd.append(ubicacion, formulario.ubicacion.value);
    fd.append(id, formulario.id.value);

    const ajax = new XMLHttpRequest(); // javascript y XML asincronico
    ajax.open("POST", "../admin/validaEditarImagen.php", true);
    // si los datos son enviados por medio de un formData ya no requiere cabecera
    // ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    ajax.onload = function () {
      // console.log(ajax.responseText);
      d.querySelector("#respuesta").innerHTML = ajax.responseText;
    };

    ajax.send(fd);
  }
};

d.addEventListener("DOMContentLoaded", (e) => {
  e.preventDefault();

  d.getElementById("imgLoaded").addEventListener("change", (e) => {
    // botonEnviar.disabled = false;
    imgPreview(e, "#imgPrev");
  });
  formulario.addEventListener("submit", (e) => {
    e.preventDefault();
    ajax();
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
  if (fileExt === match[0] || fileExt === match[1]) {
    console.log(file);
    objectURL = URL.createObjectURL(file);
    console.log("ObjetoURL", objectURL);
    $imgPreview.src = objectURL;
  } else {
    alert("Los formatos validos son: .jpg | .png");
    file = null;
    return;
  }
}

const validarCampos = (formulario) => {};

function validarExt(formulario) {
  var files = document.getElementById("archivoInput").files;
  var zero = document.getElementsByName("imagen");
  var archivoRuta = archivoInput.value;

  var extPermitidas = /(.png|.gif|.jpg|.jpeg)$/i;

  if (!extPermitidas.exec(archivoRuta)) {
    alert("Asegurese de haber seleccionado una Imagen");
    archivoInput.value = "";
    return false;
  }
  if (zero.length == "") {
    alert("selecciones un archivo");
    return false;
  }
}
