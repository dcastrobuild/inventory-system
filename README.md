# 📦 Inventory System

Sistema web de gerenciamento de estoque desenvolvido com PHP, MariaDB e Bootstrap. Permite o controle completo de produtos em um almoxarifado, com autenticação de usuários e interface responsiva.

---

## 🚀 Funcionalidades

- ✅ Autenticação de usuários (login e senha com sessão PHP)
- ✅ Cadastro, edição e exclusão de produtos
- ✅ Controle de quantidade em estoque
- ✅ Interface responsiva com Bootstrap
- ✅ Persistência de dados com banco relacional (MariaDB/MySQL)

---

## 🛠️ Tecnologias Utilizadas

| Tecnologia | Uso |
|---|---|
| PHP | Back-end e lógica de negócio |
| MariaDB / MySQL | Banco de dados relacional |
| Bootstrap 5 | Estilização e responsividade |
| HTML5 / CSS3 | Estrutura e layout |
| Apache (XAMPP) | Servidor local de desenvolvimento |

---

## 📁 Estrutura do Projeto

```
inventory-system/
├── index.php              # Página inicial / redirecionamento
├── login.php              # Tela de autenticação
├── dashboard.php          # Painel principal após login
├── produtos/
│   ├── listar.php         # Listagem de produtos
│   ├── cadastrar.php      # Formulário de cadastro
│   └── editar.php         # Formulário de edição
├── includes/
│   ├── db.php             # Conexão com banco de dados
│   ├── auth.php           # Verificação de sessão
│   └── header.php         # Cabeçalho reutilizável
├── assets/
│   ├── css/               # Estilos personalizados
│   └── js/                # Scripts
└── database/
    └── schema.sql         # Script de criação do banco
```

> ⚠️ Adapte a estrutura acima conforme a organização real do seu projeto.

---

## ⚙️ Como Rodar Localmente

### Pré-requisitos

- [XAMPP](https://www.apachefriends.org/) (ou qualquer servidor com PHP 7.4+ e MySQL/MariaDB)
- Navegador moderno

### Passo a passo

**1. Clone o repositório**
```bash
git clone https://github.com/dcastrobuild/inventory-system.git
```

**2. Mova a pasta para o diretório do servidor**
```
# No XAMPP:
Copie a pasta para: C:/xampp/htdocs/inventory-system
```

**3. Importe o banco de dados**
- Abra o phpMyAdmin: `http://localhost/phpmyadmin`
- Crie um banco chamado `inventory_db`
- Importe o arquivo `database/schema.sql`

**4. Configure a conexão**

Edite o arquivo `includes/db.php` com suas credenciais:
```php
$host     = 'localhost';
$dbname   = 'inventory_db';
$user     = 'root';
$password = ''; // sua senha do MySQL
```

**5. Acesse no navegador**
```
http://localhost/inventory-system
```

---

## 🔐 Credenciais de Acesso (ambiente de teste)

| Campo | Valor |
|---|---|
| Usuário | `admin` |
| Senha | `admin123` |

> ⚠️ Altere as credenciais antes de usar em produção.

---

## 📌 Melhorias Futuras

- [ ] Relatórios de movimentação de estoque
- [ ] Controle de categorias de produtos
- [ ] Sistema de alertas para estoque mínimo
- [ ] API REST para integração com outros sistemas

---

## 👤 Autor

**Rafael D' Castro**  
[LinkedIn](https://www.linkedin.com/in/rafael-dcastro-full) · [GitHub](https://github.com/dcastrobuild)

---

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
