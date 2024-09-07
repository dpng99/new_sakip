<?php
include 'C:\xampp\htdocs\new_sakip\sakip\mr.db.php'; 
$db = mysqli_connect("$server", "$username", "$password", "$database") or die(mysqli_error($db));

// Query untuk mendapatkan data satker
$query = "
    SELECT sl.id_satker, sl.id_kejati, sl.id_kejari, sl.satkernama, sl.id_level, sl.id_sakip_level,
           sp.id_tahun, sp.id_bidang, sp.id_saspro, sp.id_indikator, sp.id_target, sp.id_realisasi_tw1, sp.id_realisasi_tw2, sp.id_realisasi_tw3, sp.id_realisasi_tw4,
           si.indikator_nama, ss.saspro_nama
    FROM sinori_login sl
    LEFT JOIN sinori_sakip_penetapan sp ON sl.id_satker = sp.id_satker
    LEFT JOIN sinori_sakip_indikator si ON sp.id_indikator = si.id
    LEFT JOIN sinori_sakip_saspro ss ON sp.id_saspro = ss.id
";

$hmpun_stker = mysqli_query($db, $query);

if (!$hmpun_stker) {
    die("Query Error: " . mysqli_error($db));
}

// Array untuk menyimpan data
$data_total = array();
$data_total2 = array();
$data_indikator1 = array();
$data_indikator2 = array();
$data_indikator3 = array();
$data_indikator4 = array();
$data_indikator5 = array();
$data_indikator6 = array();

while ($hasil1 = mysqli_fetch_array($hmpun_stker, MYSQLI_ASSOC)) {
    if ($hasil1['id_sakip_level'] == '1') {
        $data_total[] = $hasil1;
        if (in_array($hasil1['id_indikator'], [1, 2, 3, 4, 5, 56, 59])) {
            $data_indikator1[] = $hasil1;
        }elseif(in_array($hasil1['id_indikator'], [7, 9, 39, 68, 71, 91
        ])) {

        }

    }elseif ($hasil1['id_sakip_level'] == '2') {
        $data_total2[] = $hasil1;

        // Penyortiran berdasarkan id_indikator
        if (in_array($hasil1['id_indikator'], [6, 8, 10, 53, 54, 55, 60, 61, 62, 69, 70, 72, 77, 78, 79, 80, 82, 83, 84, 85, 86, 87, 88, 89, 90, 92])) {
            $data_indikator2[] = $hasil1;
        } elseif (in_array($hasil1['id_indikator'], [15, 16, 17, 18, 19, 20, 21, 44, 57, 58, 63, 73, 74, 75, 76])) {
            $data_indikator3[] = $hasil1;
        } elseif (in_array($hasil1['id_indikator'], [22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 35, 36, 37, 38, 45, 46, 47, 48, 49, 50, 51, 64, 65])) {
            $data_indikator4[] = $hasil1;
        }elseif(in_array($hasil1['id_indikator'], [11, 12, 13, 14, 34, 40, 41, 42, 43, 52, 66, 67])) {
            $data_indikator5[] = $hasil1;
        }
    }
}
// Fungsi untuk ekspor data ke format CSV
function exportCSV($data, $filename) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('ID Satker', 'Satker Nama', 'ID Level', 'ID Sakip Level', 'ID Tahun', 'ID Bidang', 'Indikator Nama', 'ID Saspro', 'Saspro Nama', 'ID Indikator', 'Target', 'Realisasi TW1', 'Realisasi TW2', 'Realisasi TW3', 'Realisasi TW4'));
    foreach ($data as $row) {
        fputcsv($output, $row);
    }
    fclose($output);
    exit;
}

// Fungsi untuk ekspor data ke format Excel
function exportExcel($data, $filename) {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    echo '<table border="1">';
    echo '<tr><th>ID Satker</th><th>Satker Nama</th><th>ID Level</th><th>ID Sakip Level</th><th>ID Tahun</th><th>ID Bidang</th><th>Indikator Nama</th><th>ID Saspro</th><th>Saspro Nama</th><th>ID Indikator</th><th>Target</th><th>Realisasi TW1</th><th>Realisasi TW2</th><th>Realisasi TW3</th><th>Realisasi TW4</th></tr>';
    foreach ($data as $row) {
        echo '<tr>';
        foreach ($row as $cell) {
            echo '<td>' . htmlspecialchars($cell) . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    exit;
}

// Cek jika ada request untuk ekspor data
if (isset($_GET['export']) && $_GET['export'] == 'csv1') {
    exportCSV($data_total, 'eselon1_data.csv');
} elseif (isset($_GET['export']) && $_GET['export'] == 'excel1') {
    exportExcel($data_total, 'eselon1_data.xls');
} elseif (isset($_GET['export']) && $_GET['export'] == 'csv2') {
    exportCSV($data_total2, 'kejati_data.csv');
} elseif (isset($_GET['export']) && $_GET['export'] == 'excel2') {
    exportExcel($data_total2, 'kejati_data.xls');
}
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
    </style>
</head>
<body>

<h2>Data Capaian Kinerja Meningkatnya Profesionalisme Aparatur Kejaksaan RI</h2>
<a href="?export=csv1" class="btn btn-primary">Ekspor ke CSV</a>
<a href="?export=excel1" class="btn btn-primary">Ekspor ke Excel</a>
<table>
    <thead>
        <tr>
            <th>ID Satker</th>
            <th>Satker Nama</th>
            <th>ID Tahun</th>
            <th>ID Indikator</th>
            <th>Indikator Nama</th>
            <th>Target</th>
            <th>Realisasi TW1</th>
            <th>Realisasi TW2</th>
            <th>Realisasi TW3</th>
            <th>Realisasi TW4</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data_indikator1)) : ?>
            <?php foreach ($data_indikator1 as $data) : ?>
            <tr>
                <td><?= htmlspecialchars($data['id_satker']) ?></td>
                <td><?= htmlspecialchars($data['satkernama']) ?></td>
                <td><?= htmlspecialchars($data['id_tahun']) ?></td>
                <td><?= htmlspecialchars($data['id_indikator']) ?></td>
                <td><?= htmlspecialchars($data['indikator_nama']) ?></td>
                <td><?= htmlspecialchars($data['id_target']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw1']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw2']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw3']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw4']) ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="14">Tidak ada data ditemukan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<h2>Data Capaian Meningkatnya Akuntabilitas dan Integritas Aparatur Kejaksaan RI</h2>
