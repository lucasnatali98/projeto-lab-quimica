<div id="eventos" style="
    padding-right: 10%;
    padding-left: 10%;
    padding-top: 5%;
    padding-bottom: 5%;">

    <h2 class="subtitle" style="ont-size: 30px;
    color: #222;
    margin-bottom: 20px;
    margin-top: 40px;">Eventos</h2>

    <div class="anos">
        <ul>
            <li>
                <?php foreach($listaDeAnos as $ano){?>
                    <a href="#<?php echo $ano ?>"><?php echo $ano ?> | </a> 
                <?php }?>
            </li>
        </ul>
    </div>
    <?php foreach($listaDeAnos as $ano){?>
        <h2 id="<?php echo $ano ?>" class="anoTxt"><?php echo $ano ?></h2> 
        
        <?php $i=0; foreach($listaeventos as $evento) {
            if($evento->ano == $ano){?>                
                <div class="evento">
                    <h2>
                        <?php echo $evento->titulo?> 
                    </h2>
                    <p id="descricao-<?php echo $i; ?>"><?php echo $evento->descricao ?></p>
                    <center>
                        <img style="margin-top: 10px;" src="<?php echo base_url("assets/frontend/img/eventos/".md5($evento->id).".jpg"); ?>" />
                    </center>
                    <hr>
                </div>
        <?php $i++; }
        }
    }
      ?>

    

</div>

