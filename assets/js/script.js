document.addEventListener('DOMContentLoaded', function() {
    const telefone = document.querySelector('input[name="telefone"]');

    if (telefone) {
        telefone.addEventListener('input', function() {
            let valor = this.value.replace(/\D/g, ''); // Remove tudo que não for número

            // Limitar a quantidade máxima (2 DDD + 9 números)
            if (valor.length > 11) valor = valor.slice(0, 11);

            // Formatação
            if (valor.length <= 2) {
                valor = `(${valor}`;
            } else if (valor.length <= 6) {
                valor = `(${valor.slice(0, 2)}) ${valor.slice(2)}`;
            } else if (valor.length <= 10) {
                valor = `(${valor.slice(0, 2)}) ${valor.slice(2, 6)}-${valor.slice(6)}`;
            } else {
                valor = `(${valor.slice(0, 2)}) ${valor.slice(2, 7)}-${valor.slice(7)}`;
            }

            this.value = valor;
        });
    }
});

// Validação dos campos antes de enviar o formulário
function validarFormulario() {
    const nome = document.forms["formCliente"]["nome"].value.trim();
    const telefone = document.forms["formCliente"]["telefone"].value.trim();
    const endereco = document.forms["formCliente"]["endereco"].value.trim();

    if (nome === "" || telefone === "" || endereco === "") {
        alert("Por favor, preencha todos os campos antes de enviar.");
        return false;
    }

    // Remove caracteres não numéricos
    const telefoneNumeros = telefone.replace(/\D/g, '');

    // Checa se tem um telefone válido (10 ou 11 dígitos)
    if (telefoneNumeros.length < 10 || telefoneNumeros.length > 11) {
        alert("Digite um número de telefone válido com DDD.");
        return false;
    }

    return true;
}

// Confirmação de exclusão
function confirmarExclusao() {
    return confirm("Você tem certeza que deseja excluir este cliente?");
}
