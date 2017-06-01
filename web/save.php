<?php
//Save the data to the DB
//$sql = 'SELECT * FROM users where id = '.intval($_GET['id']).' limit 1';
//$user = false;
//foreach ((array)$dbh->query($sql) as $row) {
//  $user = $row;
//}
//redirect to detail.php?id=num&name=fred

header("Location: /detail.php?id=" . $id . '&name=' . $name);
die();