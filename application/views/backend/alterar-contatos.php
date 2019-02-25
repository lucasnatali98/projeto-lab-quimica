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
                            echo form_open('admin/contatos/salvar_alteracoes');
                            foreach($listacontatos as $contato){
                            ?>
                            <div class="form-group">
                                <label id="txt-nome">Nome</label>
                                <input type="text" id="txt-nome" name="txt-nome" class="form-control" placeholder="Informe o nome do recipiente da mensagem de contato dos usuários ..."  value="<?php echo $contato->nome ?>">
                                </br>
                                <label id="txt-email">Email</label>
                                <input type="text" id="txt-email" name="txt-email" class="form-control" placeholder="Informe o e-mail do recipiente da mensagem de contato dos usuários ..." value="<?php echo $contato->email ?>">
                                </br>
                            </div>
                            <input type="hidden" name="txt-id" id="txt-id" value="<?php echo $contato->id ?>">
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
