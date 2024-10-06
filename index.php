<?php
session_start();

// Cek apakah session email sudah ada
if (isset($_SESSION['username'])) {
    header("Location: ./public/dashboard");
    exit();
} else {
    header("Location: ./public/log");
    exit();
}
?>
