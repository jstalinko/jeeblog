<?php
// server.php

// Routing logika atau aplikasi utama Anda
if (file_exists(__DIR__ . $_SERVER['REQUEST_URI'])) {
    return false; // Kembali ke server PHP bawaan jika berkas ada
} else {
    // Aplikasi Anda berjalan di sini
    echo "Hello from server.php!";
}