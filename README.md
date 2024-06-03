# Projeto Integrador 2024/1
O backend do projeto está rodando separado aqui:
https://github.com/WatheusHenry/backendProjetoIntegrador2024-1

# Bem Vindos ao MVC-VUE

    Este projeto se baseia na mesma ideia do repositório "MVC", em que é apresentado
    uma estrutura que facilite a utilização de alguns componentes e o próprio uso
    da tecnologia (no caso o VUE com o Javascript e PHP)

# Apresentação do Projeto

    O Pet Pede Help surgiu da necessidade de oferecer às pessoas que perderam seus animais de estimação um local onde possam renovar suas esperanças de encontrar seus pets desaparecidos. Com o avanço das novas tecnologias e a crescente diversidade no mercado, o Pet Pede Help se destaca como uma plataforma inovadora e eficiente na busca desses animais perdidos.

# Tecnologia utilizadas
    Vue js, PHP, CSS, HTML, MySQL(O script do banco de dados está em um arquivo txt dentro da pasta 'VIEWS' -> 'BANCO_DE_DADOS' -> 'BANCO.TXT')

# Instalação do Projeto
    1 - Fazer a instalação do App XAMPP e rodar o BANCO DE DADOS (MySQL)
![img_xampp](https://github.com/drp014/projeto_integrador/assets/141743253/6879fbfb-1f64-4720-acef-53670fa59bd0)
        
    2 - Acessar a pasta do XAMPP
![acesso_xamp](https://github.com/drp014/projeto_integrador/assets/141743253/1a0d0e5e-c306-4000-af83-9b7ac12a389f)
    
    3 - Dentro do XAMPP acessar a pasta 'htdocs'
![acesso_htdocs](https://github.com/drp014/projeto_integrador/assets/141743253/cdfadf10-c041-46cc-9f63-61406a0ca42b)

    4 - Entrar na pasta projetoIntegrador2024-1 

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


