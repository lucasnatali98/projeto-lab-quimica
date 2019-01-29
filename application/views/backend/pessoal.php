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
                            echo form_open_multipart('admin/pessoal/inserir');
                            
                            
                            ?>
                            <div class="form-group">
                                <label id="txt-nome">Nome</label>
                                    <input type="text" id="txt-nome" name="txt-nome" class="form-control" placeholder="Informe o seu nome e sobrenome...">
                                </br>
                                <label id="txt-cargo">Cargo</label>
                                    <input type="text" id="txt-cargo" name="txt-cargo" class="form-control" placeholder="Informe seu cargo atual...">
                                </br>
                                <label id="txt-lattes">Lattes</label>
                                    <input type="text" id="txt-lattes" name="txt-lattes" class="form-control" placeholder="Informe o lattes:...">
                                </br>
                                <label id="txt-foto">Foto</label>
                                    <input type="file" id="txt-foto" name="txt-foto" class="form-control-file">
                                  
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
                                $this->table->set_heading("Nome", "Cargo","Lattes","Alterar", "Excluir");
                                
                                foreach($listapessoal as $pessoal){
                                
                                    $nome= $pessoal->nome;
                                    $cargo = $pessoal->cargo;
                                    $lattes = $pessoal->lattes;
                                   

                                    $alterar= anchor(base_url('admin/pessoal/alterar/'.md5($pessoal->id)), '<i class="fa fa-refresh fa-fw"></i> Alterar');
                                    $excluir= '<button type="button" class="btn btn-link" data-toggle="modal" data-target=".excluir-modal-'.$pessoal->id.'"><span style="color:red"><i class="fa fa-remove fa-fw"></i> Excluir</span></button>';
                                    echo $modal= ' <div class="modal fade excluir-modal-'.$pessoal->id.'" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel2">Exclusão de Pessoa</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Deseja Realmente excluir a pessoa '.$pessoal->nome.'?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <a type="button" class="btn btn-primary" href="'.base_url("admin/pessoal/excluir/".md5($pessoal->id)).'">Excluir</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>';

                                    $this->table->add_row($nome, $cargo,$lattes, $alterar, $excluir);

                                   

                                    
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