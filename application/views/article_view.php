<!--
Sticky footer example by Mr. M. - Confederation College - IMD Program 

Based on tutorial from: http://www.coders-guide.com/watch.php?v=53
-->
<script type="text/javascript">
  function contact_user()
  {
    var article_id=<?=$this->uri->segment(3)?>;
    alert(article_id);
    var to = get_mail_by_article(article_id);
    var name = $("#name_mail").val();
    var from = "<?=$this->session->userdata['mail']?>";
    var message =$("#message_mail").val();
     $.ajax({
              url: "<?php echo base_url();?>index.php/email/send_contact",
              type: "POST",
              async: false, 
              data: { from : from ,name: name, to : to, message :message},
              success: function(data) {
                 alert(xaxi);
                },
              
            });
     
  }
  function get_mail_by_article(id)
  {
    var mail="";
        $.ajax({
              url: "<?php echo base_url();?>index.php/article/get_mail",
              type: "POST",
              async: false, 
              data: { id_article : id},
              success: function(data) {
                 mail=data;  
                },
              
            });
        return mail;
        
  }
</script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
<link rel="stylesheet" href="http://bootsnipp.com/css/bootsnipp.css?ver=3dad078c6953f3a8a72bbfccae6365ae">
<link rel="stylesheet" href="http://bootsnipp.com/css/ladda-themeless.min.css">

 <div class="container" style="margin-top:60px;">  
<div class="well well-md">
<h1 style="font-size:60px;"><?=$articulo->titulo;?><h1>
</div>
<div class="row marketing">
        <div class="col-lg-6">
          <p>
              <img src="http://farm9.staticflickr.com/8083/8430638774_f7a7e83b7f_n.jpg" alt="sticky bun flickr.com" class="img-responsive img-rounded center-block">
          </p>
        </div>
        <div class="col-lg-6">
          <h2>Descripcion</h2>
          <p>
          <?=$articulo->descripcion;?>
          </p>
        </div>
        <div class="col-lg-6">
          <h2>ISBN</h2>
          <p>
          <?=$articulo->isbn;?>
          </p>
        </div>
        <div class="col-lg-6">
          <h2>Precio</h2>
          <p>
          <?=$articulo->precio;?> EUROS
          </p>
        </div>
      <div class="col-lg-6">
          <h2>Fecha del anuncio: </h2>
          <p>
          <?=$articulo->fecha_creacion;?>
          </p>
        </div>

      
      </div>

</div>
<?php if(isset($this->session->userdata["username"])) {?>
  <div class="container" style="margin-left:25%;">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Subject</label>
                            <input type="text" class="form-control" id="name_mail" placeholder="Enter name" required="required" />
                        </div>
                      
                      
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message_mail" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="button" onclick="contact_user()"class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
