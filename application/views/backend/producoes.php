<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo 'Administrar '.$subtitulo ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <?php echo 'Adicionar ' .$subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <?php
                                echo validation_errors('<div class="alert alert-danger">','</div>');
                                echo form_open('admin/producoes/inserir');
                            ?>
                            <div class="form-group">
                                <label id="txt-titulo">Tírulo</label>
                                <input type="text" id="txt-titulo" name="txt-titulo" class="form-control" placeholder="Informe o título da producao ...">
                                <hr>
                                <label id="txt-descricao">Descrição da Producao</label>
                                <input type="text" id="txt-descricao" name="txt-descricao" class="form-control" placeholder="Informe a descrição da producao ...">
                                <hr>
                                <label id="txt-data">Data</label>
                                <input type="datetime-local" id="txt-data" name="txt-data" class="form-control" placeholder="Informe a data de criação da producao ...">       
                                </br>
                                <label id="txt-ano">Ano do evento</label>
                                <input type="text" id="txt-ano" name="txt-ano" class="form-control" placeholder="Informe o ano da Producao...">
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

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <?php echo 'Alterar ' .$subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                $this->table->set_heading("Titulo", "Data", "Alterar", "Excluir");
                                foreach($listaproducoes as $producao){
                                    $tituloproducao= $producao->titulo;
                                    $data = postadoem($producao->data);

                                    $alterar= anchor(base_url('admin/producoes/alterar/'.md5($producao->id)), '<i class="fa fa-refresh fa-fw"></i> Alterar');

                                    $excluir= '<button type="button" class="btn btn-link" data-toggle="modal" data-target=".excluir-modal-'.$producao->id.'"><span style="color:red"><i class="fa fa-remove fa-fw"></i> Excluir</span></button>';
                                    echo $modal= ' <div class="modal fade excluir-modal-'.$producao->id.'" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel2">Exclusão de producao</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Deseja Realmente excluir a producao '.$producao->titulo.'?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <a type="button" class="btn btn-primary" href="'.base_url("admin/producoes/excluir/".md5($producao->id)).'">Excluir</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>';

                                    $this->table->add_row($tituloproducao, $data, $alterar, $excluir);
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
