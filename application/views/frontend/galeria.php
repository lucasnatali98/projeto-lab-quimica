<br>
<br>
<br>
<br>
<div class="container">
    <div class = "row justify-content-left">
         <div class = "col-md-6 col-xs-6 col-lg-6 col-sm-6" >
            <h3>Galeria</h3>
          </div>
    </div>
</div>

<div class="container">
    <div class = "row justify-content-left">
        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                <?php
                    foreach($this->modelgaleria->listar_anos() as $anos)
                    { ?>
                       <ul class="nav nav-pills nav-fill" style="font-size: 25px;">
                        <li class="nav-link disabled"><?php echo $anos ?></li>
                    <?php
                    } ?>
            </ul> <!-- fim da UL -->    
        </div> <!-- fim do col -->
    </div> <!-- fim da row -->
</div> <!-- fim do container -->

<br>
<br>
<br>
<?php
    foreach($listafotos as $picture){
        if($picture->imagem == 1){
            $mostraImg = "assets/frontend/img/fotos/".md5($picture->id_galeria).".jpg";
        }
        else{
            $mostraImg = "assets/frontend/img/semfoto.jpg";
        }
    }
?>


<div class="container">
    <div class = "row justify-content-left">
            <?php
            $i=0;          
            foreach($listagalerias as $galeria)
            { 
                
                ?>
                <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                    <img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="<?php echo base_url($mostraImg)  ?>" />  
                    <p class="text-center" style="color:#FF6D1A; font-size: 30px;"><?php echo $galeria->nome ?></p> 
                </div>    

               
           <?php $i++; }  ?>
                
           
            
        </div>
    </div> <!-- fim da row -->
</div> <!-- fim do container -->