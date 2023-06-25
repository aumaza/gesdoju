#!/bin/bash
fecha=`date +%d-%m-%Y`
archivo="sqls/gesdoju-$fecha.sql"
#mysqldump --user=root --password=slack142 --host=slackzone.ddns.net gesdoju > $archivo
mysqldump --user=root --password=slack142 --host=localhost gesdoju > $archivo
chmod 777 $archivo



