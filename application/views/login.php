
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


    <div class="container">
        <form class="form-signin" role="form">
            <h2 class="form-signin-heading"><?=$this->lang->line("login_title"); ?></h2>
            <a href="<?= $facebook_login?>" class="btn btn-lg btn-primary btn-block" role="button"><?=$this->lang->line("fb_log_button"); ?></a>
            <a href="<?= $wibuks_login?>" class="btn btn-lg btn-success btn-block" role="button"><?=$this->lang->line("log_button"); ?></a>
            <div class="footer">
            </div>
        </form>
    </div> <!-- /container -->
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>