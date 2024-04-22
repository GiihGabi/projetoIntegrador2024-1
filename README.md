# Projeto Integrador 2024/1

## Backend

- Estrutura MVC simples
- armazenamento de imagens em buckets no MINIO
  (Para a criação do container executar: `docker run --name minio-local -p 2020:9000 -p 9001:9001 -v /mnt/data:/data minio/minio server /data --console-address ":9001"`
  arquivo de configuração localizado em: `config/minio/s3.php`
  
<br>

- Ao clonar repositorio:
    executar o comando: `Composer install`
    criação do banco de dados: entrar na pasta: `/config`
    alterar dados do arquivo `config.php` conforme o seu banco de dados local
    executar o comando: `php create_database.php`, para criação do banco e das tabelas

- Rotas:
    O sistema de todas está organizado na pasta: `routes`
    os arquivos são referentes as classes que são trabalhadas no sistema
    ao criar uma nova entidade de rotas, adiciona-lá ao arquivo `index.php`

-Controllers:
    Os controladores estão localizados na pasta: `controllers`
    serviços serão criados neles para organização do sistema
    somente consumirão dados da camada Model em contato com o banco de dados

-Models
    As models estão licalizadas na pasta: `models`
    arquivos que fazem contato direto com o banco de dados
    criação de funções para consulta e inserção de dados



## Para rodar a aplicação executar o comando: `php server.php`


