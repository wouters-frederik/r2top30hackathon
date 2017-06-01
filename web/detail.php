<?php

include 'settings.php';

if(!isset$_GET['id']){
  $_GET['id'] = 0;
}

$sql = 'SELECT * FROM users where id = '.intval($_GET['id']).' limit 1';
$user = false;
foreach ((array)$dbh->query($sql) as $row) {
  $user = $row;
}

if ($user == false) {
  echo 'oei die persoon hebben we niet gevonden. <a href="index.php">Proef zelf eens van ons spelletje.</a>';
  die();
}
$user['birthday'] = date('d / m / Y',$user['geboortedatum']);
//no id = Oei, probeer het zelf eens
// KNOP to frontpage.


//echo Geboortedatum
echo '<div>';
echo 'Geboortedatum '.$user['birthday'] . '<br>';
echo 'Name '.$user['name'] . '<br>';
$hitlijst = getHitlijstData('lists?parent_lid=840');
//var_dump($hitlijst);
$aftellijst = getHitlijstData('lists/301');
$first_song = $aftellijst->songs[0];
//var_dump($aftellijst->data->air_date);
echo 'Op 1 in ' . $aftellijst->data->name . ' van ' . date('d m Y',$aftellijst->data->air_date) . '<br>';
echo $first_song->title .' - ' . $first_song->name;
echo '</div>';
echo '<br>';


echo '<div>';
echo '<a href="https://www.facebook.com/sharer/sharer.php?u=/detail.php?id=1">Deel op Facebook</a>';
echo '<a href="https://twitter.com/home?status=https%3A//master-7rqtwti-coio4nyeqlhz4.eu.platform.sh/detail.php?id=1">Deel op Twitter</a>';
echo '</div>';
//Load id
// Render HTML