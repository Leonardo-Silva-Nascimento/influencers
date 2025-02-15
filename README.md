🛠 1. Requisitos

Antes de tudo, a pessoa precisa ter instalado:✅ Docker + Docker Compose✅ npm✅ (opcional, mas facilita os comandos)

📦 2. Criar o Arquivo .env

O projeto já tem um .env.example, basta copiá-lo:

cp .env.example .env

Depois, deve verificar se as configurações do banco de dados e JWT estão corretas no .env:

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=root
DB_PASSWORD=root

JWT_SECRET=

🔹 Obs: O JWT_SECRET será gerado depois.

🐳 3. Subir os Containers Docker

Se o projeto já está dockerizado com Docker Compose, basta rodar:

docker-compose up -d

Isso irá criar os containers do Laravel + MySQL + Nginx.

🔧 4. Acessar o Container do Laravel

docker exec -it nome_do_container bash

Para descobrir o nome do container:

docker ps

⚙ 5. Instalar Dependências do Laravel

Dentro do container:

composer install

Se der erro de permissões, pode rodar:

chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

🔑 6. Gerar a Chave da Aplicação

php artisan key:generate

🔑 7. Configurar o JWT

Gerar a chave secreta do JWT:

php artisan jwt:secret

📂 8. Rodar as Migrations e Seeders

php artisan migrate --seed

Se o banco já existir, pode rodar:

php artisan migrate:fresh --seed

Isso recria todas as tabelas do banco.

🚀 9. Testar se o Projeto Está Rodando

Executar o seguinte comando fora do container:

npm run dev

Agora é só acessar:

http://localhost:8000
