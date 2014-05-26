

<style type="text/css">
   
    #cuerpo{
        width: 1000px;
        padding: 20px;
        background-color: #333;
        color: #fff;
        font-size: 12px;
    }
    #paginacion{
        margin-left: 25%;
        padding: 10px;
        width: 1020px;
        text-align: center;
    }
    #paginacion a{
        color: #FF850B; 
        text-decoration: none;
        margin: 1px;
    }
</style>
<div style="margin-top:100px;">
    <?php
    if(!$searches)
    {
    
   $this->load->view("oops_view");
   
    }else{
    foreach($searches as $fila)
    {
    ?>
    <div style="padding:.6em; overflow:auto; margin-left:40%;  width:450px; background-color:#F5F5F5; margin-bottom:30px;">
        <h2>TITULO: <a href="<?=base_url()?>index.php/article/view/<?=$fila->id_libro?>"><?=$fila->titulo?></a></h2>
        <h4>ISBN: <?=$fila->isbn?></h4>
        <h2 style="text-align:right"><?=$fila->precio?> Euros</h4>
    </div>
    <?php
    }
    ?>
    <div style="">
    <?=$this->pagination->create_links()?>
    <?php
    }
    ?>
    </div>
</div>
</html>