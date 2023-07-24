# MariaDB konténer
FROM mariadb:latest

# Környezeti változók beállítása
ENV MYSQL_DATABASE=messages
ENV MYSQL_USER=wordpress
ENV MYSQL_PASSWORD=wordpress

# Adatbázis inicializálása
COPY init.sql /docker-entrypoint-initdb.d/

