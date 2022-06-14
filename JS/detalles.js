let details = document.querySelector("#detalles");


let url2 = window.location.href;

let url3 = new URL(url2);

let searchParams = new URLSearchParams(url3.search);

let id = searchParams.get('id');

const url = 'https://aresurbanwearback.000webhostapp.com/api/articulo/' + id;
console.log(url);

let result = "";
async function obtenerDatos() {
    fetch(url)
        .then(response => response.json())
        .then(data => data[0])
        .then(res => console.log(res));
}


let imprimirCarta = (datos) => {

    details.innerHTML += `
        <div class = "col-md-6 order-md-1"> 
        <img src="IMG/PROD/1/principal.jpg" alt="" width="350" height="350">
    </div>
    <div class = "col-md-6 order-md-2"> 
          <h1>${datos.descripcionArticulo}</h1>
          <h2>${datos.precioArticulo}</h2>
          <p> ${datos.detallesArticulo}</p>
          <br>
          <h5 class="lead"></h5>
          <br>
          
          <div class="d-grid gap-3 col-10 mx-auto">
              <button class="btn btn-primary" type="button" href="pago.php">Comprar ahora</button>
              <button class="btn btn-outline-primary" type="button">Agregar al carrito</button>
          </div>      
    </div>
        `


}

obtenerDatos();