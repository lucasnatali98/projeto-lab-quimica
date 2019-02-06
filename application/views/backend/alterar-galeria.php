<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo 'Administrar '.$subtitulo ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <?php echo 'Adicionar ' .$subtitulo ?>
                </div>
                <div class="panel-body">
                    

                    <div class="row">
                        <div class="col-lg-12">

                            <?php
                                echo validation_errors('<div class="alert alert-danger">','</div>');
                                foreach ($listagalerias as $galeria){
                                echo form_open_multipart('admin/galeria/salvar_alteracoes');
                            ?>
                            <div class="form-group">
                                <label id="txt-nome">Nome</label>
                                <input type="text" id="txt-nome" name="txt-nome" class="form-control" placeholder="Informe o nome da galeria ..." value="<?php echo $galeria->nome ?>">    
                                <hr>
                                <label id="txt-descricao">Descrição da Galeria</label>
                                <input type="text" id="txt-descricao" name="txt-descricao" class="form-control" placeholder="Informe a descrição da galeria ..." value="<?php echo $galeria->descricao ?>">
                                <hr>
                                <label id="txt-data">Data</label>
                                <input type="datetime-local" id="txt-data" name="txt-data" class="form-control" placeholder="Informe a data de criação da galeria ..." value="<?php echo strftime('%Y-%m-%dT%H:%M:%S', strtotime($galeria->data)); ?>">       
                                </br>
                            </div>            
                            <input type="hidden" name="txt-id" id="txt-id" value="<?php echo $galeria->id ?>">
                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <?php
                            }
                            echo form_close();
                            
                            ?>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
