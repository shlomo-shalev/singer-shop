#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS catalog;
    GRANT ALL PRIVILEGES ON \`catalog%\`.* TO '$MYSQL_USER'@'%';
EOSQL
