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
                                foreach ($listafotos as $foto){
                                echo form_open_multipart('admin/upload_fotos/salvar_alteracoes');
                            ?>
                            <div class="form-group">
                                <label id="txt-nome">Nome</label>
                                <input type="text" id="txt-nome" name="txt-nome" class="form-control" placeholder="Informe um nome para a fotografia ..." value="<?php echo $foto->nome ?>">
                                    
                                <hr>
                                <label id="txt-id_galeria">Categoria </label>
                                </br>
                                <div class="col-lg-6">
                                    <h4> Galerias: </h4>   
                                    <select id="txt-id_galeria" name="txt-id_galeria">
                                        <?php foreach($listagalerias as $galeria){ ?>
                                          
                                        <option value="<?php echo $galeria->id ?>" <?php if($foto->id_galeria == $galeria->id){ echo "selected";} ?> ><?php echo $galeria->nome; ?></option>
                                        <?php } ?>
                                        <option value="0" <?php if($foto->id_galeria == "0"){ echo "selected";} ?> >---</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <h4> Produções: </h4>   
                                    <select id="txt-id_producao" name="txt-id_producao">
                                        <?php foreach($listaproducoes as $producao){ ?>
                                            <option value="<?php echo $producao->id ?>" <?php if($foto->id_producao == $galeria->id){echo "selected";} ?> ><?php echo $galeria->nome; ?></option>
                                        <?php } ?>
                                        <option value="0" <?php if($foto->id_producao == "0"){ echo "selected";} ?> >---</option>
                                    </select>
                                </div>
                                </br>                
                                <hr>
                                </br>                                    
                                </br>                                    
                            </div>            
                            <input type="hidden" name="txt-id" id="txt-id" value="<?php echo $foto->id ?>">
                            <button type="submit" class="btn btn-success">Atualizar</button>
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
                        <div class="col-lg-8 col-lg-offset-1">
                            <?php 
                                if($foto->imagem == 1){
                                    echo img("assets/frontend/img/fotos/".md5($foto->id).".jpg"); 
                                }else{
                                    echo img("assets/frontend/img/semfoto.jpg");
                                }

                            ?>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                $divopen= '<div class="form-group">';
                                $divclose= '</div>';
                                echo form_open_multipart('admin/upload_fotos/nova_foto');
                                echo form_hidden('id', md5($foto->id));
                                echo $divopen;
                                $imagem= array('name' => 'userfile', 'id' => 'userfile', 'class' => 'form-control');
                                echo form_upload($imagem);
                                echo $divclose;
                                echo $divopen;
                                $botao= array('name' => 'btn_adicionar', 'id' => 'btn_adicionar', 'class' => 'btn btn_default',
                                    'value' => 'Adicionar nova Imagem');
                                echo form_submit($botao);
                                echo $divclose;
                                echo form_close();
                            }
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
