<div id="producoes">
  <h2 class="subtitle">Produções</h2>

  <div class="anos">
    <ul>
      <li>
        <?php foreach($listaDeAnos as $ano){?>
          <a href="#<?php echo $ano ?>"><?php echo $ano ?> | </a> 
        <?php }?>
      </li>
    </ul>
  </div>

  <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

    <?php foreach($listaDeAnos as $ano){?>
      <h2 id="<?php echo $ano ?>" class="anoTxt"><?php echo $ano ?></h2> 

      <?php $i=0; foreach($listaproducoes as $producao) {
        if($producao->ano == $ano){?>              

          <div class="card">
            <div class="card-header" role="tab" id="headingOne1">
              <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                <h5 class="mb-0"><?php echo $producao->titulo ?> 
                  <i class="fa fa-angle-down rotate-icon"></i>
                </h5>
              </a>
            </div>

            <!-- Card body -->
            <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
              <div class="card-body">
                <?php echo $producao->descricao ?> 
                <br>
                <div class="media-div">
                  <img src="<?php echo base_url('/assets/frontend/img/logo1.jpg'); ?>" />                  
                  <button class="btn-galeria"> Abrir </button>
                </div>
              </div>
            </div>
          </div>
        <?php $i++; }
      }
    }?>
  </div>
<!-- Accordion wrapper -->
</div>

