<?php

if (is_file('lib/config.php')) {
	require_once 'lib/config.php';
} else {
	die("Error: lib/config.php missing!");
}

if (is_file('lib/db.php')) {
	require_once 'lib/db.php';
} else {
	die("Error: lib/db.php missing!");
}

if (is_file('lib/model.php')) {
	require_once 'lib/model.php';
} else {
	die("Error: lib/model.php missing!");
}

if (is_file('lib/controller.php')) {
	require_once 'lib/controller.php';
} else {
	die("Error: lib/controller.php missing!");
}

if (is_file('lib/route.php')) {
	require_once 'lib/route.php';
} else {
	die("Error: lib/route.php missing!");
}

$route = new Route();
