#!/bin/bash
fecha=`date +%d-%m-%Y`
archivo="../../sqls/gesdoju-$fecha.sql"
mysqldump --user=gesdoju --password=gesdoju gesdoju > $archivo
chmod 777 $archivo



