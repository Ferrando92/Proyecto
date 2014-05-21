

<style type="text/css">
   
    #cuerpo{
        width: 1000px;
        padding: 20px;
        background-color: #333;
        color: #fff;
        font-size: 12px;
    }
    #paginacion{
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
    <h2><?=$fila->titulo?></h2>
    <h4><?=$fila->descripcion?></h4>
    
    <?php
    }
    ?>
    <?=$this->pagination->create_links()?>
    <?php
    }
    ?>
</div>
</html>