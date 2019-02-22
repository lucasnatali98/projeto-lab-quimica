



<br>
<br>
<br>
<br>
<div id="pessoal">
    <div class = "container">
        
        
        <div class = "row justify-content-left">
             <div class = "col-md-6">
                <h3>Pessoas</h3>
              </div>
        </div>
    </div>

    <br>
    <br>

    <div class = "container">
        <div class = "row justify-content-left">
        <?php $i=1;
        foreach($this->modelpessoal->listar_pessoas() as $pessoal){ ?> 
                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                    <?php 
                        if($pessoal->foto == 1){
                            $mostraImg = "assets/frontend/img/pessoas/".md5($pessoal->id).".jpg";
                        }else{
                            $mostraImg = "assets/frontend/img/semfoto.jpg";
                        }
                    ?>

                    <div class="text-center">
                        <img id="img-pessoal" class="col-md-12 col-sm-12 col-lg-12 col-xs-12" src="<?php echo base_url($mostraImg) ?>">
                        <p class="pessoal-nome" id = "<?php echo $i ?>"><?php echo $pessoal->nome ?></p>   
                        <p class="pessoal-cargo" id = "<?php echo $i ?>"><?php echo $pessoal->cargo ?></p>
                        <p class="pessoal-lattes" id = "<?php echo $i ?>"><a href="<?php echo $pessoal->lattes ?>">Lattes</a></p>
                    </div>
                </div>
           
                    
            
        <?php $i++; } ?>
        </div>  
    </div>
    </div>
</div>

