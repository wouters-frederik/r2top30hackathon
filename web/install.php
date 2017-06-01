<?php

include 'settings.php';

$install = 'CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `geboortedatum` int(15) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;';

$statement = $dbh->prepare($install);
$statement->execute();
$lastId =  $dbh->lastInsertId();
echo "install ok.";