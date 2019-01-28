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
            <li><a href="#">2019</a></li>
            <li><a href="#">2018</a></li>
            <li><a href="#">2017</a></li>
            <li><a href="#">2016</a></li>
            <li><a href="#">2015</a></li>
            <li><a href="#">2014</a></li>
            <li><a href="#">2013</a></li>
            <li><a href="#">2012</a></li>
            <li><a href="#">2011</a></li>
            <li><a href="#">2010</a></li>
            <li><a href="#">2009</a></li>
        </ul>
    </div>
    <h2 class="anoTxt">2019</h2>


        <?php $i=1; foreach($listaeventos as $evento) {?>
            
            <div class="evento">
                <h2>
                    <?php echo $evento->titulo?> 
                </h2>
                <p id="descricao-<?php echo $i; ?>"><?php echo $evento->descricao ?></p>
                <center>
                    <img style="margin-top: 10px;" src="<?php base_url("assets/frontend/img/eventos/".md5($evento->id).".jpg"); ?>" />
                </center>
                <hr>
            </div>

        <?php $i++; } ?>

    

</div>

