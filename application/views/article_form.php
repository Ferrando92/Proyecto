<div id="container">
<form class="form-horizontal" method="post" action="article/create">
<fieldset>

<!-- Form Name -->
<div class="form-group" style="margin-top:150px;margin-left:-250px;">
<label class="col-md-7 control-label"><h2><?=$this->lang->line("form_name"); ?></h2></label>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name"><?=$this->lang->line("ad_title"); ?></label>  
  <div class="col-md-4">
  <input id="ad_title" name="ad_title" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="description"><?=$this->lang->line("description"); ?></label>  
  <div class="col-md-4">
  <input id="description" name="description" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ISBN"><?=$this->lang->line("isbn"); ?></label>  
  <div class="col-md-4">
  <input id="isbn" name="isbn" type="text" placeholder="<?=$this->lang->line('help_notrequired'); ?>" class="form-control input-md" >
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pass"><?=$this->lang->line("editorial"); ?></label>
  <div class="col-md-4">
    <input id="editorial" name="editorial" type="text" placeholder="<?=$this->lang->line('help_notrequired'); ?>" class="form-control input-md" required="">
    <span class="help-block"><?=$this->lang->line("help_password"); ?></span>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="year"><?=$this->lang->line("year"); ?></label>
  <div class="col-md-4">
    <input id="year" name="year" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="subject"><?=$this->lang->line("subject"); ?></label>  
  <div class="col-md-4">
  <input id="subject" name="subject" type="text" placeholder="<?=$this->lang->line('help_notrequired'); ?>" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="location"><?=$this->lang->line("location"); ?></label>  
  <div class="col-md-4">
  <input id="location" name="location" type="text" placeholder="<?=$this->lang->line('help_notrequired'); ?>" class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="phone"><?=$this->lang->line("phone"); ?></label>  
  <div class="col-md-4">
  <input id="phone" name="phone" type="text" placeholder="<?=$this->lang->line('help_notrequired'); ?>" class="form-control input-md">
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="signin_button"></label>
  <div class="col-md-4">
    <button id="signup_button" name="signup_button" class="btn btn-primary"><?=$this->lang->line("public_button"); ?></button>
  </div>
</div>

</fieldset>
</form>
</div>
