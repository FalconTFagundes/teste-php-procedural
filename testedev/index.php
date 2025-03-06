<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    #Incluíndo arquivos de conexão do banco de daods
    include_once './config/constantes.php';
    include_once './config/conexao.php';
    include_once './func/functions.php';
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>

    <!-- CSS-->
    <link rel="stylesheet" href="css/style.css">

    <!-- Ícones-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap 5.3 CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="card container rounded-3 p-3">
        <div class="card-header rounded-3 text-center text-white bg-dark fs-3">
            Gerenciamento de Tarefas
        </div>

        <div class="card-body text-center">

            <!-- inicio tabela de gerenciamento -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Tarefa</th>
                        <th scope="col">Status</th>
                        <th scope="col">Cadastro</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $retornoListarTarefas = listarGeral('idtarefas, titulo, status, cadastro', 'tarefas');
                    if (is_array($retornoListarTarefas) and !empty($retornoListarTarefas)) {
                        foreach ($retornoListarTarefas as $itemTarefa) {
                            $codigoTarefa = $itemTarefa['idtarefas'];
                            $tituloTarefa = $itemTarefa['titulo'];
                            $statusTarefa = $itemTarefa['status'];
                            $dataCadastro = $itemTarefa['cadastro'];
                            $dataCadastroFormatada = formatarDataHoraBr($dataCadastro); //passando para br pois será exibida

                            // definir a classe e o ícone conforme o status
                            $statusClass = ($statusTarefa == 'Concluída') ? 'alert-success' : 'alert-primary';
                            $statusIcon = ($statusTarefa == 'Concluída') ? '<i class="bx bx-check"></i>' : '<i class="bx bx-alarm"></i>';

                            // definir o texto e a ação do botão de acordo com o status
                            if ($statusTarefa == 'Concluída') {
                                $btnClass = 'btn-warning';
                                $btnText = '<i class="bx bx-undo"></i> Reverter';
                                $btnOnClick = 'reverterConcluida(' . $codigoTarefa . ')';
                            } else {
                                $btnClass = 'btn-success';
                                $btnText = '<i class="bx bx-check"></i> Concluir';
                                $btnOnClick = 'marcarConcluida(' . $codigoTarefa . ')';
                            }
                    ?>
                            <tr id="tarefa-<?php echo $codigoTarefa; ?>">
                                <td><?php echo $codigoTarefa; ?></td>
                                <td><?php echo $tituloTarefa; ?></td>
                                <td>
                                    <div class="alert p-0 <?php echo $statusClass; ?>" id="status-<?php echo $codigoTarefa; ?>">
                                        <?php echo $statusIcon; ?> <?php echo $statusTarefa; ?>
                                    </div>
                                </td>
                                <td><?php echo $dataCadastroFormatada; ?></td>
                                <td>
                                    <button type="button" id="btnConcluir-<?php echo $codigoTarefa; ?>" onclick="<?php echo $btnOnClick; ?>" class="btn btn-sm <?php echo $btnClass; ?>">
                                        <?php echo $btnText; ?>
                                    </button>
                                    <button type="button" onclick="excGeral(<?php echo $codigoTarefa; ?>, 'excluirTarefa')" class="btn btn-sm btn-danger">
                                        <i class='bx bxs-trash-alt'></i> Excluir
                                    </button>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>

            </table>
            <!-- final tabela de gerenciamento -->
        </div>

        <!--btn cadastramento-->
        <div class="conainer p-1">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCadastrarTarefa"><i class='bx bx-bookmarks'></i> Adicionar</button>
        </div>

    </div>

    <!-- modal de cadastramento novas tarefas-->
    <div class="modal fade" id="modalCadastrarTarefa" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastrar Tarefa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- FOrm de cadastro -->
                    <form id="formCadastrarTarefa" name="formCadastrarTarefa" method="POST" action="#">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="tituloTarefa" id="tituloTarefa" placeholder="Digite o título da tarefa">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class='bx bx-x-circle'></i> Cancelar</button>
                            <button type="submit" class="btn btn-warning" id="btnCadastrarTarefa" onclick="cadGeral('formCadastrarTarefa','modalCadastrarTarefa','cadastrarTarefa')"><i class='bx bx-add-to-queue'></i> Cadastrar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    </div>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- JS -->
    <script src="./js/index.js"></script>

    <!-- Bootstrap 5.3 JS e Popper.js-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


</body>

</html>