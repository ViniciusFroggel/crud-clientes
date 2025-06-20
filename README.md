
# 🚀 CRUD de Clientes - Hardness Sistemas

## 📋 Descrição

Este é um projeto desenvolvido como parte do teste prático para o processo seletivo da **Hardness Sistemas**, na vaga de **Estágio em Desenvolvimento**.  
O sistema permite realizar operações de **Cadastro, Listagem, Edição, Pesquisa e Exclusão** de clientes.

Desenvolvido com foco em:

- 🔒 Segurança
- 🖥️ Responsividade
- ⚙️ Boas práticas de programação
- 🎨 Experiência do Usuário (UX) e Interface (UI)

---

## 🛠️ Tecnologias Utilizadas

- 🐘 PHP 
- 🗄️ MySQL
- 🌐 HTML5
- 🎨 CSS3
- 🔥 JavaScript (interatividade e validações)
- ⚙️ XAMPP (Servidor Local)
- 💡 Git & GitHub (Versionamento)

---

## 🎯 Funcionalidades

- ✅ Cadastrar Clientes (Nome, Telefone, Endereço)
- ✅ Listar Clientes em tabela organizada
- ✅ Editar informações do Cliente
- ✅ Excluir Cliente com confirmação
- ✅ Filtro de Pesquisa na Listagem (Nome, Código, Telefone ou Endereço)
- ✅ Máscara no campo de telefone: `(XX) XXXXX-XXXX`
- ✅ Validação de telefone tanto no **Frontend (JS)** quanto no **Backend (PHP)**
- ✅ Animações suaves de abertura/fechamento da listagem (UX aprimorado)
- ✅ Segurança contra SQL Injection usando **Prepared Statements**
- ✅ Layout responsivo e agradável

---

## 🗂️ Estrutura de Pastas

```
/crud_clientes_hardness
│
├── assets
│   ├── css
│   │   └── style.css
│   └── js
│       └── script.js
│
├── includes
│   └── conexao.php
│
├── views
│   ├── create.php
│   ├── edit.php
│   └── index.php
│
├── database.sql
└── README.md
```

---

## 🏗️ Como Executar o Projeto

### 1️⃣ Pré-Requisitos

- Instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html) (ou similar)


---

### 2️⃣ Clone o Repositório

```bash
git clone https://github.com/seu-usuario/crud_clientes_hardness.git
```

---

### 3️⃣ Configure o Projeto

- Coloque a pasta dentro do diretório do XAMPP:

```
C:\xampp\htdocs\crud_clientes_hardness
```

---

### 4️⃣ Crie o Banco de Dados

- Acesse o **phpMyAdmin**:

```
http://localhost/phpmyadmin
```

- Crie o banco:

```sql
CREATE DATABASE crud_clientes;
```

- Importe o arquivo `database.sql` que está na raiz do projeto.

---

### 5️⃣ Configure o Arquivo de Conexão

Edite o arquivo `/includes/conexao.php`:

```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_clientes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
```

---

### 6️⃣ Execute o Sistema

Acesse no navegador:

```
http://localhost/crud_clientes_hardness/views/index.php
```

---

## 🔐 Validações e Segurança

- ✔️ Validação de telefone no **frontend** (JS) com máscara `(XX) XXXXX-XXXX`
- ✔️ Validação no **backend** para impedir dados inválidos
- ✔️ Uso de **Prepared Statements** para evitar SQL Injection

---

## 🎨 UX/UI

- Design limpo e responsivo
- Layout com foco em facilidade de navegação
- Animações suaves na exibição da listagem

---

## 🔍 Prints do Projeto

![image](https://github.com/user-attachments/assets/ff5b7b36-0d80-4216-a74b-07f3398a2a3a)

![image](https://github.com/user-attachments/assets/920989b6-7dc6-47fc-adf1-f039c4795349)



---

## 👨‍💻 Autor

Desenvolvido por **Vinicius André Froggel de Miranda** 
 
🚀 LinkedIn: https://www.linkedin.com/in/viniciusfroggel/ 

📧 Email: Viniciusmiranda2003@Outlook.com

---


