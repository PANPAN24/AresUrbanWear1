
let api =[];
let cardContainer = document.querySelector("#cardContainer");

const url = 'https://aresurbanwearback.000webhostapp.com/api/articulos'


async function obtenerDatos(){
    await fetch(url)
    .then(datos => datos.json())
    .then(datos => api.push( ...datos))
    console.log(api)
    imprimirCarta(api)
}

let imprimirCarta = (array) => {
    array.forEach(articulo => {
        cardContainer.innerHTML += `
            
     <div class="col">
     <div class="card shadow-sm">

         <img src="IMG/PROD/Gorra pescadora diseño canabis/principal.jpeg" 
         width="350" height="300"></img>
         <div class="card-body">
          <h5 class="card-text">${articulo.descripcionArticulo}</h5>
          <p class="card-text">$${articulo.precioArticulo}</p>
          <div class="d-flex justify-content-between align-items-center">
             <div class="btn-group">
         
                 <a href="detalles.html?id=${articulo.idArticulo}" class="btn btn-primary">Detalles</a>
         
               </div>
                <a href="" class="btn btn-success">Agregar al carrito</a>
            </div>
        </div>
     </div>
  </div>
        
        `    
    
    }); 
}

obtenerDatos();