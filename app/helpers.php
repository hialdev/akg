<?php

if (!function_exists('formatPhoneNumber')) {
    function formatPhoneNumber($number) {
        // Hapus semua karakter yang bukan angka
        $cleaned = preg_replace('/\D/', '', $number);
        
        // Ganti prefix 0 atau 62 di awal dengan 62
        if (substr($cleaned, 0, 1) === '0') {
            $cleaned = '62' . substr($cleaned, 1);
        } elseif (substr($cleaned, 0, 2) !== '62') {
            $cleaned = '62' . $cleaned;
        }
        
        return $cleaned;
    }
}