<a href="?export=csv1" class="btn btn-primary">Ekspor ke CSV</a>
<a href="?export=excel1" class="btn btn-primary">Ekspor ke Excel</a>
<table>
    <thead>
        <tr>
            <th>ID Satker</th>
            <th>Satker Nama</th>
            <th>ID Tahun</th>
            <th>ID Indikator</th>
            <th>Indikator Nama</th>
            <th>Target</th>
            <th>Realisasi TW1</th>
            <th>Realisasi TW2</th>
            <th>Realisasi TW3</th>
            <th>Realisasi TW4</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data_indikator2)) : ?>
            <?php foreach ($data_indikator2 as $data) : ?>
            <tr>
                <td><?= htmlspecialchars($data['id_satker']) ?></td>
                <td><?= htmlspecialchars($data['satkernama']) ?></td>
                <td><?= htmlspecialchars($data['id_tahun']) ?></td>
                <td><?= htmlspecialchars($data['id_indikator']) ?></td>
                <td><?= htmlspecialchars($data['indikator_nama']) ?></td>
                <td><?= htmlspecialchars($data['id_target']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw1']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw2']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw3']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw4']) ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="14">Tidak ada data ditemukan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<h2>Data Eselon 1</h2>
<a href="?export=csv1" class="btn btn-primary">Ekspor ke CSV</a>
<a href="?export=excel1" class="btn btn-primary">Ekspor ke Excel</a>
<table>
    <thead>
        <tr>
            <th>ID Satker</th>
            <th>Satker Nama</th>
            <th>ID Level</th>
            <th>ID Sakip Level</th>
            <th>ID Tahun</th>
            <th>ID Bidang</th>
            <th>Indikator Nama</th>
            <th>ID Saspro</th>
            <th>Saspro Nama</th>
            <th>ID Indikator</th>
            <th>Target</th>
            <th>Realisasi TW1</th>
            <th>Realisasi TW2</th>
            <th>Realisasi TW3</th>
            <th>Realisasi TW4</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data_total)) : ?>
            <?php foreach ($data_total as $data) : ?>
            <tr>
                <td><?= htmlspecialchars($data['id_satker']) ?></td>
                <td><?= htmlspecialchars($data['satkernama']) ?></td>
                <td><?= htmlspecialchars($data['id_level']) ?></td>
                <td><?= htmlspecialchars($data['id_sakip_level']) ?></td>
                <td><?= htmlspecialchars($data['id_tahun']) ?></td>
                <td><?= htmlspecialchars($data['id_bidang']) ?></td>
                <td><?= htmlspecialchars($data['indikator_nama']) ?></td>
                <td><?= htmlspecialchars($data['id_saspro']) ?></td>
                <td><?= htmlspecialchars($data['saspro_nama']) ?></td>
                <td><?= htmlspecialchars($data['id_indikator']) ?></td>
                <td><?= htmlspecialchars($data['id_target']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw1']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw2']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw3']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw4']) ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="14">Tidak ada data ditemukan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<h2>Data Kejati</h2>
<a href="?export=csv2" class="btn btn-primary">Ekspor ke CSV</a>
<a href="?export=excel2" class="btn btn-primary">Ekspor ke Excel</a>
<table>
    <thead>
        <tr>
            <th>ID Satker</th>
            <th>Satker Nama</th>
            <th>ID Level</th>
            <th>ID Sakip Level</th>
            <th>ID Tahun</th>
            <th>ID Bidang</th>
            <th>Indikator Nama</th>
            <th>ID Saspro</th>
            <th>Saspro Nama</th>
            <th>ID Indikator</th>
            <th>Target</th>
            <th>Realisasi TW1</th>
            <th>Realisasi TW2</th>
            <th>Realisasi TW3</th>
            <th>Realisasi TW4</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data_total2)) : ?>
            <?php foreach ($data_total2 as $data) : ?>
            <tr>
                <td><?= htmlspecialchars($data['id_satker']) ?></td>
                <td><?= htmlspecialchars($data['satkernama']) ?></td>
                <td><?= htmlspecialchars($data['id_level']) ?></td>
                <td><?= htmlspecialchars($data['id_sakip_level']) ?></td>
                <td><?= htmlspecialchars($data['id_tahun']) ?></td>
                <td><?= htmlspecialchars($data['id_bidang']) ?></td>
                <td><?= htmlspecialchars($data['indikator_nama']) ?></td>
                <td><?= htmlspecialchars($data['id_saspro']) ?></td>
                <td><?= htmlspecialchars($data['saspro_nama']) ?></td>
                <td><?= htmlspecialchars($data['id_indikator']) ?></td>
                <td><?= htmlspecialchars($data['id_target']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw1']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw2']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw3']) ?></td>
                <td><?= htmlspecialchars($data['id_realisasi_tw4']) ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="14">Tidak ada data ditemukan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
