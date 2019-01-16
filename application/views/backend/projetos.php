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
                            echo form_open('admin/projetos/inserir');
                            ?>
                            <div class="form-group">
                                <label id="txt-titulo">Título do Projeto</label>
                                <input type="text" id="txt-titulo" name="txt-titulo" class="form-control" placeholder="Informe o título do projeto...">
                                </br>
                                <label id="txt-descricao">Descrição do Projeto</label>
                                <input type="text" id="txt-descricao" name="txt-descricao" class="form-control" placeholder="Informe a descrição do projeto...">
                                </br>
                            </div>
                            <button type="submit" class="btn btn-success">Salvar</button>
                            <?php
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

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <?php echo 'Alterar ' .$subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                $this->table->set_heading("Título do projeto", "Alterar", "Excluir");
                                foreach($listaprojetos as $projeto){
                                    $nomeproj= $projeto->titulo;
                                    $alterar= anchor(base_url('admin/projetos/alterar/'.md5($projeto->id)), '<i class="fa fa-refresh fa-fw"></i> Alterar');
                                    $excluir=anchor(base_url('admin/projetos/excluir/'.md5($projeto->id)), '<span style="color:red"><i class="fa fa-remove fa-fw"></i> Excluir</span>');

                                    $this->table->add_row($nomeproj, $alterar, $excluir);
                                }
                                $this->table->set_template(array('table_open' => '<table class="table table-striped">'));
                                   echo $this->table->generate();
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
