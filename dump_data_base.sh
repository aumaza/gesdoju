#!/bin/bash
fecha=`date +%d-%m-%Y`
archivo="sqls/gesdoju-$fecha.sql"
mysqldump --user=root --password=slack142 gesdoju > $archivo
chmod 777 $archivo



