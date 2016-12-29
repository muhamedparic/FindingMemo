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
  $xml_doc = \DOMDocument::load('data/users.xml');
  $xml_doc->preserveWhitespace = true;
  $xml_doc->formatOutput = true;

  $users = $xml_doc->getElementsByTagName('users')->item(0);
  $new_user = new \DOMElement('user');
  $users->appendChild($new_user);
  $new_user->appendChild(new \DOMElement('email', $email));
  $new_user->appendChild(new \DOMElement('password_sha256', hash('sha256', $password)));
  $new_user->appendChild(new \DOMElement('admin', 'false'));
  
  $xml_doc->save('data/users.xml');
}

function login($email, $password) {
  
}

function logout() {
  unset($_COOKIE['key']);
}

function generate_token() {
  return hash('sha256', (string)random_int(PHP_INT_MIN, PHP_INT_MAX));
}

function user_exists($email, $password) {
  $xml_doc = \DOMDocument::load('data/users.xml');
  foreach ($xml_doc->getElementsByTagName('user') as $user) {
    if ($user->getElementsByTagName('email')->item(0)->nodeValue === $email
     && $user->getElementsByTagname('password_sha256')->item(0)->nodeValue === hash('sha256', $password)) {
      return true;
    }
  }
  return false;
}