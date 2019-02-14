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
                                    <input type="text" id="txt-nome" name="txt-nome" class="form-control" placeholder="Informe o nome do usuário ..." value="<?php echo set_value('txt-nome') ?>">
                                </br>
                                <label id="txt-cargo">Cargo</label>
                                    <input type="text" id="txt-cargo" name="txt-cargo" class="form-control" placeholder="Informe o cargo do usuário ..." value="<?php echo set_value('txt-cargo') ?>">
                                </br>
                                <label id="txt-lattes">Lattes</label>
                                    <input type="text" id="txt-lattes" name="txt-lattes" class="form-control" placeholder="Informe o currículo lattes do usuário ..." value="<?php echo set_value('txt-lattes') ?>">
                                </br>
                                </br>
                                <label id="txt-tipo">Função</label>
                                <select id="txt-tipo" name="txt-tipo">
                                    <option value="administrador">Administrador(a)</option> 
                                    <option value="auxiliar">Auxiliar</option>
                                </select>
                                </br>
                                </br>
                                 <label id="txt-user">User</label>
                                    <input type="text" id="txt-user" name="txt-user" class="form-control" placeholder="Informe o username ..." value="<?php echo set_value('txt-user') ?>">
                                </br>
                                <label id="txt-senha">Senha</label>
                                    <input type="password" id="txt-senha" name="txt-senha" class="form-control" placeholder="Informe uma senha de acesso para o usuário ...">
                                </br>
                                  
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
                            img{
                                width: 60px;
                            }
                            </style>
                            <?php
                                $this->table->set_heading("Foto", "Nome", "Alterar", "Excluir");
                                foreach($listapessoas as $pessoal){
                                    $nome= $pessoal->nome;
                                    
                                    $foto= $pessoal->foto;
                                    
                                    if($pessoal->foto == 1){
                                        $foto= img("assets/frontend/img/pessoal/".md5($pessoal->id).".jpg"); 
                                    }else{
                                        $foto= img("assets/frontend/img/semfoto.jpg");
                                    }
                                   

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

                                    $this->table->add_row($foto, $nome, $alterar, $excluir);

                                   

                                    
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