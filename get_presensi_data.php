<?php

// Koneksi ke database
$db = new mysqli('localhost', 'username', 'password', 'bseconnect_db');

// Cek koneksi database
if ($db->connect_error) {
  die('Koneksi database gagal: ' . $db->connect_error);
}

// Query untuk mengambil data presensi
$sql = "SELECT name, subject, date, topic, grade FROM presensi";
$result = $db->query($sql);

// Deklarasi array untuk menampung data presensi
$presensiData = array();

// Looping untuk mengambil data dari hasil query
while ($row = $result->fetch_assoc()) {
  $presensiData[] = $row;
}

// Konversi data presensi ke format JSON
$presensiJSON = json_encode($presensiData);

// Cetak JSON ke respons
echo $presensiJSON;
