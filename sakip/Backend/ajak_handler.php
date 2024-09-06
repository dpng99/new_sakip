<?php
include 'C:\xampp\htdocs\new_sakip\sakip\mr.db.php';

$db=mysqli_connect($server  ,$username,$password,$database);

// Ambil variabel pencarian dan halaman dari GET
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$limit = 10;
$start = ($page - 1) * $limit;

// Query untuk data dengan JOIN dan pencarian


// Jalankan query
$result = mysqli_query($db, "SELECT sinori_login.id_satker, sinori_login.id_kejati, sinori_login.id_kejari, sinori_login.satkernama, sinori_login.id_level, sinori_login.id_sakip_level, sinori_sakip_penetapan.id_tahun, sinori_sakip_penetapan.id_bidang, sinori_sakip_penetapan.id_saspro, sinori_sakip_penetapan.id_indikator, sinori_sakip_penetapan.id_target, sinori_sakip_penetapan.id_realisasi_tw1, sinori_sakip_penetapan.id_realisasi_tw2, sinori_sakip_penetapan.id_realisasi_tw3, sinori_sakip_penetapan.id_realisasi_tw4 FROM sinori_login LEFT JOIN sinori_sakip_penetapan ON sinori_login.id_satker = sinori_sakip_penetapan.id_satker WHERE sinori_login.id_satker LIKE '%$search%' OR sinori_login.satkernama LIKE '%$search%' LIMIT $start, $limit");

// Query untuk menghitung total data
$count_query = "SELECT COUNT(*) as total 
    FROM sinori_login
    WHERE 
        sinori_login.id_satker LIKE '%$search%' OR
        sinori_login.satkernama LIKE '%$search%'
";
$count_result = mysqli_query($db, $count_query);
$total_data = mysqli_fetch_assoc($count_result)['total'];
$total_pages = ceil($total_data / $limit); // Menghitung total halaman

// Inisialisasi array untuk memisahkan kejati dan kejari
$kejati = array();
$kejari = array();

// Iterasi hasil query
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    if ($row['id_kejari'] == '0') {
        $kejati[] = $row; // Data untuk kejati
    } else {
        $kejari[] = $row; // Data untuk kejari
    }
}

// Menyiapkan tabel dan pagination untuk dikirim ke AJAX
$table = '<h2>Data Kejati</h2><table><thead><tr><th>ID Satker</th><th>ID Kejati</th><th>ID Kejari</th><th>Satker Nama</th><th>ID Level</th><th>ID Sakip Level</th><th>ID Tahun</th><th>ID Bidang</th><th>ID Saspro</th><th>ID Indikator</th><th>Target</th><th>Realisasi TW1</th><th>Realisasi TW2</th><th>Realisasi TW3</th><th>Realisasi TW4</th></tr></thead><tbody>';
foreach (array_merge($kejati, $kejari ) as $data) {
    $table .= "<tr><td>{$data['id_satker']}</td><td>{$data['id_kejati']}</td><td>{$data['id_kejari']}</td><td>{$data['satkernama']}</td><td>{$data['id_level']}</td><td>{$data['id_sakip_level']}</td><td>{$data['id_tahun']}</td><td>{$data['id_bidang']}</td><td>{$data['id_saspro']}</td><td>{$data['id_indikator']}</td><td>{$data['id_target']}</td><td>{$data['id_realisasi_tw1']}</td><td>{$data['id_realisasi_tw2']}</td><td>{$data['id_realisasi_tw3']}</td><td>{$data['id_realisasi_tw4']}</td></tr>";
}
$table .= '</tbody></table>';

// Pagination
$pagination = '';
for ($i = 1; $i <= $total_pages; $i++) {
    $pagination .= "<a href='#' data-page='$i' class='".($i == $page ? "active" : "")."'>$i</a>";
}

// Kirimkan data tabel dan pagination ke AJAX
echo json_encode(array(
    'table' => $table,
    'pagination' => $pagination
));
