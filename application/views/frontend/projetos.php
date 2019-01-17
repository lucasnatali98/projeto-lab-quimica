<br>
<br>
<br>
<div class="page-header">
	<h1>Projetos</h1>
</div>

<?php $i=1; foreach($listaprojetos as $projeto) {?>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading border border-dark">
        <h4 class="panel-title"> 
          <?php echo $projeto->titulo?> 
          <a class="float-right nounderline" style="color:#000" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>"><i class="fa fa-plus-square"></i></a>
        </h4>
      </div>
      <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse in">
        <div class="panel-body border border-dark border-top-0"><p><?php echo $projeto->descricao?></p></div>
      </div>
    </div>
<?php $i++; } ?>