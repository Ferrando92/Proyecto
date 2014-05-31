<style type="text/css">
.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
cursor: auto;
background-color: #eeeeee;
}
</style>


<script>
   function change_display(tab,div)
    {
        $("#profile").css('display', 'none');
        $("#edit_profile").css('display', 'none');
        $("#articulos").css('display', 'none');
        $("#profile_tab").attr( "class","");
        $("#edit_tab").attr( "class","");
        $("#articles_tab").attr( "class","");
        $("#messages_tab").attr( "class","");
        $("#logout_tab").attr( "class","");
        $('#'+div).show();
        $( "#"+tab ).attr( "class","active");
    }
    function delete_article(id_libro)
    {
      if (confirm('Estas seguro de que quieres borrar este articulo?'))
      {
        var id_user= "<?=$this->session->userdata['id']?>";
        $.ajax({
                url: "<?php echo base_url();?>index.php/article/delete/"+id_libro,
                type: "POST",
                data: { id_user : id_user},
                success: function(data) {
                     if(data=="Borrado")
                     {
                      $("#articulo-"+id_libro).css('display', 'none');
                     }

                },
              });
      }
    }
    function edit_article(id_libro)
    {

    }
    
</script>
<div class="container" style="margin-top:100px;">
	<div class="row well">
		<div class="col-md-2">
    	    <ul class="nav nav-pills nav-stacked well">
              <li id="profile_tab" onclick="change_display('profile_tab','profile')" class="active"><a href="#"><i class="fa fa-envelope"></i> Perfil</a></li>
              <li id="edit_tab" onclick="change_display('edit_tab','edit_profile')"><a href="#"><i class="fa fa-home"></i> Editar</a></li>
              <li id="articles_tab" onclick="change_display('articles_tab','articulos')"><a href="#"><i class="fa fa-user"></i> Articulos</a></li>
              <li id="messages_tab" onclick="change_display('messages_tab','messages')"><a href="#"><i class="fa fa-key"></i> Mensajes</a></li>
              <li id="logout_tab" onclick="change_display('logout_tab','profile')"><a href="<?=base_url()?>index.php/login/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
    </div>
    <div class="col-md-10">
    <div class="panel">
      <?php if(isset($this->session->userdata['fb_id'])){?>
        <img style="margin-left:10px; margin-top:10px;" src="http://graph.facebook.com/<?=$this->session->userdata['fb_id']?>/picture?type=large" alt="...">
      <?php }else{?>
        <img style="margin-top:8px; margin-left:10px;"  src="<?=base_url()?>images/server/user_default.png">
      <?php }?>
        <div class="name"><small style="font-size:45px;"><?=$user->nombre_completo?></small></div>
    </div>
    <div id="profile" class="container"  >
      <div class="tab-panel" id="event">
        <div class="tab-pane" id="settings">
         <form class="form" action="##" method="post" id="registrationForm">
            <div class="form-group">
                
                <div class="col-xs-8">
                    <label for="first_name"><h4><?=$this->lang->line("full_name"); ?></h4></label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user->nombre_completo?>"  title="enter your first name if any." disabled="disabled">
                </div>
            </div>
            <div class="form-group">
                
                <div class="col-xs-8">
                  <label for="last_name"><h4><?=$this->lang->line("mail"); ?></h4></label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $user->mail?>" title="enter your last name if any."disabled>
                </div>
            </div>

            <div class="form-group">
                
                <div class="col-xs-8">
                    <label for="phone"><h4><?=$this->lang->line("date"); ?></h4></label>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user->fecha_registro?>" title="enter your phone number if any."disabled>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-8">
                   <label for="mobile"><h4><?=$this->lang->line("location"); ?></h4></label>
                    <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $user->poblacion?>" title="enter your mobile number if any."disabled>
                </div>
            </div>
            <div class="form-group">
                
                <div class="col-xs-8">
                    <label for="email"><h4><?=$this->lang->line("phone"); ?></h4></label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $user->telefono?>" title="enter your email."disabled>
                  <br></br>
                </div>
            </div>
         </form>
        </div>
      </div>  
    </div>
     <div id="edit_profile" class="container" style="display:none;">
      <div class="tab-panel" id="event">
        <div class="tab-pane" id="settings">
         <form class="form" action="<?=base_url()?>index.php/profile/edit" method="post" id="registrationForm">
            <div class="form-group">
                
                <div class="col-xs-8">
                    <label for="full_name"><h4><?=$this->lang->line("full_name"); ?></h4></label>
                    <input type="text" class="form-control" name="edit_full_name" id="full_name" value="<?php echo $user->nombre_completo?>"  title="enter your first name if any.">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-8">
                   <label for="location"><h4><?=$this->lang->line("location"); ?></h4></label>
                    <input type="text" class="form-control" name="edit_poblacion" id="location" value="<?php echo $user->poblacion?>" title="enter your mobile number if any.">
                </div>
            </div>
            <div class="form-group">
                
                <div class="col-xs-8">
                    <label for="phone"><h4><?=$this->lang->line("phone"); ?></h4></label>
                    <input type="text" class="form-control" name="edit_phone" id="email" value="<?php echo $user->telefono?>" title="enter your email.">
                </div>
            </div>
            <div class="form-group">
                
                <div class="col-xs-8">
                    <label for="old_password"><h4>Password</h4></label>
                    <input type="password" class="form-control" name="old_password" id="password" placeholder="old password" title="enter your password.">
                </div>
            </div>
            <div class="form-group">
                
                <div class="col-xs-8">
                    <label for="new_password"><h4>Password</h4></label>
                    <input type="password" class="form-control" name="new_password" id="password" placeholder="new password" title="enter your password.">
                </div>
            </div>
            <div class="form-group">
                
                <div class="col-xs-8">
                  <label for="new_password2"><h4>Verify</h4></label>
                    <input type="password" class="form-control" name="new_password2" id="password2" placeholder="new password" title="enter your password2.">
                </div>
            </div>
            <div class="form-group">
                 <div class="col-xs-12">
                      <br>
                      <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                 </div>
            </div>
         </form>
        </div>
      </div>  
    </div>
    <div id="messages" class="container" style="display:none;">
    Proximamente...
    </div>
    <div id="articulos" class="container" style="display:none;">
      <div class="tab-panel" id="event">
      <?php 
      if($articulos)
      foreach ($articulos as $articulo ) {?>
      
        <div class="media"id="articulo-<?=$articulo->id_libro?>">
            <a class="pull-left" href="#">
                <img class="media-object img-thumbnail" width="100" src="http://cfi-sinergia.epfl.ch/files/content/sites/cfi-sinergia/files/WORKSHOPS/Workshop1.jpg" alt="...">
            </a>
            <div class="media-body">
                <a href="<?=base_url().'index.php/article/view/'.$articulo->id_libro?>"><h4 class="media-heading"><?=$articulo->titulo?></h4></a>
                <?=$articulo->isbn?>
                <br>
                <a onclick="delete_article(<?=$articulo->id_libro?>)" class="btn btn-danger btn-xs"><i class="icon-white icon-remove"></i> Delete</a>
                <a href="article/edit/<?=$articulo->id_libro?>" class="btn btn-warning btn-xs"><i class="icon-white icon-remove"></i> Editar</a>
            </div>
        </div>
        <?php } else echo "Aun no tienes articulos"; ?>
    </div>   
    
    <br><br><br>
    <div id="contenido" style="display:none;">
    <ul class="nav nav-tabs" id="myTab">
      <li class="active"><a href="#inbox" data-toggle="tab"><i class="fa fa-envelope-o"></i> Inbox</a></li>
      <li><a href="#sent" data-toggle="tab"><i class="fa fa-reply-all"></i> Sent</a></li>
      <li><a href="#assignment" data-toggle="tab"><i class="fa fa-file-text-o"></i> Assignment</a></li>
      <li><a href="#event" data-toggle="tab"><i class="fa fa-clock-o"></i> Event</a></li>
    </ul>
    
    <div class="tab-content">
      <div class="tab-pane active" id="inbox">
        <a type="button" data-toggle="collapse" data-target="#a1">
            <div class="btn-toolbar well well-sm" role="toolbar"  style="margin:0px;">
              <div class="btn-group"><input type="checkbox"></div>
              <div class="btn-group col-md-3">Admin Kumar</div>
              <div class="btn-group col-md-8"><b>Hi Check this new Bootstrap plugin</b> <div class="pull-right"><i class="glyphicon glyphicon-time"></i> 12:10 PM <button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-share-square-o"> Reply</i></button></div> </div>
            </div>
        </a>
        <div id="a1" class="collapse out well">This is the message body1</div>
        <br>
        <button class="btn btn-primary btn-xs"><i class="fa fa-check-square-o"></i> Delete Checked Item's</button>
      </div>
     
       
      <div class="tab-pane" id="sent">
            <a type="button" data-toggle="collapse" data-target="#s1">
            <div class="btn-toolbar well well-sm" role="toolbar"  style="margin:0px;">
              <div class="btn-group"><input type="checkbox"></div>
              <div class="btn-group col-md-3">Kumar</div>
              <div class="btn-group col-md-8"><b>This is reply from Bootstrap plugin</b> <div class="pull-right"><i class="glyphicon glyphicon-time"></i> 12:30 AM</div> </div>
            </div>
        </a>
        <div id="s1" class="collapse out well">This is the message body1</div>
        <br>
        <button class="btn btn-primary btn-xs"><i class="fa fa-check-square-o"></i> Delete Checked Item's</button>
      </div>
      
      
     <div class="tab-pane" id="assignment">
        <a href=""><div class="well well-sm" style="margin:0px;">Open GL Assignments <span class="pull-right"><i class="glyphicon glyphicon-time"></i> 12:20 AM 20 Dec 2014 </span></div></a>        
     </div>
     
     <div class="tab-pane" id="event">
      
      <div class="media">
            <a class="pull-left" href="#">
              <img class="media-object img-thumbnail" width="100" src="http://cfi-sinergia.epfl.ch/files/content/sites/cfi-sinergia/files/WORKSHOPS/Workshop1.jpg" alt="...">
            </a>
            <div class="media-body">
              <h4 class="media-heading">Animation Workshop</h4>
              2Days animation workshop to be conducted
            </div>
      </div>
           
    </div>
    
    
        
    </div>

     </div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"><br/><br/><!--ventanita modal no mas-->
      <form class="form-horizontal">
      <fieldset>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-2 control-label" for="body">Body :</label>  
        <div class="col-md-8">
        <input id="body" name="body" type="text" placeholder="Message Body" class="form-control input-md">
          
        </div>
      </div>
      
      <!-- Textarea -->
      <div class="form-group">
        <label class="col-md-2 control-label" for="message">Message :</label>
        <div class="col-md-8">                     
          <textarea class="form-control" id="message" name="message"></textarea>
        </div>
      </div>
      
      <!-- Button -->
      <div class="form-group">
        <label class="col-md-2 control-label" for="send"></label>
        <div class="col-md-8">
          <button id="send" name="send" class="btn btn-primary">Send</button>
        </div>
      </div>
      
      </fieldset>
      </form>
    </div>
  </div>
</div>
