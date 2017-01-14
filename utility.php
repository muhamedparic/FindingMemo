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

function new_connection() {
	return new PDO("mysql:dbname=finding_memo;host=localhost;charset=utf8", "root", "");
}

function generate_token() {
  return hash('sha256', (string)random_int(PHP_INT_MIN, PHP_INT_MAX));
}

function register($email, $password) {
  	$conn = new_connection();

  	$insert = $conn->prepare('INSERT INTO users(email, password_sha256, admin) VALUES(:email, :password, :admin)');
	$insert->execute([':email' => $email, ':password' => hash('sha256', $password), ':admin' => 'false']);
}

function login($email, $password) {
	if (user_logged_in($email)) {
    	logout($email);
  	}

	$conn = new_connection();

	$insert = $conn->prepare('INSERT INTO tokens(string, user_id, created_on) VALUES(:token, (SELECT id FROM users WHERE email = :email), CURRENT_DATE())');
	$insert->execute([':email' => $email, ':token' => generate_token()]);
}

function logout($email) {
	$conn = new_connection();

	$delete = $conn->prepare('DELETE FROM tokens WHERE user_id = (SELECT id FROM users WHERE email = :email');
	$delete->execute([':email' => $email]);
}

function user_exists($email, $password = null) {
	$conn = new_connection();

	$select = null;

	if ($password) {
		$select = $conn->prepare('SELECT COUNT(*) FROM users WHERE email = :email AND password_sha256 = :password');
		$select->execute([':email' => $email, ':password' => $password]);
	} else {
		$select = $conn->prepare('SELECT COUNT(*) FROM user WHERE email = :email');
		$select->execute([':email' => $email]);
	}

	return $select->fetchColumn() === 1;
}

function user_logged_in($email) {
	$conn = new_connection();

	$select = $conn->prepare('SELECT COUNT(*) FROM tokens WHERE user_id = (SELECT id FROM users WHERE email = :email)');
	$select->execute([':email' => $email]);

	return $select->fetchColumn() === 1;
}

function save_emails_csv() {
	$conn = new_connection();

	$emails = '';
	$select = $conn->prepare('SELECT email FROM users');

	for ($select->fetchAll() as $email) {
		$emails .= ($email . "\n");
	}

	\file_put_contents('data/emails.csv', $emails);
}