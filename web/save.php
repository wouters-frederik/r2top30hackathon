<?php
//Save the data to the DB
//$sql = 'SELECT * FROM users where id = '.intval($_GET['id']).' limit 1';
//$user = false;
//foreach ((array)$dbh->query($sql) as $row) {
//  $user = $row;
//}
//redirect to detail.php?id=num&name=fred
include 'settings.php';

//var_dump($_POST);
if (empty($_POST['email'])) {
  $_POST['email'] = '';
}

$vals[] = $_POST['name'];
$vals[] = strtotime($_POST['year'] . '-' . $_POST['maand'] . '-' . $_POST['dag']);
$vals[] = $_POST['email'];

//$stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
//$stmt->bindParam(':date', strtotime($_POST['year'] . '-' . $_POST['maand'] . '-' . $_POST['dag']), PDO::PARAM_INT);
//$stmt->bindParam(':mail', $_POST['email'], PDO::PARAM_STR);

$date = strtotime($_POST['year'] . '-' . $_POST['maand'] . '-' . $_POST['dag']);
$name = $_POST['name'];
$email = $_POST['email'];
// prepare and bind

//$stmt = $dbh->prepare("INSERT INTO users (name, geboortedatum, email) VALUES (?,?,?)");
$statement = $dbh->prepare("INSERT INTO users (name, geboortedatum, mail) VALUES (:name,:date,:mail)");
$statement->execute(array(
  "name" => $name,
  "date" => $date,
  "mail" => $email
));
$lastId =  $dbh->lastInsertId();
//} catch(PDOExecption $e) {
//  $dbh->rollback();
//  print "Error!: " . $e->getMessage() . "</br>";
//}



header("Location: /detail.php?id=" . $lastId . '&name=' . $name);
die();