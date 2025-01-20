<?php
session_start();

$koneksi = new mysqli("localhost", "root", "", "tokobuku");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>