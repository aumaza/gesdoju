#!/usr/local/bin/bash
fecha=`date +%d-%m-%Y`
archivo="gesdoju-$fecha.sql"
mysqldump --user=gesdoju --password=gesdoju gesdoju > $archivo
mv $archivo ../../sqls/


