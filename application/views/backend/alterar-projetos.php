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
                   <?php echo 'Alterar ' .$subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            echo validation_errors('<div class="alert alert-danger">','</div>');
                            echo form_open('admin/projetos/salvar_alteracoes');
                            foreach($listaprojetos as $projeto){
                            ?>
                            <div class="form-group">
                                <label id="txt-titulo">Título do Projeto</label>
                                <input type="text" id="txt-titulo" name="txt-titulo" class="form-control" placeholder="Informe o título do projeto..." value="<?php echo $projeto->titulo ?>">
                                </br>
                                <label id="txt-descricao">Descrição do Projeto</label>
                                <input type="text" id="txt-descricao" name="txt-descricao" class="form-control" placeholder="Informe a descrição do projeto..." value="<?php echo $projeto->descricao ?>">
                                </br>
                            </div>
                            <input type="hidden" name="txt-id" id="txt-id" value="<?php echo $projeto->id ?>">
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
