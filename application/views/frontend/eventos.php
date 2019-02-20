<div id="eventos" style="
    padding-right: 10%;
    padding-left: 10%;
    padding-top: 5%;
    padding-bottom: 5%;">

    <h2 class="subtitle" style="font-size: 30px;
    color: #222;
    margin-bottom: 20px;
    margin-top: 40px;">Eventos</h2>
	
	<?php $anoSelecionado = null ?>

    <div class="anos">
        <ul>
            <li>
                <?php foreach($listaDeAnos as $ano){?>
                    <a onclick="selecionarAno(<?php echo $ano ?>)" href="<?php echo base_url('/eventos/'.$ano) ?>"><?php echo $ano ?> | </a> 
                <?php }?>
            </li>
        </ul>
    </div>

        <h2 id="anoSelect" class="anoTxt"> AnoSelect</h2> 
  
        <?php $i=0; foreach($listaevento as $evento) { ?>
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
    
      ?>

    

</div>

<script>
	function selecionarAno(ano){
		document.querySelector("#anoSelect").innerHTML= ano;
	}
</script>

