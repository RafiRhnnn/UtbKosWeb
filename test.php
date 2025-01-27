<?php
if (isset($_GET['Idkos'])) {
    echo "ID ditemukan: " . htmlspecialchars($_GET['id']);
} else {
    echo "ID tidak ditemukan.";
}