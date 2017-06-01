<?php

if (isset($_ENV['PLATFORM_RELATIONSHIPS'])) {
  $relationships = json_decode(base64_decode($_ENV['PLATFORM_RELATIONSHIPS']), TRUE);
  if (empty($databases['default']) && !empty($relationships)) {
    foreach ($relationships as $key => $relationship) {
      $drupal_key = ($key === 'database') ? 'default' : $key;
      foreach ($relationship as $instance) {
        if (empty($instance['scheme']) || ($instance['scheme'] !== 'mysql' && $instance['scheme'] !== 'pgsql')) {
          continue;
        }
        $database = [
          'driver' => $instance['scheme'],
          'database' => $instance['path'],
          'username' => $instance['username'],
          'password' => $instance['password'],
          'host' => $instance['host'],
          'port' => $instance['port'],
        ];
        if (!empty($instance['query']['compression'])) {
          $database['pdo'][PDO::MYSQL_ATTR_COMPRESS] = TRUE;
        }
        if (!empty($instance['query']['is_master'])) {
          $databases[$drupal_key]['default'] = $database;
        }
        else {
          $databases[$drupal_key]['slave'][] = $database;
        }
      }
    }
  }
}
// Configure private and temporary file paths.
if (isset($_ENV['PLATFORM_APP_DIR'])) {
  if (!isset($conf['file_private_path'])) {
    $conf['file_private_path'] = $_ENV['PLATFORM_APP_DIR'] . '/private';
  }
  if (!isset($conf['file_temporary_path'])) {
    $conf['file_temporary_path'] = $_ENV['PLATFORM_APP_DIR'] . '/tmp';
  }
}


if (!isset($databases['default']['default'])) {
  $databases['default']['default'] = [
    'driver' => 'mysql',
    'database' => 'r2top30',
    'username' => 'root',
    'password' => 'mysql',
    'host' => 'localhost',
    'port' => '3306',
  ];
}

$dsn = 'mysql:host='.$databases['default']['default']['host'].';dbname='.$databases['default']['default']['database'];
$username = $databases['default']['default']['username'];
$password = $databases['default']['default']['password'];
$options = array(
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

$dbh = new PDO($dsn, $username, $password, $options);



//
function getHitlijstData($apicall){
  //https://hitlijst.vrt.be/api/lists?parent_lid=840
  $url = 'https://hitlijst.vrt.be/api/' . $apicall;

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($ch, CURLOPT_HEADER, 0);
  //curl_setopt($ch, CURLOPT_POST, 1);
  //curl_setopt($ch, CURLOPT_PORT, $port);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_POSTFIELDS,     json_encode($params));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  if( ! $result = curl_exec($ch))
  {
    echo 'error' . PHP_EOL;
    print_r(curl_error($ch));
    die();
  }
  curl_close($ch);
  return json_decode($result);
}