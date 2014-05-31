
<script>
function check_course()
{
 var id = $("#course").val();
   $.ajax({
              url: "<?php echo base_url();?>index.php/article/get_asignaturas",
              type: "POST",
              data: { id_asignatura : id},
              success: function(data) {
                            $("#subject").html("");
                            var asignaturas = data.split("@");
                            
                            $.each(asignaturas, function(){
                                 var datos= this.split("/");
                                 //alert(datos);
                                  if(datos!="")
                                  {
                                    var option ='<option value='+datos[0]+'>'+datos[1]+'</option>';
                                    $("#subject").append(option);
                                  }
                              });
                             
                    },
              
            });
}
</script>
<div id="container">
<form class="form-horizontal" method="post" action="create">
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
  <input id="isbn" name="isbn" type="text"  class="form-control input-md" required="">
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pass"><?=$this->lang->line("editorial"); ?></label>
  <div class="col-md-4">
    <input id="editorial" name="editorial" type="text" placeholder="<?=$this->lang->line('help_notrequired'); ?>" class="form-control input-md" >
    <span class="help-block"><?=$this->lang->line("help_password"); ?></span>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="year"><?=$this->lang->line("year"); ?></label>
  <div class="col-md-4">
    <input id="year" name="year" type="text" placeholder="<?=$this->lang->line('help_notrequired'); ?>" class="form-control input-md" >
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="course"><?=$this->lang->line("course"); ?></label>  
  <div class="col-md-4">
  <select id="course" name="course" class="form-control" onchange="check_course()">
  <option value="0">--Elige un curso--</option>
  <?php 
  foreach ($cursos as $curso) {
      echo '<option value='."$curso->id_curso".'>'."$curso->descripcion".'</option>';
    }
    ?>
  </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="subject"><?=$this->lang->line("subject"); ?></label>  
  <div class="col-md-4">
  <select id="subject" name="subject" class="form-control">
  
  </select>


  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="location"><?=$this->lang->line("location"); ?></label>  
  <div class="col-md-4">
  <select id="location" name="location" class="form-control">
  <option value="0">--Elige una provincia--</option>
  <?php 
  foreach ($location as $provincia) {
      echo '<option value='."$provincia->id_provincia".'>'."$provincia->provincia".'</option>';
    }
  ?>
    

</select>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="phone"><?=$this->lang->line("phone"); ?></label>  
  <div class="col-md-4">
  <input id="phone" name="phone" type="text" placeholder="<?=$this->lang->line('help_notrequired'); ?>" class="form-control input-md">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="precio">Precio</label>
  <div class="col-md-4">
    <input id="precio" name="precio" type="text" placeholder="" class="form-control input-md" required="" >
    
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
