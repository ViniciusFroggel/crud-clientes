# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala PDO e PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && apt-get install -y iputils-ping

# Copia todos os arquivos do projeto para o servidor
COPY . /var/www/html/

# Ajusta permissões (importante para evitar erro 403)
RUN chmod -R 755 /var/www/html

# Expondo a porta padrão do Apache
EXPOSE 80

# Inicia o servidor Apache
CMD ["apache2-foreground"]
