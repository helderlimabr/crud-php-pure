# CRUD usando PHP Puro com Doctrine

### 🔧 Configuração

No diretório do projeto, executar o comando:
```
composer install
```
Renomeie o arquivo .env_exemplo para .env e informe os dados de conexão com o banco de dados.

Após configurar a conexão com o banco de dados, rode o seguinte comando na raiz do projeto:
```
php vendor/bin/doctrine orm:schema-tool:create
```
Esse comando criará a tabela Clientes.

## 📦 Desenvolvimento

* Projeto desenvolvido buscando implementar as [PSRs - PHP Standards Recommendations](https://www.php-fig.org/psr/)

* [Doctrine ORM](https://www.doctrine-project.org/)
* Pattern MVC

---
Desenvolvido com ❤️ por Helder Lima 🤓