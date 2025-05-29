FROM mariadb:11

# Use environment variables
ENV MYSQL_ROOT_PASSWORD=rootpass
ENV MYSQL_DATABASE=my_app_db
ENV MYSQL_USER=web_user
ENV MYSQL_PASSWORD=webpass

# Copy initial SQL
COPY init.sql /docker-entrypoint-initdb.d/

EXPOSE 3306
