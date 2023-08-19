<p align=""><a href="https://www.linkedin.com/in/arturlimass/" target="__blank"><img src="https://media.licdn.com/dms/image/C4D03AQEgc2mZTf8DVg/profile-displayphoto-shrink_800_800/0/1645833592299?e=1697673600&v=beta&t=g8Qkc2JVN3KrORuTJueORbOP4kz_mipdpujw63GP-sU" width="250" alt="Artur Lima"></a></p>

## Sobre este projeto

Este projeto tem como objetivo um CRUD simples, utilizando o Laravel e JavaScript para realizar todo o processo.
Para rodar este projeto em sua máquina será necessário os seguintes pacotes:

- [PHP](https://www.apachefriends.org/pt_br/index.html).
- [MySQL](https://dev.mysql.com/downloads/mysql/).
- [Composer](https://getcomposer.org/download/).
- [Git](https://git-scm.com/downloads).

## Primeiro passo

Acesse o diretório em seu computador, abra o seu editor de texto ou o terminal do Git e digite o seguinte comando:

```git clone https://github.com/ArturLimaSS/praxis```

Ou você pode simplesmente baixar o arquivo em ZIP [clicando aqui](https://github.com/ArturLimaSS/praxis/archive/refs/heads/main.zip).

## Banco de Dados

Vamos configgurar o arquivo `.env`. Para isso, copie o arquivo .env.example e renomeie para apenas `.env`.
Dentro do arquivo, configure seu server local de acordo com o exemplo a seguir:

<pre>
DB_CONNECTION=mysql
DB_HOST=`Seu Host`
DB_PORT=3306
DB_DATABASE=prova_crud_simples
DB_USERNAME=root
DB_PASSWORD=`senha de acesso ao servidor/banco de dados`
</pre>

> #**Nota**\
> Este projeto tem como padrão o banco de dados **prova_crud_simples** e vamos criá-lo rodando o seguinte comando:

```php artisan migrate```

Após rodar o comando de migração, aparecerá em seu terminal a seguinte mensagem:

```
The database 'prova_crud_simples' does not exist on the 'mysql' connection.
Would you like to create it? (yes/no) [no]
```

Apenas digite `Yes` e tecle enter.

Após realizada todo este procedimento, o banco de dados estará criado com a sua estrutura pronta para receber os dados iniciais.

## Inserindo Dados Iniciais (seeders)

Para inserirmos os dados inciais, digite em seu terminal o seguinte comando:

```php artisan db:seed```
