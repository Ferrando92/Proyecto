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
