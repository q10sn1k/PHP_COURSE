# используем базовый образ MySql
FROM mysql:latest

# Устанавливаем переменную окружения MYSQL_ROOT_PASSWORD
ENV MYSQL_ROOT_PASSWORD=root


# Копируем файл init.sql в каталог /docker-entrypoint-initdb.d/ в контейнере
COPY init.sql /docker-entrypoint-initdb.d/