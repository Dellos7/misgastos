#!/bin/bash

dir='sql'
sql_script=$1
file="$dir/$sql_script"
MYSQL_USER='root'
MYSQL_PASSWORD='root'
if [ -f $file ]
then
    docker exec -i misgastos_mysql mysql -u $MYSQL_USER -p$MYSQL_PASSWORD --default-character-set=utf8mb4 < $file
else
    echo "No sql script provided."
fi