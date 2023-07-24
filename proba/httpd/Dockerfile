# WordPress konténer
FROM wordpress

# Webszerver fájlok másolása
COPY httpd-files/ /var/www/html

# Szükséges csomagok telepítése
RUN apt update && apt install -y nano curl \
  && useradd -ms /bin/bash -u 1000 --user-group user \
  && docker-php-ext-install mysqli \
  && sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf \
  && apachectl graceful

# Adatbázis elérési adatainak beállítása környezeti változókként
ENV DB_NAME messages
ENV DB_USER wordpress
ENV DB_PASSWORD wordpress
ENV DB_HOST localhost

# Webszerver konténer indítása a 1000-es felhasználóval
USER 1000

# Webszerver konténer alapértelmezett parancsa
CMD apache2-foreground

