# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala extensões necessárias para MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia todos os arquivos do projeto para o servidor
COPY . /var/www/html/

# Ajusta permissões (importante para evitar erro 403)
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta padrão do Apache
EXPOSE 80

# Inicia o servidor Apache
CMD ["apache2-foreground"]