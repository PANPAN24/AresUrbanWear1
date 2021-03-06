<?php
require 'CONF/config.php';
require 'CONF/database.php';
$db = new Database();
$con = $db->conectar();
$sql = $con->prepare("SELECT id_producto, nombre, precio FROM productos WHERE activo = 1");
$sql -> execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link href="CSS/styles.css" rel="stylesheet">
    <title>Ares Urban Wear</title>
</head>
<body>

<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        
        </a>
            
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Inicio</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Categorias</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Ofertas</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Carrito</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Ayuda</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Buscar" aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Acceder</button>
          <button type="button" class="btn btn-warning">Registrarse</button>
        </div>
      </div>
    </div>
  </header>
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="IMG/slider1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="IMG/slider2.jpg" class="d-block w-100" alt="...">
    </div>
   
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    
<main>

<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <?php foreach($resultado as $row) {?>

        <div class="col">
          <div class="card shadow-sm">

            <?php 
            $nom = $row['nombre'];
            $imagen = "IMG/PROD/" . $nom . "/principal.jpg" ;
            if(!file_exists($imagen)){
              $imagen = "IMG/sinfoto.jpg";
            }
            ?>

           <img src="<?php echo $imagen;?>" alt="" width="350" height="300">

            <div class="card-body">
              <h5 class="card-text"><?php echo $row ['nombre'];?></h5>
              <p class="card-text">$ <?php echo number_format ($row ['precio'], 2,'.',',');?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  
                  <a href="detalleS.php?id=<?php echo $row ['id_producto'];?>&token=<?php echo
                  hash_hmac('sha1', $row['id_producto'], KEY_TOKEN);?>" class="btn btn-primary">Detalles</a>
                  
                </div>
                <a href="" class="btn btn-success">Agregar al carrito</a>
              </div>
            </div>
          </div>
        </div>
        <?php }?>
        </div>
        </div>
        
        <!-- <div class="col">
          <div class="card shadow-sm">
           <img src="IMG/PROD/Gorra pescadora 2.jpg" alt="" width="350" height="300">

            <div class="card-body">
              <h5 class="card-text">Gorra pescadora negra</h5>
              <p class="card-text">$ 199.00</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  
                  <a href="" class="btn btn-primary">Detalles</a>
                  
                </div>
                <a href="" class="btn btn-success">Agregar al carrito</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
           <img src="IMG/PROD/sudadera azul.jpg" alt="" width="350" height="300">

            <div class="card-body">
              <h5 class="card-text">Sudadera azul streetwear</h5>
              <p class="card-text">$ 399.00</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  
                  <a href="" class="btn btn-primary">Detalles</a>
                  
                </div>
                <a href="" class="btn btn-success">Agregar al carrito</a>
              </div>
            </div>
          </div>
        </div>
         -->
       
    

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous"></script>
</body>
</html>