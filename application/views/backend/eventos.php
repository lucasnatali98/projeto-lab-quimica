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
                            echo form_open('admin/eventos/inserir');
                            ?>
                            <div class="form-group">
                                <label id="txt-titulo">Título do Evento</label>
                                <input type="text" id="txt-titulo" name="txt-titulo" class="form-control" placeholder="Informe o título do evento...">
                                </br>
                                <label id="txt-descricao">Descrição do evento</label>
                                <input type="text" id="txt-descricao" name="txt-descricao" class="form-control" placeholder="Informe a descrição do evento...">
                                </br>
                                <label id="txt-ano">Ano do evento</label>
                                <input type="text" id="txt-ano" name="txt-ano" class="form-control" placeholder="Informe o ano do evento...">
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
                            <style>
                                img {
                                    width: 200px;
                                    height: 120px;
                                }
                            </style>
                            <?php
                                $this->table->set_heading("Imagem", "Título", "Alterar", "Excluir");
                                foreach($listaeventos as $evento){
                                    if($evento->imagem == 1){
                                        $fotosevento = img("assets/frontend/img/eventos/".md5($evento->id).".jpg");
                                    }
                                    else {
                                        $fotosevento = img("assets/frontend/img/eventos/SemFoto.png");
                                    }
                                    $alterar = anchor(base_url('admin/eventos/alterar/'.md5($evento->id)), '<i class="fa fa-refresh fa-fw"></i>Alterar');
                                    $excluir = anchor(base_url('admin/eventos/excluir/'.md5($evento->id)), '<i class="fa fa-remove fa-fw"></i>Excluir');
                                    $this->table->add_row($fotosevento, $evento->titulo,$alterar, $excluir);
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
