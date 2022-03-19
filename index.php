<?php


if (is_file('lib/app.php')) {
	require_once 'lib/app.php';
} else {
	die("Error: lib/app.php missing!");
}