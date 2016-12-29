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

  $users = $xml_doc->getElementsByTagName('users')->item(0);
  $new_user = new \DOMElement('user');
  $users->appendChild($new_user);
  $new_user->appendChild(new \DOMElement('email', $email));
  $new_user->appendChild(new \DOMElement('password_sha256', hash('sha256', $password)));
  $new_user->appendChild(new \DOMElement('admin', 'false'));
  
  $xml_doc->save('data/users.xml');
}

function login($email, $password) {
  if (user_logged_in($email)) {
    logout($email);
  }

  $xml_doc = \DOMDocument::load('data/tokens.xml');
  $tokens = $xml_doc->getElementsByTagName('tokens')->item(0);
  $new_token = new \DOMElement('token');
  $tokens->appendChild($new_token);

  $new_token->appendChild(new \DOMElement('user_email', $email));
  $new_token->appendChild(new \DOMElement('data', generate_token()));

  $xml_doc->save('data/tokens.xml');
}

function logout($email) {
  $xml_doc = \DOMDocument::load('data/tokens.xml');
  $tokens = $xml_doc->getElementsByTagName('tokens')->item(0);

  foreach ($tokens->getElementsByTagName('token') as $token) {
    if ($token->getElementsByTagName('user_email')->item(0)->nodeValue === $email) {
      $tokens->removeChild($token);
      break;
    }
  }

  $xml_doc->save('data/tokens.xml');
}

function generate_token() {
  return hash('sha256', (string)random_int(PHP_INT_MIN, PHP_INT_MAX));
}

function user_exists($email, $password = null) {
  $xml_doc = \DOMDocument::load('data/users.xml');
  foreach ($xml_doc->getElementsByTagName('user') as $user) {
    if ($user->getElementsByTagName('email')->item(0)->nodeValue === $email) {
      if ($password === null || $user->getElementsByTagName('password_sha256')->item(0)->nodeValue === hash('sha256', $password)) {
        return true;
      }
    }
  }
  return false;
}

function user_logged_in($email) {
  $xml_doc = \DOMDocument::load('data/tokens.xml');
  $tokens = $xml_doc->getElementsByTagName('tokens')->item(0);

  foreach ($tokens->getElementsByTagName('token') as $token) {
    if ($token->getElementsByTagName('user_email')->item(0)->nodeValue === $email) {
      return true;
    }
  }

  return false;
}