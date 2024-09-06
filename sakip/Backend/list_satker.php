<?php
include 'C:\xampp\htdocs\new_sakip\sakip\mr.db.php'; 
$db = mysqli_connect("$server", "$username", "$password", "$database") or die(mysqli_error($db));

// Query untuk mendapatkan data satker
$hmpun_stker = mysqli_query($db, "SELECT id_satker, id_kejati, id_kejari, satkernama, id_level, id_sakip_level FROM sinori_login");

if (!$hmpun_stker) {
    die("Query Error: " . mysqli_error($db));
}

// Array untuk menyimpan data kejati dan kinerjanya
$data_total = array();

// Penyortiran berdasarkan id_sakip_level (kejati)
while ($hasil1 = mysqli_fetch_array($hmpun_stker, MYSQLI_ASSOC)) {
    if ($hasil1['id_sakip_level'] == '2') {
        // Ambil id_satker
        $id_satker = $hasil1['id_satker'];

        // Ambil data kinerja berdasarkan id_satker
        $himpn_kinerja_kejati = mysqli_query($db, "SELECT id_tahun, id_bidang, id_saspro, id_indikator, id_target, id_realisasi_tw1, id_realisasi_tw2, id_realisasi_tw3, id_realisasi_tw4 FROM sinori_sakip_penetapan WHERE id_satker = '$id_satker'");

        if (!$himpn_kinerja_kejati) {
            die("Query Error: " . mysqli_error($db));
        }

        // Gabungkan data satker dan kinerjanya
        while ($kinerja = mysqli_fetch_array($himpn_kinerja_kejati, MYSQLI_ASSOC)) {
            // Ambil nama indikator dari id_indikator di tabel sinori_sakip_indikator
            $idsaspro = $kinerja['id_saspro'];
            $id_indikator = $kinerja['id_indikator'];

            // Query untuk mendapatkan data indikator
            $himpn_indikator_sakip = mysqli_query($db, "SELECT id, indikator_nama FROM sinori_sakip_indikator WHERE id = '$id_indikator'");

            if (!$himpn_indikator_sakip) {
                die("Query Error: " . mysqli_error($db));
            }

            // Ambil data indikator
            while ($indikator = mysqli_fetch_array($himpn_indikator_sakip, MYSQLI_ASSOC)) {
                
                // Query untuk mendapatkan data saspro
                $himpn_saspro_sakip = mysqli_query($db, "SELECT id, saspro_nama FROM sinori_sakip_saspro WHERE id = '$idsaspro'");

                if (!$himpn_saspro_sakip) {
                    die("Query Error: " . mysqli_error($db));
                }

                // Ambil data saspro
                while ($saspro = mysqli_fetch_array($himpn_saspro_sakip, MYSQLI_ASSOC)) {
                    // Gabungkan data satker, kinerja, indikator, dan saspro ke dalam array $data_total
                    $data_total[] = array_merge($hasil1, $kinerja, $indikator, $saspro);
                }
            }
        }
    }
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

<h2>Data Kejati</h2>
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

</body>
</html>
