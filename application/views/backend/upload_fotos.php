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
                                echo form_open('admin/upload_fotos/inserir');
                            ?>
                            <div class="form-group">
                                <label id="txt-nome">Nome</label>
                                <input type="text" id="txt-nome" name="txt-nome" class="form-control" placeholder="Informe um nome para a fotografia ...">
                                    
                                <hr>
                                <label id="txt-id_galeria">Categoria </label>
                                </br>
                                <div class="col-lg-6">
                                    <h4> Galerias: </h4>   
                                    <select id="txt-id_galeria" name="txt-id_galeria">
                                        <?php foreach($listagalerias as $galeria){ ?>
                                            <option value="<?php echo $galeria->id ?>"><?php echo $galeria->nome?></option> 
                                        <?php } ?>
                                        <option value="0">---</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <h4> Produções: </h4>   
                                    <select id="txt-id_producao" name="txt-id_producao">
                                        <?php foreach($listaproducoes as $producao){ ?>
                                            <option value="<?php echo $producao->id ?>"><?php echo $producao->nome?></option> 
                                        <?php } ?>
                                        <option value="0">---</option>
                                    </select>
                                </div>
                                </br>               
                                <hr>
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
                                foreach($listafotos as $foto){
                                    $nomefoto= $foto->nome;
                                    
                                    if($foto->imagem == 1){
                                        $imagem= img("assets/frontend/img/fotos/".md5($foto->id).".jpg"); 
                                    }else{
                                        $imagem= img("assets/frontend/img/semfoto.jpg");
                                    }

                                    $alterar= anchor(base_url('admin/upload_fotos/alterar/'.md5($foto->id)), '<i class="fa fa-refresh fa-fw"></i> Alterar');

                                    $excluir= '<button type="button" class="btn btn-link" data-toggle="modal" data-target=".excluir-modal-'.$foto->id.'"><span style="color:red"><i class="fa fa-remove fa-fw"></i> Excluir</span></button>';
                                    echo $modal= ' <div class="modal fade excluir-modal-'.$foto->id.'" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel2">Exclusão de projeto</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Deseja Realmente excluir a foto '.$foto->nome.'?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <a type="button" class="btn btn-primary" href="'.base_url("admin/upload_fotos/excluir/".md5($foto->id)).'">Excluir</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>';

                                    $this->table->add_row($imagem, $nomefoto, $alterar, $excluir);
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
