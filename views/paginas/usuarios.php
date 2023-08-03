<div class="content-wrapper" style="min-height: 717px;">
    <section class="content-header">
        <div class="content-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrador Usuário</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <button type="button" class="btn btn-success criar-perfil" data-toggle="modal" data-target="#modal-criar-usuarios">
                                Criar Novo Usuário
                            </button><br>
                        </div><br>
                        <div class="card-body">
                            <table class="table table-bordered table-striped dt-responsive tabelaperfil" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">#</th>
                                        <th>Nome</th>
                                        <th>Usuário</th>
                                        <th>Foto</th>
                                        <th>Nível</th>
                                        <th>Acções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php ?>
                                    <?php foreach ($usuarios as $key => $value) {

                                    ?>

                                        <tr>
                                            <td><?php echo ($key + 1); ?></td>
                                            <td><?php echo $value["nome"] ?></td>
                                            <td><?php echo $value["usuario"] ?></td>
                                            <td><?php echo $value["foto"] ?></td>
                                            <td><?php echo $value["nivel"] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-warning btn-sm">
                                                        <i class="fas fa-pencil-alt text-white"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal modal-default fade" id="modal-criar-usuarios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible">Adicionar Novo Usuário</h4>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nome_usuarios" placeholder="Nome" id="">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nome_user" placeholder="Usuário" id="">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="password" class="form-control" name="pass_user" placeholder="Senha" id="">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fas fa-paperclip"></i>Ajustar imagem de usuarios
                        <input type="file" name="subirImgusuarios">
                    </div>
                    <img class="previsualizarImgusuarios img-fluid py-2" width="200" height="200" alt="">
                    <p class="help-block small">Dimensões: 480px * 382px | Tamanho Máx: 2MB | Formato: JPG ou PNG</p>
                </div>
                <div class="form-group has-feedback">
                    <label>Nível</label>
                    <select class="form-control" name="nivel_user" required>
                        <option value="1">admin</option>
                        <option value="2">vendedor</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

                <?php
                    $guardarUsuario = new ctrUsuarios();
                    $guardarUsuario->ctrGuardarUsuarios();
                ?>
            </form>
        </div>
    </div>
</div>