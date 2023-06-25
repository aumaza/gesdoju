<?php
try
{
	$bdd = new PDO('mysql:host=slackzone.ddns.net;dbname=gesdoju;charset=utf8', 'root', 'slack142');
	//$bdd = new PDO('mysql:host=localhost;dbname=gesdoju;charset=utf8', 'gesdoju', 'gesdoju');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
