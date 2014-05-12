
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?=$this->lang->line("title"); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet"> 
    <link href="//fonts.googleapis.com/css?family=Amatic+SC:400,700" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>css/bootshape.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootshape.js"></script>
  </head>
  <body>
    <!-- Navigation bar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <!--<span class="sr-only">Toggle navigation</span>-->
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=base_url()?>index.php/home" style:"color:#FF850B;">Wibu<span id="wibuk-logo-span">ks</span></a>
        </div>
        <nav role="navigation" class="collapse navbar-collapse navbar-right">
          <ul class="navbar-nav nav">
            <li ><a href="<?=base_url()?>index.php/home"><?=$this->lang->line("home"); ?></a></li>
             <!--<li class="dropdown">
             <a data-toggle="dropdown" href="#" class="dropdown-toggle">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Item 1</a></li>
                <li class="active"><a href="#">Item 2</a></li>
                <li><a href="#">Item 3</a></li>
                <li class="divider"></li>
                <li><a href="#">All Items</a></li>
              </ul>
            </li>-->
            <li><a href="#"><?=$this->lang->line("contact"); ?></a></li>
            <?php if(!isset($this->session->userdata["username"])){ ?>
            <li><a href="<?=base_url()?>index.php/home/login"><?=$this->lang->line("sign_in"); ?></a></li>
             <li><a href="<?=base_url()?>index.php/sign_up"><?=$this->lang->line("sign_up"); ?></a></li>
            <?php }else {?>
            <li><a href="<?=$this->session->userdata['username']?>"><?=$this->session->userdata['username']?></a></li>
            <li><a href="<?=base_url()?>index.php/home/logout"><?=$this->lang->line("logout"); ?></a></li>
             <?php }?>
           </ul>
        </nav>
      </div>
    </div><!-- End Navigation bar -->
