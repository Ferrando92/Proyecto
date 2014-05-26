<!--
Sticky footer example by Mr. M. - Confederation College - IMD Program 

Based on tutorial from: http://www.coders-guide.com/watch.php?v=53
-->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
<link rel="stylesheet" href="http://bootsnipp.com/css/bootsnipp.css?ver=3dad078c6953f3a8a72bbfccae6365ae">
<link rel="stylesheet" href="http://bootsnipp.com/css/ladda-themeless.min.css">

 <div class="container" style="margin-top:60px;">  
<div class="well well-md">
<h1 style="font-size:60px;"><?=$articulo->titulo;?><h1>
</div>
<div class="row marketing">
        <div class="col-lg-6">
          <p>
              <img src="http://farm9.staticflickr.com/8083/8430638774_f7a7e83b7f_n.jpg" alt="sticky bun flickr.com" class="img-responsive img-rounded center-block">
          </p>
        </div>
        <div class="col-lg-6">
          <h2>Descripcion</h2>
          <p>
          <?=$articulo->descripcion;?>
          </p>
        </div>
        <div class="col-lg-6">
          <h2>ISBN</h2>
          <p>
          <?=$articulo->isbn;?>
          </p>
        </div>
        <div class="col-lg-6">
          <h2>Precio</h2>
          <p>
          <?=$articulo->precio;?>
          </p>
        </div>
        <div class="col-lg-6">
          <h2>Localidad</h2>
          <p>
          <?=$articulo->localidad;?>
          </p>
        </div>
         <div class="col-lg-6">
          <h2>Asignatura: </h2>
          <p>
          <?=$articulo->fecha_creacion;?>
          </p>
        </div>
         <div class="col-lg-6">
          <h2>Curso: </h2>
          <p>
          <?=$articulo->fecha_creacion;?>
          </p>
        </div>
        <div class="col-lg-6">
          <h2>Fecha del anuncio: </h2>
          <p>
          <?=$articulo->fecha_creacion;?>
          </p>
        </div>

      
      </div>



</div>
  
