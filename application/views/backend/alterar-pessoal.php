
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
                                foreach ($listapessoas as $pessoal){
                                echo form_open_multipart('admin/pessoal/salvar_alteracoes');
                            ?>

                             <div class="form-group">
                                <label id="txt-nome">Nome</label>
                                    <input type="text" id="txt-nome" name="txt-nome" class="form-control" placeholder="Informe o nome..." value="<?php echo $pessoal->nome ?>">
                                </br>
                                <label id="txt-cargo">Cargo</label>
                                    <input type="text" id="txt-cargo" name="txt-cargo" class="form-control" placeholder="Informe o cargo atual..." value="<?php echo $pessoal->cargo ?>">
                                </br>
                                <label id="txt-lattes">Lattes</label>
                                    <input type="text" name="txt-lattes" class="form-control" placeholder="Entre com a URL para o lattes..." value="<?php echo $pessoal->lattes ?>">
                                </br>
                                </br>
                                <label id="txt-tipo">Função</label>
                                <select id="txt-tipo" name="txt-tipo">
                                        <option value="administrador" <?php if($pessoal->tipo == "administrador"){ echo "selected";} ?> >Administrador(a)</option>
                                        <option value="auxiliar" <?php if($pessoal->tipo == "auxiliar"){ echo "selected";} ?> >Auxiliar</option>
                                </select>
                                </br>
                                </br>
                                 <label id="txt-user">User</label>
                                    <input type="text" id="txt-user" name="txt-user" class="form-control" placeholder="Informe o username ..." value="<?php echo $pessoal->user ?>">
                                </br>
                                <label id="txt-senha">Senha</label>
                                    <input type="password" id="txt-senha" name="txt-senha" class="form-control" placeholder="Informe uma senha de acesso para o usuário ..." value="<?php echo $pessoal->senha ?>">
                                </br>
                                               
                                <hr>
                                </br>                                    
                                </br>                                    
                            </div>            
                            <input type="hidden" name="txt-id" id="txt-id" value="<?php echo $pessoal->id ?>">
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
                                if($pessoal->foto == 1){
                                    echo img("assets/frontend/img/pessoas/".md5($pessoal->id).".jpg"); 
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
                                echo form_open_multipart('admin/pessoal/nova_foto');
                                echo form_hidden('id', md5($pessoal->id));
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
