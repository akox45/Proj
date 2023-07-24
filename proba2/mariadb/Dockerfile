# MariaDB Dockerfile
FROM mariadb:latest

# Környezeti változók beállítása
ENV MYSQL_ROOT_PASSWORD=rootpassword 
ENV MYSQL_DATABASE=mydatabase 
ENV MYSQL_USER=myuser
ENV MYSQL_PASSWORD=mypassword

# Init script másolása az inicializáláshoz
COPY init.sql /docker-entrypoint-initdb.d/

# Konténer indítása
CMD ["mysqld"]
