
    <!-- Slide gallery -->
    <style type="text/css">
    li :hover{
     background-color: rgba(255, 255, 255, 0.8);
    }
    </style>
    <div id="main_content">
      <div  class="jumbotron" style=" height:900px; background-image: url(<?php echo base_url();?>images/server/main_try.gif);">
        <div class="container  col-centered " style="margin-top:250px;">
         <label class=" col-sm-6 col-md-12" style="text-align:center; color:orange"  for="username"><h2 style="color:#FFFFFF;"><?=$this->lang->line("search_title"); ?></h2></label>  
         <form method="POST" action="search">
           <div class="input-group">
            <input name="search" type="text" class="form-control" placeholder="Search..." required="" style=" background-color: rgba(255, 255, 255, 0.8);">
               <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"  style=" background-color: rgba(255, 255, 255, 0.8);">Search <span class="caret"></span></button>
                <ul style="background-color: rgba(255, 255, 255, 0.8);"class="dropdown-menu">
                  <li class="search-drop" style="font-family:helvetica;"><a href="#">Busqueda por titulo</a></li>
                  <li class="search-drop" style="font-family:helvetica;"><a href="#">Busqueda por ISBN</a></li>
                  <li class="search-drop" style="font-family:helvetica;"><a href="#">Busqueda avanzada</a></li>
                  <li class="search-drop" style="font-family:helvetica;"><a href="#">Busqueda simple</a></li>
                </ul>
              </div><!-- /btn-group -->
            </div>
         </form><!-- /input-group -->
       </div>
      </div>
    </div><!-- End Slide gallery -->
    <h3 class="text-center">Wild Nature Charity & Urgent Program</h3>
    <!-- Thumbnails -->
    <div class="container thumbs">
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img class="img-circle" src="<?php echo base_url(); ?>images/server/SPA-flag.jpg">
          <div class="caption">
            <h3 class="text-center">Reptiles</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
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
            <h3 class="text-center">Birds</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
            <div class="btn-toolbar text-center">
              <a href="#" role="button" class="btn btn-success">Details</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img class="img-circle"  src="<?php echo base_url(); ?>images/server/flag.gif">
          <div class="caption">
            <h3 class="text-center"><?=$this->lang->line("article_3_title"); ?></h3>
            <p><?=$this->lang->line("article_3_description"); ?></p>
            <div class="btn-toolbar text-center">
              <a href="#" role="button" class="btn btn-success">Details</a>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Thumbnails -->
    <!-- Content -->
    <div class="container">
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