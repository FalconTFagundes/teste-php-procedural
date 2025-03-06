<h1>📝 Sistema de Gerenciamento de Tarefas</h1>

<h3>📌 Sobre o Projeto</h3>
Este é um sistema simples para gerenciamento de tarefas, permitindo cadastrar, excluir e marcar tarefas como concluídas. Feito em PHP Procedural e utilizando MySQL para armazenamento dos dados.

<!-- tecnologias utilizadas  -->
<h2 align="justify">Tecnologias Utilizadas</h2>

<div align="Justify">
  
  [![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/pt-BR/docs/Web/HTML)
  [![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://www.lojadetemas.com.br/css3/#:~:text=CSS3%20%C3%A9%20a%20terceira%20mais,Temas%20loja%20Integrada%20e%20o)
  [![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
  [![Javascript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)]([https://www.linkedin.com/in/rafael-fagundes-518974258/](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript))
  [![jQuery](https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white)](https://jquery.com/)
  [![Github](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/)
  [![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
  [![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
</div>


### ⚙️ Requisitos
<p>Antes de iniciar, certifique-se de ter os seguintes requisitos instalados:</p>

* PHP (versão compatível com o projeto)
* MySQL ou MariaDB
* Servidor Apache/Nginx (ou utilizar o servidor embutido do PHP)

## 🔧 Instalação:
Clone este repositório:
```
git clone https://github.com/FalconTFagundes/teste-php-procedural.git
```
Acesse a pasta do projeto:
```
cd teste-php-procedural
```
Configure o banco de dados conforme as instruções abaixo. Se necessário, ajuste as credenciais do banco no arquivo ``` testedev/config/conexao.php. ```

## 🗄️ Configuração do banco de dados:
Acesse o MySQL e crie um banco de dados:
```
CREATE DATABASE db_tarefas;
```
Importe o arquivo SQL localizado na pasta ```dbdoteste/:```
```
mysql -u usuario -p db_tarefas < dbdoteste/db_tarefas.sql
```

Certifique-se de que as credenciais no arquivo ```testedev/config/conexao.php``` estão corretas.

## 🛎️ Executando o Sistema:
```
php -S localhost:8000 -t testedev/
```
Ou configure um host virtual no Apache/Nginx. <br>
Acesse no navegador: http://localhost:8000

## 📁 Estrutura do Projeto
```
teste-php-procedural/
│── dbdoteste/  # Banco de dados
│   ├── db_tarefas.sql
│── testedev/  # Código-fonte
│   ├── index.php  # Página inicial
│   ├── config/  # Configurações do sistema
│   ├── func/  # Funções auxiliares
│   ├── css/  # Arquivos de estilo
│   ├── js/  # Scripts JavaScript
```

## 🛠 Como Contribuir

* Faça um fork do projeto.
* Crie uma branch para sua feature (git checkout -b minha-feature).
* Commit suas mudanças (git commit -m 'Adiciona nova feature').
* Faça o push para a sua branch (git push origin minha-feature).
* Abra um Pull Request.

![bannerLinkedin](https://github.com/user-attachments/assets/865640e2-8516-476a-bd2e-91e5dc9d8122)


## 📩 Contato

📧[Email](mailto:rafaelfagundes762@gmail.com)  
🔗[LinkedIn](https://www.linkedin.com/in/rafael-fagundes-518974258/)
