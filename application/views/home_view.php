
    <!-- Slide gallery -->
    <style type="text/css">
    li :hover{
     background-color: rgba(255, 255, 255, 0.8);
    }
    </style>
    <div id="main_content">
      <div  class="jumbotron" style=" height:900px; background-image: url(<?php echo base_url();?>images/server/main_try.gif);">
        <div class="container  col-centered " style="margin-top:250px;">
         <label class=" col-sm-6 col-md-12" style=" text-align:center; color:orange"  for="username"><h2 style="color:#FFFFFF;"><?=$this->lang->line("search_title"); ?></h2></label>  
         <div id="action-buttons" style="text-align:center; padding:20px;" class="span7 text-center">
           <a href="<?=base_url()?>index.php/search" class=" btn btn-primary btn-lg " style="font-size:25px; width:200px;">Busca! <i class="icon-search"></i></a>
           <a href="<?=base_url()?>index.php/article/create" class=" btn btn-warning btn-lg" style="font-size:25px; width:200px;"><i class="icon-pencil"></i> Anunciate!</a>
         </div>
       </div>
      </div>
    </div><!-- End Slide gallery -->
    <h3 class="text-center">Proximamente en Wibuks:</h3>
    <!-- Thumbnails -->
    <div class="container thumbs">
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img class="img-circle" src="<?php echo base_url(); ?>images/server/SPA-flag.jpg">
          <div class="caption">
            <h3 class="text-center">Sostenibilidad</h3>
            <p>Wibuks es una aplicacion totalmente gratuita pero con costes de mantenimiento, por eso Wibuks creara una campaña de Donaciones o busca de Patrocinador para poder ofrecer sus servicios a los usuarios sin que  estos se vean perjudicados.</p>
            <div class="btn-toolbar text-center">
              <a href="#" role="button" class="btn btn-success">Details</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img class="img-circle"  src="<?php echo base_url(); ?>images/server/VAL-flag.jpg">
          <div class="caption">
            <h3 class="text-center">Connectividad</h3>
            <p>Wibuks busca satisfacer en cada momento las necesidades del usuario, por eso en breves Wibuks sacara su chat en Beta para que usuarios puedan comunicarse en caso de estar interesados en negociar por un articulo.</p>
            <div class="btn-toolbar text-center">
              <a href="#" role="button" class="btn btn-success">Details</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img class="img-circle"  src="<?php echo base_url(); ?>images/server/diversidad.jpg">
          <div class="caption">
            <h3 class="text-center"><?=$this->lang->line("article_3_title"); ?></h3>
            <p>Wibuks busca expandirse y llegar a todo aquel que la necesite, por ello en breves sacaremos la version Multilengua, en la cual podras disfrutar de la aplicacion ademas de en Castellano, Ingles y Valenciano.</p>
            <div class="btn-toolbar text-center">
              <a href="#" role="button" class="btn btn-success">Details</a>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Thumbnails -->
    <!-- Content -->
    <div class="container" style="display:none">
      <h3 class="text-center">Welcome to Zoo Planet</h3>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
    </div><!-- End Content -->
    <!-- Footer -->
    <div class="footer text-center">
       
    </div><!-- End Footer -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- // <script src="https://code.jquery.com/jquery.js"></script> -->
   
  </body>
</html>