



<br>
<br>
<br>
<br>
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
                <img src="<?php echo base_url('/assets/frontend/img/exemplo.jpg'); ?>" class="img-fluid border border-dark" id = "<?php echo $i ?>" >
                <p class="text-center" style="color:#FF6D1A; font-size: 30px;" id = "<?php echo $i ?>"><?php echo $pessoal->nome ?></p>   
                <p class="text-center" style="color:#2B2B2B; font-size: 20px; margin-top: -20px;" id = "<?php echo $i ?>"><?php echo $pessoal->cargo ?></p>
                <p class="text-center" style="margin-top: -10px;" id = "<?php echo $i ?>"><a href="<?php echo $pessoal->lattes ?>">Lattes</a></p>
            </div>
       
                
        
    <?php $i++; } ?>
    </div>  
</div>

    
    
   
    

</div>

