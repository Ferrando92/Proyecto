<!--
Sticky footer example by Mr. M. - Confederation College - IMD Program 

Based on tutorial from: http://www.coders-guide.com/watch.php?v=53
-->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
<link rel="stylesheet" href="http://bootsnipp.com/css/bootsnipp.css?ver=3dad078c6953f3a8a72bbfccae6365ae">
<link rel="stylesheet" href="http://bootsnipp.com/css/ladda-themeless.min.css">
<div class="navbar navbar-inverse navbar-static-top">
 
 <div class="container">
 
 <a href="#" class="navbar-brand">Mr. M.'s Sticky Footer Example </a> <button class="navbar-toggle"
      data-toggle="collapse" data-target=".navHeaderCollapse"></button>

      <div class="collapse navbar-collapse navHeaderCollapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="#">Home</a></li>

          <li><a href="#">Blog</a></li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Social Media</a>

            <ul class="dropdown-menu">
              <li><a href="#">Twitter</a></li>

              <li><a href="#">Facebook</a></li>

              <li><a href="#">Google+</a></li>

              <li><a href="#">Instagram</a></li>
            </ul>
          </li>

          <li><a href="#">About</a></li>

          <li><a href="#">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
  

 <div class="container">  
<div class="well well-md">
<h1 style="font-size:60px;"><?=$articulo->titulo;?><h1>
</div>
<div class="row marketing">
        <div class="col-lg-6">
          <p>
              <img src="http://farm9.staticflickr.com/8083/8430638774_f7a7e83b7f_n.jpg" alt="sticky bun flickr.com" class="img-responsive img-rounded center-block">
          </p>
        </div>
        <?php foreach ($articulo as $dato ) {
          ?>
          # code...
       
        <div class="col-lg-6">
          <h2>Subheading</h2>
          <p>
          <?=$dato;?>
          </p>

        </div>
         <?php } ?>
      </div>



</div>
  
