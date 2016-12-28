<?php

namespace util;

function parse_parameters($method, $keys) {
  $source = ($method == 'GET') ? $_GET : $_POST;
  $params = [];
  
  foreach ($keys as $key) {
    if (!isset($source[$key])) {
      return false;
    }
    $params[$key] = $source[$key];
  }
  
  return $params;
}

function register($email, $password) {
  if (!file_exists('users')) {
    mkdir('users');
    file_put_contents('users/users.xml', "<?xml version=\"1.0\"?>
    <users>
  <user>
    <email>admin@etf.unsa.ba</email>
    <password_sha256>713bfda78870bf9d1b261f565286f85e97ee614efe5f0faf7c34e7ca4f65baca</password_sha256>
    <admin>true</admin>
  </user>
</users>");
  }
  
  // Funkcija ne radi jos nista

}

function login($email, $password) {
  $users = \simplexml_load_string(\file_get_contents('users/users.xml'));
  foreach ($users->children() as $user) {
    if ($user->email === $email && $user->password_sha256 === hash('sha256', $password)) {
      $_COOKIE['key'] = 'true';
      return true;
    }
  }
  return false;
}

function logout() {
  unset($_COOKIE['key']);
}