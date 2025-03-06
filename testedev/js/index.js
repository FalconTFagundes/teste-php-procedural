function excGeral(idvar, acaopage) {
    var confirmar = confirm("Tem certeza que deseja excluir este item?");

    if (confirmar) {
        var dados = {
            acao: acaopage,
            id: idvar
        };

        $.ajax({
            type: 'POST',
            dataType: 'HTML',
            url: 'controle.php',
            data: dados,
            success: function () {
                alert("Item excluído com sucesso!");  
                window.location.reload();  
            },
            error: function () {
                alert("Não foi possível excluir o item. Tente novamente!");  
            }
        });
    }
}

function cadGeral(formId, modalId, pageAcao) {
    $('#' + formId).on('submit', function (k) {
        k.preventDefault();

        var formdata = $(this).serializeArray();
        formdata.push({ name: "acao", value: pageAcao });

        $.ajax({
            type: "POST",
            dataType: 'html',
            url: 'controle.php',
            data: formdata,
            success: function (retorno) {
                console.log("Resposta do servidor:", retorno);
                console.log("Dados enviados:", formdata);

                $('#' + modalId).modal('hide'); 
                alert('Cadastro realizado com sucesso!');
                window.location.reload();
            }
        });
    });
}

function marcarConcluida(codigoTarefa) {
    var statusElement = document.getElementById('status-' + codigoTarefa);

    if (statusElement) { 
        statusElement.innerHTML = '<i class="bx bx-check"></i> Concluída';
        statusElement.classList.remove('alert-primary'); 
        statusElement.classList.add('alert-success');  
    } else {
        console.error('Não foi possível encontrar o status da tarefa!');
    }

    var btnConcluir = document.getElementById('btnConcluir-' + codigoTarefa);

    if (btnConcluir) {
        btnConcluir.innerHTML = '<i class="bx bx-undo"></i> Reverter';
        btnConcluir.classList.remove('btn-success');
        btnConcluir.classList.add('btn-warning');
        btnConcluir.setAttribute('onclick', 'reverterConcluida(' + codigoTarefa + ')');
    } else {
        console.error('Botão de conclusão não encontrado!');
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'controle.php',
        data: {
            acao: 'concluirTarefa',
            idTarefa: codigoTarefa
        },
        success: function (response) {
            if (response.status === 'sucesso') {
                console.log('Tarefa concluída com sucesso!');
            } else {
                console.error('Falha ao atualizar o status da tarefa.');
            }
        },
        error: function () {
            console.error('Erro na comunicação com o servidor.');
        }
    });
}

function reverterConcluida(codigoTarefa) {
    var statusElement = document.getElementById('status-' + codigoTarefa);
    var btnConcluir = document.getElementById('btnConcluir-' + codigoTarefa);

    if (statusElement && btnConcluir) {
        statusElement.innerHTML = '<i class="bx bx-alarm"></i> Pendente';
        statusElement.classList.remove('alert-success');
        statusElement.classList.add('alert-primary');

        btnConcluir.innerHTML = '<i class="bx bx-check"></i> Concluir';
        btnConcluir.classList.remove('btn-warning');
        btnConcluir.classList.add('btn-success');
        btnConcluir.setAttribute('onclick', 'marcarConcluida(' + codigoTarefa + ')');
        
        var dados = {
            acao: 'reverterConcluida',
            idTarefa: codigoTarefa
        };

        $.ajax({
            type: 'POST',
            url: 'controle.php',
            data: dados,
            success: function (response) {
                var result = JSON.parse(response);
                if (result.status === 'sucesso') {
                    console.log('Status da tarefa revertido com sucesso!');
                } else {
                    console.error('Erro ao reverter o status da tarefa.');
                }
            },
            error: function () {
                alert("Não foi possível reverter a tarefa. Tente novamente!");
            }
        });
    } else {
        console.error('Elementos necessários para reverter a tarefa não foram encontrados!');
    }
}
