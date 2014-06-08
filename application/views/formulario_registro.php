
    <style type="text/css">
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
    }

    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 15% auto;
    }
    .form-signin .form-signin-heading{
        padding-bottom: 10px;
        margin-bottom: 20px;
        border-bottom: 1px #ccc dotted;
        text-align: center;
    }
    .form-signin .footer{
        padding-top: 10px;
        margin-top: 20px;
        border-top: 1px #ccc dotted;
        font-weight: 600;
    }
    .fa {
        color: #cc0000;
    }
    </style>
    <script>
    function change_display()
    {
        $("#menu_login").toggle("slow");
        $("#reg_form").toggle("slow");
    }
    function check_login()
    {
        $("#wibuks_login").toggle("fast");
        var image="<img src=<?php echo base_url(); ?>images/server/searching.gif />"
        $("#alert_div").html(image);
        var mail = $("#mail").val();
        var pass = $("#pass").val();
        setTimeout(function(){
            $.ajax({
              url: "<?php echo base_url();?>index.php/login/wibuks_login",
              type: "POST",
              data: { mail : mail, pass : pass },
              success: function(data) {
                        if(data=="success")
                        {
                            var mensaje="<h1> WOW, SUCH AMAISING</h1>";
                             $("#alert_div").html(mensaje);
                        }
                        else
                        {
                            alert(":(")
                        }
                    },
              
            });
        }, 3000);
    }

    </script>

    <div class="container">
        <form class="form-signin" role="form" id="menu_login">
            <h2 class="form-signin-heading"><?=$this->lang->line("login_title"); ?></h2>
            <a href="<?= $facebook_login?>" class="btn btn-lg btn-primary btn-block" role="button"><?=$this->lang->line("fb_log_button"); ?></a>
            <a onclick="change_display();" class="btn btn-lg btn-success btn-block" role="button"><?=$this->lang->line("log_button"); ?></a>
            <div class="footer">
            </div>
        </form>
    </div>
      <div id="alert_div" class="container text-center" style="margin-top:15%"></div>
    </div> 
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<div id="reg_form" style="display:none;  margin-top:-400px;">
  <div id="container">
  <form class="form-horizontal" method="post" action="sign_up/registrar">
  <fieldset>

  <!-- Form Name -->
  <div class="form-group" style="margin-top:150px">
  <label class="col-md-7 control-label"><h2><?=$this->lang->line("form_name"); ?></h2></label>
  </div>
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="name"><?=$this->lang->line("full_name"); ?></label>  
    <div class="col-md-4">
    <input id="name" name="name" type="text" placeholder="Ej. Paco Lopez Martinez" class="form-control input-md" required="">
    <span class="help-block"><?=$this->lang->line("help_full_name"); ?></span>  
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="username"><?=$this->lang->line("username"); ?></label>  
    <div class="col-md-4">
    <input id="username" name="username" type="text" placeholder="Ej. pepe1952" class="form-control input-md" required="">
    <span class="help-block"><?=$this->lang->line("help_username"); ?></span>  
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="mail"><?=$this->lang->line("mail"); ?></label>  
    <div class="col-md-4">
    <input id="mail" name="mail" type="text" placeholder="Ej. Pacopepe@wibuks.com" class="form-control input-md" required="">
    <span class="help-block"><?=$this->lang->line("help_mail"); ?></span>  
    </div>
  </div>

  <!-- Password input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="pass"><?=$this->lang->line("password"); ?></label>
    <div class="col-md-4">
      <input id="pass" name="pass" type="password" placeholder="********" class="form-control input-md" required="">
      <span class="help-block"><?=$this->lang->line("help_password"); ?></span>
    </div>
  </div>

  <!-- Password input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="pass2"><?=$this->lang->line("password2"); ?></label>
    <div class="col-md-4">
      <input id="pass2" name="pass2" type="password" placeholder="********" class="form-control input-md" required="">
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="city"><?=$this->lang->line("city"); ?></label>  
    <div class="col-md-4">
    <input id="city" name="city" type="text" placeholder="Ej. Barcelona" class="form-control input-md">
    <span class="help-block"><?=$this->lang->line("help_city"); ?></span>  
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="phone"><?=$this->lang->line("phone"); ?></label>  
    <div class="col-md-4">
    <input id="phone" name="phone" type="text" placeholder="Ej. 636389234" class="form-control input-md">
    <span class="help-block"><?=$this->lang->line("help_notrequired"); ?></span>  
    </div>
  </div>

  <!-- Button -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="signin_button"></label>
    <div class="col-md-4">
      <button id="signup_button" name="signup_button" class="btn btn-primary"><?=$this->lang->line("button_sign_up"); ?></button>
    </div>
  </div>

  </fieldset>
  </form>
  </div>
</div>

</body>
</html>