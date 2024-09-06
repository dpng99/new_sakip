<?php
include 'C:\xampp\htdocs\new_sakip\sakip\mr.db.php';

$db = mysqli_connect($server, $username, $password, $database) or die(mysqli_error($db));

// Inisialisasi variabel $kejati dan $kejari sebagai array kosong
$kejati = array();
$kejari = array();

// Query untuk mendapatkan data satker
$hmpun_stker = mysqli_query($db, "SELECT id_satker, id_kejati, id_kejari, satkernama, id_level, id_sakip_level FROM sinori_login");

// Iterasi hasil query
while ($hasil1 = mysqli_fetch_array($hmpun_stker, MYSQLI_ASSOC)) {
    if ($hasil1['id_sakip_level'] == '2') {
        $kejati[] = $hasil1; // Tambahkan data ke array $kejati
    } elseif($hasil1['id_kejari'] != '0') {
        $kejari[] = $hasil1; // Tambahkan data ke array $kejari
    }
}
// Variabel untuk paginasi
$limit = 10; // Batas data per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit; // Menghitung offset data

// Pencarian (search)
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Fungsi ekspor ke CSV
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="data_kejati_kejari.csv"');
    
    $output = fopen("php://output", "w");
    fputcsv($output, array('ID Satker', 'ID Kejati', 'ID Kejari', 'Satker Nama', 'ID Level', 'ID Sakip Level', 'ID Tahun', 'ID Bidang', 'ID Saspro', 'ID Indikator', 'Target', 'Realisasi TW1', 'Realisasi TW2', 'Realisasi TW3', 'Realisasi TW4'));
    
    foreach (array_merge($kejati, $kejari) as $data) {
        fputcsv($output, $data);
    }
    fclose($output);
    exit;
}

// Fungsi ekspor ke Excel
if (isset($_GET['export']) && $_GET['export'] === 'excel') {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="data_kejati_kejari.xls"');
    
    echo "<table border='1'>";
    echo "<tr>
            <th>ID Satker</th><th>Satker Nama</th><th>ID Level</th><th>ID Sakip Level</th>
            <th>ID Tahun</th><th>ID Bidang</th><th>ID Saspro</th><th>ID Indikator</th><th>Target</th>
            <th>Realisasi TW1</th><th>Realisasi TW2</th><th>Realisasi TW3</th><th>Realisasi TW4</th>
          </tr>";
    
    foreach (array_merge($kejati, $kejari) as $data) {
        echo "<tr>
                <td>{$data['id_satker']}</td><td>{$data['satkernama']}</td><td>{$data['id_level']}</td><td>{$data['id_sakip_level']}</td><td>{$data['id_tahun']}</td><td>{$data['id_bidang']}</td>
                <td>{$data['id_saspro']}</td><td>{$data['id_indikator']}</td><td>{$data['id_target']}</td><td>{$data['id_realisasi_tw1']}</td>
                <td>{$data['id_realisasi_tw2']}</td><td>{$data['id_realisasi_tw3']}</td><td>{$data['id_realisasi_tw4']}</td>
              </tr>";
    }
    
    echo "</table>";
    exit;
}

// Menampilkan hasil dalam bentuk tabel HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kejati dan Kejari</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .pagination a {
            margin: 0 5px;
            text-decoration: none;
            padding: 8px 16px;
            border: 1px solid #ddd;
            color: #000;
        }
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

<!-- Form Pencarian -->
<form id="searchForm" method="GET">
    <label for="search">Cari berdasarkan ID Satker atau Nama Satker:</label>
    <input type="text" id="search" name="search" value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Cari</button>
</form>

<!-- Tombol Ekspor -->
<form method="GET" action="">
    <input type="hidden" name="search" value="<?= htmlspecialchars($search) ?>">
    <button type="submit" name="export" value="csv">Ekspor ke CSV</button>
    <button type="submit" name="export" value="excel">Ekspor ke Excel</button>
</form>
<div id="table-container">

</div>

<!-- Paginasi -->
<div class="pagination" id="pagination-container">

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // Fungsi untuk memuat data tabel dan paginasi secara AJAX
    function loadTable(page = 1, search = '') {
        $.ajax({
            url: "ajak_handler.php", // Endpoint untuk menangani AJAX
            type: "GET",
            data: {
                page: page,
                search: search
            },
            success: function (response) {
                // Update tabel dan paginasi di halaman
                $('#table-container').html(response.table);
                $('#pagination-container').html(response.pagination);
            }
        });
    }

    // Pencarian form submit handler
    $('#searchForm').on('submit', function (e) {
        e.preventDefault(); // Mencegah reload halaman
        let search = $('#search').val(); // Ambil input pencarian
        loadTable(1, search); // Panggil AJAX loadTable dengan pencarian
    });

    // Paginasi klik handler
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault(); // Mencegah reload halaman
        let page = $(this).attr('data-page'); // Ambil halaman dari pagination link
        let search = $('#search').val(); // Ambil input pencarian
        loadTable(page, search); // Panggil AJAX loadTable dengan halaman dan pencarian
    });

    // Load tabel pertama kali
    loadTable(); // Panggil dengan halaman default 1 dan pencarian kosong
</script>
?>
</body>
</html>
