// =========================
// Slide da Lista de Clientes
// =========================

function toggleLista() {
    const lista = document.getElementById('lista-clientes');

    if (lista.style.display === 'block' || lista.style.maxHeight) {
        slideUp(lista);
        localStorage.setItem('listaAberta', 'false');
    } else {
        slideDown(lista);
        localStorage.setItem('listaAberta', 'true');
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
// Estado da lista ao carregar
// =========================

document.addEventListener('DOMContentLoaded', () => {
    const listaEstaAberta = localStorage.getItem('listaAberta');
    const lista = document.getElementById('lista-clientes');

    if (lista) {
        if (listaEstaAberta === 'true') {
            lista.style.display = 'block';
        } else {
            lista.style.display = 'none';
        }
    }
});

// =========================
// Confirmação ao excluir
// =========================

function confirmarExclusao() {
    return confirm("Tem certeza que deseja excluir este cliente?");
}

// =========================
// Máscara de telefone e validação
// =========================

document.addEventListener('DOMContentLoaded', function() {
    const telefoneInput = document.getElementById('telefone');

    if (telefoneInput) {
        telefoneInput.addEventListener('input', function(e) {
            let valor = this.value.replace(/\D/g, '');

            // Limitar exatamente 11 números
            if (valor.length > 11) {
                valor = valor.substring(0, 11);
            }

            // Aplicar máscara
            if (valor.length <= 10) {
                valor = valor.replace(/^(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
            } else {
                valor = valor.replace(/^(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
            }

            this.value = valor.trim();

            // Alerta se tentar digitar letra
            if (e.inputType === 'insertText' && /\D/.test(e.data)) {
                alert('Digite apenas números no campo telefone!');
            }
        });
    }
});

// =========================
// Filtro de Pesquisa na Tabela
// =========================

document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('pesquisa');

    if (input) {
        input.addEventListener('input', function() {
            const filtro = input.value.toLowerCase();
            const linhas = document.querySelectorAll('tbody tr');

            linhas.forEach(linha => {
                const textoLinha = linha.textContent.toLowerCase();
                if (textoLinha.includes(filtro)) {
                    linha.style.display = '';
                } else {
                    linha.style.display = 'none';
                }
            });
        });
    }
});
