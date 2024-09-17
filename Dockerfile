# Pega a imagem do PHP versão 8.2 com FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Define o nome do usuário e o UID (ID do usuário)
ARG user=newton
ARG uid=1000

# Atualiza o sistema e instala algumas ferramentas e bibliotecas que a gente vai precisar
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev

# Instala as extensões do PHP que a gente vai usar no projeto
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Copia o Composer (gerenciador de dependências do PHP) direto da imagem oficial dele
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cria um novo usuário e adiciona ele aos grupos www-data e root
RUN useradd -G www-data,root -u $uid -d /home/$user $user

# Cria a pasta .composer na home do usuário e ajusta as permissões
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Define a pasta de trabalho do contêiner
WORKDIR /var/www

# Copia o arquivo de configuração customizado do PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Muda pro usuário que a gente criou pra rodar o resto das coisas
USER $user
