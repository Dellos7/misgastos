#!/bin/bash

DIRNAME='sql'
DIR=`ls -1 $DIRNAME | sort`
MYSQL_USER='root'
MYSQL_PASSWORD='root'
for f in $DIR
do
    docker exec -i misgastos_mysql mysql -u $MYSQL_USER -p$MYSQL_PASSWORD --default-character-set=utf8mb4 < "$DIRNAME/$f"
done