
<div id="container">
<form class="form-horizontal" method="post" action="<?=base_url()?>index.php/article/update/<?=$articulo->id_libro?>">
<fieldset>

<!-- Form Name -->
<div class="form-group" style="margin-top:150px;margin-left:-250px;">
<label class="col-md-7 control-label"><h2>Modo edicion</h2></label>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name"><?=$this->lang->line("ad_title"); ?></label>  
  <div class="col-md-4">
  <input id="ad_title" name="ad_title" type="text" placeholder="" class="form-control input-md" required=""  value="<?=$articulo->titulo?>">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="description"><?=$this->lang->line("description"); ?></label>  
  <div class="col-md-4">
  <textarea id="description" name="description" placeholder="" class="form-control input-md" required="" value=""><?=$articulo->descripcion?></textarea>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="precio">Precio</label>
  <div class="col-md-4">
    <input id="precio" name="precio" type="text" placeholder="" class="form-control input-md" required="" value="<?=$articulo->precio?>">
    
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
