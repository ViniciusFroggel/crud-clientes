// =========================
// Slide da Lista de Clientes
// =========================

function toggleLista() {
    const lista = document.getElementById('lista-clientes');

    if (lista.style.display === 'block' || lista.style.maxHeight) {
        slideUp(lista);
    } else {
        slideDown(lista);
    }
}

function slideDown(element) {
    element.style.display = 'block';
    element.style.maxHeight = '0px';
    element.style.overflow = 'hidden';

    const height = element.scrollHeight;
    element.style.transition = 'max-height 0.5s ease-out';

    requestAnimationFrame(() => {
        element.style.maxHeight = height + 'px';
    });

    element.addEventListener('transitionend', function handler() {
        element.style.maxHeight = '';
        element.style.overflow = '';
        element.removeEventListener('transitionend', handler);
    });
}

function slideUp(element) {
    element.style.overflow = 'hidden';
    element.style.maxHeight = element.scrollHeight + 'px';

    requestAnimationFrame(() => {
        element.style.transition = 'max-height 0.5s ease-out';
        element.style.maxHeight = '0';
    });

    element.addEventListener('transitionend', function handler() {
        element.style.display = 'none';
        element.style.maxHeight = '';
        element.style.overflow = '';
        element.removeEventListener('transitionend', handler);
    });
}

// =========================
// Confirmação de Exclusão
// =========================

function confirmarExclusao() {
    return confirm("Tem certeza que deseja excluir este cliente?");
}

// =========================
// Validação e Máscara de Telefone
// =========================

document.addEventListener('DOMContentLoaded', () => {
    const telefoneInput = document.getElementById('telefone');

    if (telefoneInput) {
        telefoneInput.addEventListener('input', () => {
            const valorAntigo = telefoneInput.value;
            const apenasNumeros = valorAntigo.replace(/\D/g, '');

            if (valorAntigo !== apenasNumeros && valorAntigo !== '') {
                exibirErroTelefone('Somente números são permitidos no telefone!');
            } else {
                removerErroTelefone();
            }

            aplicarMascaraTelefone(telefoneInput);
        });
    }
});

function aplicarMascaraTelefone(input) {
    let valor = input.value.replace(/\D/g, '');

    if (valor.length > 11) {
        valor = valor.substring(0, 11);
    }

    if (valor.length <= 10) {
        valor = valor.replace(/^(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
    } else {
        valor = valor.replace(/^(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
    }

    input.value = valor.trim();
}

// =========================
// Mensagem de Erro Telefone
// =========================

function exibirErroTelefone(mensagem) {
    let erro = document.getElementById('erro-telefone');
    if (!erro) {
        erro = document.createElement('div');
        erro.id = 'erro-telefone';
        erro.style.color = 'red';
        erro.style.fontSize = '13px';
        erro.style.marginTop = '4px';
        const telefoneInput = document.getElementById('telefone');
        telefoneInput.parentNode.appendChild(erro);
    }
    erro.textContent = mensagem;
}

function removerErroTelefone() {
    const erro = document.getElementById('erro-telefone');
    if (erro) {
        erro.remove();
    }
}
