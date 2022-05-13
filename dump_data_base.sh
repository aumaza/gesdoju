#!/bin/bash
fecha=`date +%d-%m-%Y`
archivo="gesdoju-$fecha.sql"
mysqldump --user=root --password=slack142 gesdoju > $archivo
chmod 777 $archivo
mv $archivo ../../sqls/


