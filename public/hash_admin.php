<?php
$password = password_hash('admin123', PASSWORD_DEFAULT);

$mysqli = new mysqli("localhost", "root", "", "perpusdigitaldb");
$mysqli->query("UPDATE users SET password = '$password' WHERE username = 'admin'");

echo "Password admin berhasil diperbarui.";
