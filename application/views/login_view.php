
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
        $("#wibuks_login").toggle("slow");
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
                             $(location).attr('href',"<?=base_url()?>index.php/home");
                        }
                        else
                        {
                             $("#wibuks_login").toggle("fast");
                           
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
    <div class="container" id="wibuks_login" style="display:none;">
        <form class="form-signin" role="form">
            <div class="form-group">
             <h2 class="form-signin-heading"><?=$this->lang->line("login_wibuks_title"); ?></h2>
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="mail"  style="font-size:15px;height:50px;color:#FF710B;">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="pass" style="font-size:15px;height:50px; color:#FF710B;">
            </div>
            <div class="footer"></div>
            <a onclick="check_login();" class="btn btn-lg btn-primary btn-block" role="button"><?=$this->lang->line("login_button"); ?></a>
        </form>
    </div>
    <div id="alert_div" class="container text-center" style="margin-top:15%"></div>
    </div> 
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>