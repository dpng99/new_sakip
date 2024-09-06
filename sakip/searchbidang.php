<?php
include("mr.db.php");  // Pastikan ini mengarah ke file koneksi database Anda

$search_query = isset($_POST['search_query']) ? mysqli_real_escape_string($link, $_POST['search_query']) : '';

$level1 = '';  // Pastikan variabel $level1 sudah didefinisikan sesuai dengan logika aplikasi Anda
if (!empty($level1)) {
    $query = "SELECT * FROM sinori_sakip_saspro WHERE lingkup IN ('0', '1', '12') AND LOWER(saspro_nama) LIKE '%" . strtolower($search_query) . "%'";
} else {
    $query = "SELECT * FROM sinori_sakip_saspro WHERE lingkup = '0' AND LOWER(saspro_nama) LIKE '%" . strtolower($search_query) . "%'";
}

$result = mysqli_query($link, $query);
if ($result) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $saspro_nama = htmlspecialchars($row['saspro_nama']);
        echo '<option value="' . htmlspecialchars($row['id']) . '">' . substr($saspro_nama, 0, 100) . '...</option>';
    }
}
?>
