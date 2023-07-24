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
ENV DB_NAME mydatabase
ENV DB_USER myuser
ENV DB_PASSWORD mypassword
ENV DB_HOST 10.244.0.10

# Webszerver konténer indítása a 1000-es felhasználóval
USER 1000

# Webszerver konténer alapértelmezett parancsa
CMD apache2-foreground

