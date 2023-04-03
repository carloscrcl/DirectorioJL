(() => {
  const xhr = new XMLHttpRequest();
})();

function imgPreview(evento, idimg) {
  const input = evento.target;

  console.log("Evento", evento);

  let $imgPreview = document.querySelector(idimg);

  console.log("previsualizador", $imgPreview);

  // si no encuentra una imagen, sale de la función
  if (!input.files.length) return;

  file = input.files[0];
  console.log(file);

  objectURL = URL.createObjectURL(file);

  $imgPreview.src = objectURL;
}
