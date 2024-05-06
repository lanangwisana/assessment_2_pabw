<?php

// Database connection (same as before)
$db = new mysqli('localhost', 'root', '', 'bseconnect_db');

// Function to delete attendance data
function deleteAttendanceData($id) {
    global $db;

    // Prepare and execute SQL query
    $sql = "DELETE FROM presensi WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    // Check if deletion was successful
    if ($stmt->affected_rows > 0) {
        echo "Data berhasil dihapus";
    } else {
        echo "Gagal menghapus data";
    }

    // Close statement and connection
    $stmt->close();
    $db->close();
}

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteAttendanceData($id);
} else {
    echo "ID tidak ditemukan";
}
