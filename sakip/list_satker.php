<?php
session_start();
// Include database connection
include("mr.db.php");

if (isset($_SESSION['ID']) && isset($_SESSION['Pass'])) {
    // Koneksi ke database
    $link = mysqli_connect($server, $username, $password, $database);
    if (!$link) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Ambil ID dan Pass dari session
    $session_id = $_SESSION['ID'];
    $session_pass = $_SESSION['Pass'];

    // Query untuk memverifikasi apakah session ID dan session key cocok
    $query = "SELECT id_satker, satkerkey FROM sinori_login WHERE id_satker = ? AND satkerkey = ?";
    $stmt = mysqli_prepare($link, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $session_id, $session_pass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_satker, $satkerkey);

        if (mysqli_stmt_fetch($stmt)) {
            // Verifikasi sukses, pastikan hanya menpanrb yang dapat mengakses
            if ($session_id == 'menpanrb' || $session_id == '888881') {
                // Session valid dan user adalah menpanrb, tampilkan halaman
                $user = $_SESSION['ID'];
                echo "<h1>Welcome $user</h1>";

                // Lakukan koneksi dan query yang relevan untuk menampilkan data
                $db = mysqli_connect($server, $username, $password, $database);
                if (!$db) {
                    die("Database connection failed: " . mysqli_error($db));
                }

                // Query to get data satker
                $query = "SELECT sl.id_satker, sl.id_kejati, sl.id_kejari, sl.satkernama, sl.id_level, sl.id_sakip_level,
                          sp.id_tahun, sp.id_bidang, sp.id_saspro, sp.id_indikator, sp.id_target, 
                          sp.id_realisasi_tw1, sp.id_realisasi_tw2, sp.id_realisasi_tw3, sp.id_realisasi_tw4,
                          si.indikator_nama, ss.saspro_nama
                          FROM sinori_login sl
                          LEFT JOIN sinori_sakip_penetapan sp ON sl.id_satker = sp.id_satker
                          LEFT JOIN sinori_sakip_indikator si ON sp.id_indikator = si.id
                          LEFT JOIN sinori_sakip_saspro ss ON sp.id_saspro = ss.id";
                
                $hmpun_stker = mysqli_query($db, $query);

                if (!$hmpun_stker) {
                    die("Query Error: " . mysqli_error($db));
                }

            // Arrays to store data
            $data_indikator1 = array();
            $data_indikator2 = array();
            $data_indikator3 = array();
            $data_indikator4 = array();
            $data_indikator5 = array();
            $data_indikator6 = array();
            $data_indikator2_part1 = array();
            $data_indikator2_part2 = array();
            $data_indikator2_part3 = array();
            $data_indikator4_part1 = array();
            $data_indikator4_part2 = array();
            $data_indikator5_part1 = array();
            $data_indikator5_part2 = array();

            // Process query results
            while ($hasil1 = mysqli_fetch_array($hmpun_stker, MYSQLI_ASSOC)) {
                if ($hasil1['id_sakip_level'] == '1') {
                    if (in_array($hasil1['id_indikator'], array(1, 2, 3, 4, 5, 56, 59))) {
                        $data_indikator1[] = $hasil1;
                    } elseif (in_array($hasil1['id_indikator'], array(7, 9, 39, 68, 71, 91))) {
                        $data_indikator6[] = $hasil1;
                    }

                } elseif ($hasil1['id_sakip_level'] == '2') {
                    if (in_array($hasil1['id_indikator'], array(6, 8, 10, 53, 54, 55, 60, 61, 62, 69, 70, 72, 77, 78, 79, 80, 82, 83, 84, 85, 86, 87, 88, 89, 90, 92))) {
                        $data_indikator2[] = $hasil1;
                        if (in_array($hasil1['id_indikator'], array(60, 78, 79))) {
                            $data_indikator2_part1[] = $hasil1;
                        } elseif (in_array($hasil1['id_indikator'], array(6, 8, 10, 53, 54, 61, 69, 70, 72, 77, 82, 83, 84, 85, 86, 87, 88, 89, 90, 92))) {
                            $data_indikator2_part2[] = $hasil1;
                        } elseif (in_array($hasil1['id_indikator'], array(55, 62, 80))) {
                            $data_indikator2_part3[] = $hasil1;
                        }
                    } elseif (in_array($hasil1['id_indikator'], array(15, 16, 17, 18, 19, 20, 21, 44, 57, 58, 63, 73, 74, 75, 76))) {
                        $data_indikator3[] = $hasil1;
                    } elseif (in_array($hasil1['id_indikator'], array(22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 35, 36, 37, 38, 45, 46, 47, 48, 49, 50, 51, 64, 65))) {
                        $data_indikator4[] = $hasil1;
                        if (in_array($hasil1['id_indikator'], array(22, 23, 24, 25, 26, 27, 64))) {
                            $data_indikator4_part1[] = $hasil1;
                        } elseif (in_array($hasil1['id_indikator'], array(29, 30, 31, 32, 33, 35, 36, 37, 38, 45, 46, 47, 48, 49, 50, 51, 65))) {
                            $data_indikator4_part2[] = $hasil1;
                        }
                    } elseif (in_array($hasil1['id_indikator'], array(11, 12, 13, 14, 34, 40, 41, 42, 43, 52, 66, 67))) {
                        $data_indikator5[] = $hasil1;
                        if (in_array($hasil1['id_indikator'], array(11, 12, 13, 14, 34, 52, 66))) {
                            $data_indikator5_part1[] = $hasil1;
                        } elseif (in_array($hasil1['id_indikator'], array(40, 41, 42, 43, 67))) {
                            $data_indikator5_part2[] = $hasil1;
                        }
                    }
                }
            }

            // Close the database connection
            mysqli_close($db);

            // Fungsi untuk menghitung rata-rata
            function computeAverages1($data) {
                $tw1_sum = $tw2_sum = $tw3_sum = $tw4_sum = 0;
                $count = 0;

                foreach ($data as $row) {
                    if ((isset($row['id_realisasi_tw1']) && $row['id_realisasi_tw1'] == 0) && 
                        (isset($row['id_realisasi_tw2']) && $row['id_realisasi_tw2'] == 0) && 
                        (isset($row['id_realisasi_tw3']) && $row['id_realisasi_tw3'] == 0) && 
                        (isset($row['id_realisasi_tw4']) && $row['id_realisasi_tw4'] == 0)) {
                        continue;  // Skip this row
                    }

                    $tw1_sum += isset($row['id_realisasi_tw1']) ? $row['id_realisasi_tw1'] : 0;
                    $tw2_sum += isset($row['id_realisasi_tw2']) ? $row['id_realisasi_tw2'] : 0;
                    $tw3_sum += isset($row['id_realisasi_tw3']) ? $row['id_realisasi_tw3'] : 0;
                    $tw4_sum += isset($row['id_realisasi_tw4']) ? $row['id_realisasi_tw4'] : 0;

                    $count++;
                }

                return array(
                    'tw1_avg' => $count > 0 ? $tw1_sum / $count : 0,
                    'tw2_avg' => $count > 0 ? $tw2_sum / $count : 0,
                    'tw3_avg' => $count > 0 ? $tw3_sum / $count : 0,
                    'tw4_avg' => $count > 0 ? $tw4_sum / $count : 0,
                );
            }
            
            // Fungsi lain juga diubah dari null coalesce menjadi isset()
            function computeAverages($data) {
                $tw1_sum = $tw2_sum = $tw3_sum = $tw4_sum = 0;
                $count = 0;

                foreach ($data as $row) {
                    // Check if all TW values are 0
                    if ((isset($row['id_realisasi_tw1']) && $row['id_realisasi_tw1'] == 0) && 
                        (isset($row['id_realisasi_tw2']) && $row['id_realisasi_tw2'] == 0) && 
                        (isset($row['id_realisasi_tw3']) && $row['id_realisasi_tw3'] == 0) && 
                        (isset($row['id_realisasi_tw4']) && $row['id_realisasi_tw4'] == 0)) {
                        continue;  // Skip this row
                    }

                    // Sum up the values for the non-zero rows
                    $tw1_sum += isset($row['id_realisasi_tw1']) ? $row['id_realisasi_tw1'] : 0;
                    $tw2_sum += isset($row['id_realisasi_tw2']) ? $row['id_realisasi_tw2'] : 0;
                    $tw3_sum += isset($row['id_realisasi_tw3']) ? $row['id_realisasi_tw3'] : 0;
                    $tw4_sum += isset($row['id_realisasi_tw4']) ? $row['id_realisasi_tw4'] : 0;

                    // Increment the count for valid rows
                    $count++;
                }

                $tw1_avg = $count > 0 ? (($tw1_sum / $count) / 90) * 100 : 0;
                $tw2_avg = $count > 0 ? (($tw2_sum / $count) / 90) * 100 : 0;
                $tw3_avg = $count > 0 ? (($tw3_sum / $count) / 90) * 100 : 0;
                $tw4_avg = $count > 0 ? (($tw4_sum / $count) / 90) * 100 : 0;

                return array(
                    'tw1_avg' => $tw1_avg,
                    'tw1_real_avg' => $tw1_avg > 0 ? ($tw1_avg / 90) * 100 : 0,
                    'tw2_avg' => $tw2_avg,
                    'tw2_real_avg' => $tw2_avg > 0 ? ($tw2_avg / 90) * 100 : 0,
                    'tw3_avg' => $tw3_avg,
                    'tw3_real_avg' => $tw3_avg > 0 ? ($tw3_avg / 90) * 100 : 0,
                    'tw4_avg' => $tw4_avg,
                    'tw4_real_avg' => $tw4_avg > 0 ? ($tw4_avg / 90) * 100 : 0,
                );
            }
function computeAverages2($data) {
    $tw1_sum = $tw2_sum = $tw3_sum = $tw4_sum = 0;
    $count = 0;

    foreach ($data as $row) {
        // Check if all TW values are 0
        if ((isset($row['id_realisasi_tw1']) && $row['id_realisasi_tw1'] == 0) && 
                        (isset($row['id_realisasi_tw2']) && $row['id_realisasi_tw2'] == 0) && 
                        (isset($row['id_realisasi_tw3']) && $row['id_realisasi_tw3'] == 0) && 
                        (isset($row['id_realisasi_tw4']) && $row['id_realisasi_tw4'] == 0)) {
                        continue;  // Skip this row
                    }

                    // Sum up the values for the non-zero rows
                    $tw1_sum += isset($row['id_realisasi_tw1']) ? $row['id_realisasi_tw1'] : 0;
                    $tw2_sum += isset($row['id_realisasi_tw2']) ? $row['id_realisasi_tw2'] : 0;
                    $tw3_sum += isset($row['id_realisasi_tw3']) ? $row['id_realisasi_tw3'] : 0;
                    $tw4_sum += isset($row['id_realisasi_tw4']) ? $row['id_realisasi_tw4'] : 0;

                    // Increment the count for valid rows
                    $count++;
                }
    $tw1_avg = $count > 0 ? (($tw1_sum / $count) / 100) * 100 : 0;
    $tw2_avg = $count > 0 ? (($tw2_sum / $count) / 100) * 100 : 0;
    $tw3_avg = $count > 0 ? (($tw3_sum / $count) / 100) * 100 : 0;
    $tw4_avg = $count > 0 ? (($tw4_sum / $count) / 100) * 100 : 0;

    return [
        'tw1_avg' => $tw1_avg,
        'tw1_real_avg' => $tw1_avg > 0 ? ($tw1_avg/100) * 100 : 0,
        'tw2_avg' => $tw2_avg,
        'tw2_real_avg' => $tw2_avg > 0 ? ($tw2_avg/100) * 100 : 0,
        'tw3_avg' => $tw3_avg,
        'tw3_real_avg' => $tw3_avg > 0 ? ($tw3_avg/100) * 100 : 0,
        'tw4_avg' => $tw4_avg,
        'tw4_real_avg' => $tw4_avg > 0 ? ($tw4_avg/100) * 100 : 0,
    ];
}
function computeAverages3($data) {
    $tw1_sum = $tw2_sum = $tw3_sum = $tw4_sum = 0;
    $count = 0;

    foreach ($data as $row) {
        // Check if all TW values are 0
        if ((isset($row['id_realisasi_tw1']) && $row['id_realisasi_tw1'] == 0) && 
        (isset($row['id_realisasi_tw2']) && $row['id_realisasi_tw2'] == 0) && 
        (isset($row['id_realisasi_tw3']) && $row['id_realisasi_tw3'] == 0) && 
        (isset($row['id_realisasi_tw4']) && $row['id_realisasi_tw4'] == 0)) {
        continue;  // Skip this row
    }

    // Sum up the values for the non-zero rows
    $tw1_sum += isset($row['id_realisasi_tw1']) ? $row['id_realisasi_tw1'] : 0;
    $tw2_sum += isset($row['id_realisasi_tw2']) ? $row['id_realisasi_tw2'] : 0;
    $tw3_sum += isset($row['id_realisasi_tw3']) ? $row['id_realisasi_tw3'] : 0;
    $tw4_sum += isset($row['id_realisasi_tw4']) ? $row['id_realisasi_tw4'] : 0;

    // Increment the count for valid rows
    $count++;
}
    $tw1_avg = $count > 0 ? (($tw1_sum / $count) / 99) * 100 : 0;
    $tw2_avg = $count > 0 ? (($tw2_sum / $count) / 99) * 100 : 0;
    $tw3_avg = $count > 0 ? (($tw3_sum / $count) / 99) * 100 : 0;
    $tw4_avg = $count > 0 ? (($tw4_sum / $count) / 99) * 100 : 0;

    return [
        'tw1_avg' => $tw1_avg,
        'tw1_real_avg' => $tw1_avg > 0 ? ($tw1_avg/99) * 100 : 0,
        'tw2_avg' => $tw2_avg,
        'tw2_real_avg' => $tw2_avg > 0 ? ($tw2_avg/99) * 100 : 0,
        'tw3_avg' => $tw3_avg,
        'tw3_real_avg' => $tw3_avg > 0 ? ($tw3_avg/99) * 100 : 0,
        'tw4_avg' => $tw4_avg,
        'tw4_real_avg' => $tw4_avg > 0 ? ($tw4_avg/99) * 100 : 0,
    ];
}
function computeAverages4($data) {
    $tw1_sum = $tw2_sum = $tw3_sum = $tw4_sum = 0;
    $count = 0;

    foreach ($data as $row) {
        // Check if all TW values are 0
        if ((isset($row['id_realisasi_tw1']) && $row['id_realisasi_tw1'] == 0) && 
        (isset($row['id_realisasi_tw2']) && $row['id_realisasi_tw2'] == 0) && 
        (isset($row['id_realisasi_tw3']) && $row['id_realisasi_tw3'] == 0) && 
        (isset($row['id_realisasi_tw4']) && $row['id_realisasi_tw4'] == 0)) {
        continue;  // Skip this row
    }

    // Sum up the values for the non-zero rows
    $tw1_sum += isset($row['id_realisasi_tw1']) ? $row['id_realisasi_tw1'] : 0;
    $tw2_sum += isset($row['id_realisasi_tw2']) ? $row['id_realisasi_tw2'] : 0;
    $tw3_sum += isset($row['id_realisasi_tw3']) ? $row['id_realisasi_tw3'] : 0;
    $tw4_sum += isset($row['id_realisasi_tw4']) ? $row['id_realisasi_tw4'] : 0;

    // Increment the count for valid rows
    $count++;
}
    $tw1_avg = $count > 0 ? (($tw1_sum / $count) / 95) * 100 : 0;
    $tw2_avg = $count > 0 ? (($tw2_sum / $count) / 95) * 100 : 0;
    $tw3_avg = $count > 0 ? (($tw3_sum / $count) / 95) * 100 : 0;
    $tw4_avg = $count > 0 ? (($tw4_sum / $count) / 95) * 100 : 0;

    return [
        'tw1_avg' => $tw1_avg,
        'tw1_real_avg' => $tw1_avg > 0 ? ($tw1_avg/95) * 100 : 0,
        'tw2_avg' => $tw2_avg,
        'tw2_real_avg' => $tw2_avg > 0 ? ($tw2_avg/95) * 100 : 0,
        'tw3_avg' => $tw3_avg,
        'tw3_real_avg' => $tw3_avg > 0 ? ($tw3_avg/95) * 100 : 0,
        'tw4_avg' => $tw4_avg,
        'tw4_real_avg' => $tw4_avg > 0 ? ($tw4_avg/95) * 100 : 0,
    ];
}
function computeAverages5($data) {
    $tw1_sum = $tw2_sum = $tw3_sum = $tw4_sum = 0;
    $count = 0;

    foreach ($data as $row) {
        if ((isset($row['id_realisasi_tw1']) && $row['id_realisasi_tw1'] == 0) && 
        (isset($row['id_realisasi_tw2']) && $row['id_realisasi_tw2'] == 0) && 
        (isset($row['id_realisasi_tw3']) && $row['id_realisasi_tw3'] == 0) && 
        (isset($row['id_realisasi_tw4']) && $row['id_realisasi_tw4'] == 0)) {
        continue;  // Skip this row
    }

    // Sum up the values for the non-zero rows
    $tw1_sum += isset($row['id_realisasi_tw1']) ? $row['id_realisasi_tw1'] : 0;
    $tw2_sum += isset($row['id_realisasi_tw2']) ? $row['id_realisasi_tw2'] : 0;
    $tw3_sum += isset($row['id_realisasi_tw3']) ? $row['id_realisasi_tw3'] : 0;
    $tw4_sum += isset($row['id_realisasi_tw4']) ? $row['id_realisasi_tw4'] : 0;

    // Increment the count for valid rows
    $count++;
}
    $tw1_avg = $count > 0 ? (($tw1_sum / $count) / 85) * 100 : 0;
    $tw2_avg = $count > 0 ? (($tw2_sum / $count) / 85) * 100 : 0;
    $tw3_avg = $count > 0 ? (($tw3_sum / $count) / 85) * 100 : 0;
    $tw4_avg = $count > 0 ? (($tw4_sum / $count) / 85) * 100 : 0;
    return [
        'tw1_avg' => $tw1_avg,
        'tw1_real_avg' => $tw1_avg > 0 ? ($tw1_avg/85) * 100 : 0,
        'tw2_avg' => $tw2_avg,
        'tw2_real_avg' => $tw2_avg > 0 ? ($tw2_avg/85) * 100 : 0,
        'tw3_avg' => $tw3_avg,
        'tw3_real_avg' => $tw3_avg > 0 ? ($tw3_avg/85) * 100 : 0,
        'tw4_avg' => $tw4_avg,
        'tw4_real_avg' => $tw4_avg > 0 ? ($tw4_avg/85) * 100 : 0,
    ];
}
function computeAverages6($data) {
    $tw1_sum = $tw2_sum = $tw3_sum = $tw4_sum = 0;
    $count = 0;

    foreach ($data as $row) {
        if ((isset($row['id_realisasi_tw1']) && $row['id_realisasi_tw1'] == 0) && 
        (isset($row['id_realisasi_tw2']) && $row['id_realisasi_tw2'] == 0) && 
        (isset($row['id_realisasi_tw3']) && $row['id_realisasi_tw3'] == 0) && 
        (isset($row['id_realisasi_tw4']) && $row['id_realisasi_tw4'] == 0)) {
        continue;  // Skip this row
    }

    // Sum up the values for the non-zero rows
    $tw1_sum += isset($row['id_realisasi_tw1']) ? $row['id_realisasi_tw1'] : 0;
    $tw2_sum += isset($row['id_realisasi_tw2']) ? $row['id_realisasi_tw2'] : 0;
    $tw3_sum += isset($row['id_realisasi_tw3']) ? $row['id_realisasi_tw3'] : 0;
    $tw4_sum += isset($row['id_realisasi_tw4']) ? $row['id_realisasi_tw4'] : 0;

    // Increment the count for valid rows
    $count++;
}
    $tw1_avg = $count > 0 ? (($tw1_sum / $count) / 75) * 100 : 0;
    $tw2_avg = $count > 0 ? (($tw2_sum / $count) / 75) * 100 : 0;
    $tw3_avg = $count > 0 ? (($tw3_sum / $count) / 75) * 100 : 0;
    $tw4_avg = $count > 0 ? (($tw4_sum / $count) / 75) * 100 : 0;
    return [
        'tw1_avg' => $tw1_avg,
        'tw1_real_avg' => $tw1_avg > 0 ? ($tw1_avg/75) * 100 : 0,
        'tw2_avg' => $tw2_avg,
        'tw2_real_avg' => $tw2_avg > 0 ? ($tw2_avg/75) * 100 : 0,
        'tw3_avg' => $tw3_avg,
        'tw3_real_avg' => $tw3_avg > 0 ? ($tw3_avg/75) * 100 : 0,
        'tw4_avg' => $tw4_avg,
        'tw4_real_avg' => $tw4_avg > 0 ? ($tw4_avg/75) * 100 : 0,

    ];
}


// Function to render the averages
function renderAverages($data) {
    $averages = computeAverages1($data);
    echo "Persentase Rata -  rata Seluruh capaian Kinerja";
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>Triwulan</th><th>Rata-rata</th></tr></thead>";
    echo "<tbody>";
    echo "<tr><td>TW1</td><td>" . number_format($averages['tw1_avg'], 2) . "</td></tr>";
    echo "<tr><td>TW2</td><td>" . number_format($averages['tw2_avg'], 2) . "</td></tr>";
    echo "<tr><td>TW3</td><td>" . number_format($averages['tw3_avg'], 2) . "</td></tr>";
    echo "<tr><td>TW4</td><td>" . number_format($averages['tw4_avg'], 2) . "</td></tr>";
    echo "</tbody></table>";
}

function renderAverages2($data) {
    $averages = computeAverages($data);  // Menghitung rata-rata untuk setiap TW
    
    echo "<table class='table table-bordered'>";
    echo "<thead>";
    echo "<tr><th rowspan='2'>Sasaran Strategis</th><th>Target</th><th class='text-center' colspan='8'>Rata-rata Per Triwulan</th></tr>"; // Main header
    echo "<tr><th></th>
    <th data-tw='1'>TW1</th>
    <th data-tw='1'>Capaian TW1 Terhadap Target</th>
    <th data-tw='2'>TW2</th>
    <th data-tw='2'>Capaian TW2 Terhadap Target</th>
    <th data-tw='3'>TW3</th>
    <th data-tw='3'>Capaian TW3 Terhadap Target</th>
    <th data-tw='4'>TW4</th>
    <th data-tw='4'>Capaian TW4 Terhadap Target</th>
    </tr>"; // Sub-header
    echo "</thead>";
    
    echo "<tbody>";
    echo "<tr>";
    
    // Sasaran strategis dan target
    echo "<td>Indikator Kinerja Utama 1. Meningkatnya Profesionalisme Aparatur Kejaksaan RI</td>";
    echo "<td>90</td>"; // Target nilai
    
    // Nilai rata-rata untuk setiap triwulan dengan data-* untuk JavaScript
    echo "<td data-tw='1'>" . number_format($averages['tw1_avg'], 2) . "</td>";
    echo "<td data-tw='1'>" . number_format($averages['tw1_real_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages['tw2_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages['tw2_real_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages['tw3_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages['tw3_real_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages['tw4_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages['tw4_real_avg'], 2) . "</td>";
    echo "</tr>";
    echo "</tbody>";    
    echo "</table>";
}

function renderAverages3($data) {
    $averages = computeAverages($data);
    echo "<table class='table table-bordered'>";
    echo "<thead>";
    echo "<tr><th rowspan='2'>Sasaran Strategis</th><th>Target</th><th class='text-center' colspan='8'>Rata-rata Per Triwulan</th></tr>"; // Main header
    echo "<tr><th></th>
    <th data-tw='1'>TW1</th>
    <th data-tw='1'>Capaian TW1 Terhadap Target</th>
    <th data-tw='2'>TW2</th>
    <th data-tw='2'>Capaian TW2 Terhadap Target</th>
    <th data-tw='3'>TW3</th>
    <th data-tw='3'>Capaian TW3 Terhadap Target</th>
    <th data-tw='4'>TW4</th>
    <th data-tw='4'>Capaian TW4 Terhadap Target</th>
    </tr>"; // Sub-header
    echo "</thead>";
    
    // Render row for the specific Sasaran Strategis and the TW averages
    echo "<tbody>";
    echo "<tr>";
    echo "<td>Indikator Kinerja Utama 3. Terwujudnya Upaya Pencegahan Tindak Pidana Korupsi </td>"; // Description of the strategic goal
    echo "<td>90</td>";
    echo "<td data-tw='1'>" . number_format($averages['tw1_avg'], 2) . "</td>";
    echo "<td data-tw='1'>" . number_format($averages['tw1_real_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages['tw2_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages['tw2_real_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages['tw3_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages['tw3_real_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages['tw4_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages['tw4_real_avg'], 2) . "</td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
}
function renderAverages4($data) {
    $averages = computeAverages6($data);
    echo "<table class='table table-bordered'>";
    echo "<thead>";
    echo "<tr><th rowspan='2'>Sasaran Strategis</th><th>Target</th><th class='text-center' colspan='8'>Rata-rata Per Triwulan</th></tr>"; // Main header
    echo "<tr><th></th>
    <th data-tw='1'>TW1</th>
    <th data-tw='1'>Capaian TW1 Terhadap Target</th>
    <th data-tw='2'>TW2</th>
    <th data-tw='2'>Capaian TW2 Terhadap Target</th>
    <th data-tw='3'>TW3</th>
    <th data-tw='3'>Capaian TW3 Terhadap Target</th>
    <th data-tw='4'>TW4</th>
    <th data-tw='4'>Capaian TW4 Terhadap Target</th>
    </tr>"; // Sub-header
    echo "</thead>";
    
    // Render row for the specific Sasaran Strategis and the TW averages
    echo "<tbody>";
    echo "<tr>";
    echo "<td>Indikator Kinerja Utama 6. Terwujudnya Optimalisasi Kinerja Aparatur Kejaksaan </td>";
    echo "<td>75</td>"; // Description of the strategic goal
    echo "<td data-tw='1'>" . number_format($averages['tw1_avg'], 2) . "</td>";
    echo "<td data-tw='1'>" . number_format($averages['tw1_real_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages['tw2_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages['tw2_real_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages['tw3_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages['tw3_real_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages['tw4_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages['tw4_real_avg'], 2) . "</td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
}
// Function to render the averages for multiple parts
function renderAveragesForParts($part1, $part2, $part3) {
    $averages1 = computeAverages2($part1);
    $averages2 = computeAverages4($part2);
    $averages3 = computeAverages($part3);
    echo "<table class='table table-bordered'>";
    echo "<thead>";
    echo "<tr><th rowspan='2'>Sasaran Strategis</th><th>Target</th><th class='text-center' colspan='8'>Rata-rata Per Triwulan</th></tr>"; // Main header
    echo "<tr><th></th>
    <th data-tw='1'>TW1</th>
    <th data-tw='1'>Capaian TW1 Terhadap Target</th>
    <th data-tw='2'>TW2</th>
    <th data-tw='2'>Capaian TW2 Terhadap Target</th>
    <th data-tw='3'>TW3</th>
    <th data-tw='3'>Capaian TW3 Terhadap Target</th>
    <th data-tw='4'>TW4</th>
    <th data-tw='4'>Capaian TW4 Terhadap Target</th>
    </tr>"; // Sub-header
    echo "</thead>";
    
    // Render row for the specific Sasaran Strategis and the TW averages
    echo "<tbody>";
    echo "<tr>";
    echo "<td>Indikator Kinerja Utama 2.1 Persentase Nilai SPIP Kejaksaan RI </td>";
    echo "<td>100</td>"; // Description of the strategic goal
    echo "<td data-tw='1'>" . number_format($averages1['tw1_avg'], 2) . "</td>";
    echo "<td data-tw='1'>" . number_format($averages1['tw1_real_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages1['tw2_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages1['tw2_real_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages1['tw3_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages1['tw3_real_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages1['tw4_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages1['tw4_real_avg'], 2) . "</td>";
    echo "</tr>";
    "<tr>";
    echo "<td>Indikator Kinerja Utama 2.2 Persentase Nilai SAKIP Kejaksaan RI </td>"; // Description of the strategic goal
    echo "<td>95</td>"; 
    echo "<td data-tw='1'>" . number_format($averages2['tw1_avg'], 2) . "</td>";
    echo "<td data-tw='1'>" . number_format($averages2['tw1_real_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages2['tw2_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages2['tw2_real_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages2['tw3_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages2['tw3_real_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages2['tw4_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages2['tw4_real_avg'], 2) . "</td>";
    echo "</tr>";
    echo "</tbody>";
    "<tr>";
    echo "<td>Indikator Kinerja Utama 2.3 Persentase Berkurangnya Laporan Pengaduan Masyarakat terhadap Aparatur Kejaksaan RI </td>"; // Description of the strategic goal
    echo "<td>90</td>"; 
    echo "<td data-tw='1'>" . number_format($averages3['tw1_avg'], 2) . "</td>";
    echo "<td data-tw='1'>" . number_format($averages3['tw1_real_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages3['tw2_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages3['tw2_real_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages3['tw3_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages3['tw3_real_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages3['tw4_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages3['tw4_real_avg'], 2) . "</td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
}
function renderAveragesForParts2($part1, $part2) {
    $averages1 = computeAverages3($part1);
    $averages2 = computeAverages($part2);
    echo "<table class='table table-bordered'>";
    echo "<thead>";
    echo "<tr><th rowspan='2'>Sasaran Strategis</th><th>Target</th><th class='text-center' colspan='8'>Rata-rata Per Triwulan</th></tr>"; // Main header
    echo "<tr><th></th>
    <th data-tw='1'>TW1</th>
    <th data-tw='1'>Capaian TW1 Terhadap Target</th>
    <th data-tw='2'>TW2</th>
    <th data-tw='2'>Capaian TW2 Terhadap Target</th>
    <th data-tw='3'>TW3</th>
    <th data-tw='3'>Capaian TW3 Terhadap Target</th>
    <th data-tw='4'>TW4</th>
    <th data-tw='4'>Capaian TW4 Terhadap Target</th>
    </tr>"; // Sub-header
    echo "</thead>";
    
    // Render row for the specific Sasaran Strategis and the TW averages
    echo "<tbody>";
    echo "<tr>";
    echo "<td>Indikator Kinerja Utama 4.1 Persentase penyelesaian Perkara Tindak Pidana Umum yang mempunyai kekuatan hukum tetap dan telah dieksekusi </td>"; // Description of the strategic goal
    echo "<td>99</td>";
    echo "<td data-tw='1'>" . number_format($averages1['tw1_avg'], 2) . "</td>";
    echo "<td data-tw='1'>" . number_format($averages1['tw1_real_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages1['tw2_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages1['tw2_real_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages1['tw3_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages1['tw3_real_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages1['tw4_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages1['tw4_real_avg'], 2) . "</td>";
    echo "</tr>";
   echo "<tr>";
    echo "<td>Indikator Kinerja Utama 4.2 Persentase penyelesaian Perkara Tindak Pidana Khusus yang mempunyai kekuatan hukum tetap dan telah dieksekusi </td>"; // Description of the strategic goal
    echo '<td>90</td>';
    echo "<td data-tw='1'>" . number_format($averages2['tw1_avg'], 2) . "</td>";
    echo "<td data-tw='1'>" . number_format($averages2['tw1_real_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages2['tw2_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages2['tw2_real_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages2['tw3_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages2['tw3_real_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages2['tw4_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages2['tw4_real_avg'], 2) . "</td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
}
function renderAveragesForParts3($part1, $part2) {
    $averages1 = computeAverages5($part1);
    $averages2 = computeAverages5($part2);
    echo "<table class='table table-bordered'>";
    echo "<thead>";
    echo "<tr><th rowspan='2'>Sasaran Strategis</th><th>Target</th><th class='text-center' colspan='8'>Rata-rata Per Triwulan</th></tr>"; // Main header
    echo "<tr><th></th>
    <th data-tw='1'>TW1</th>
    <th data-tw='1'>Capaian TW1 Terhadap Target</th>
    <th data-tw='2'>TW2</th>
    <th data-tw='2'>Capaian TW2 Terhadap Target</th>
    <th data-tw='3'>TW3</th>
    <th data-tw='3'>Capaian TW3 Terhadap Target</th>
    <th data-tw='4'>TW4</th>
    <th data-tw='4'>Capaian TW4 Terhadap Target</th>
    </tr>"; // Sub-header
    echo "</thead>";
    
    // Render row for the specific Sasaran Strategis and the TW averages
    echo "<tbody>";
    echo "<tr>";
    echo "<td>Indikator Kinerja Utama 5.1 Persentase penyelamatan dan pengembalian kerugian negara melalui jalur pidana</td>"; // Description of the strategic goal
    echo '<td>85</td>';
    echo "<td data-tw='1'>" . number_format($averages1['tw1_avg'], 2) . "</td>";
    echo "<td data-tw='1'>" . number_format($averages1['tw1_real_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages1['tw2_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages1['tw2_real_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages1['tw3_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages1['tw3_real_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages1['tw4_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages1['tw4_real_avg'], 2) . "</td>";
    echo "</tr>";
    "<tr>";
    echo "<td>Indikator Kinerja Utama 5.2 Persentase penyelamatan dan pengembalian kerugian negara melalui jalur perdata</td>"; // Description of the strategic goal
    echo '<td>85</td>S';
    echo "<td data-tw='1'>" . number_format($averages2['tw1_avg'], 2) . "</td>";
    echo "<td data-tw='1'>" . number_format($averages2['tw1_real_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages2['tw2_avg'], 2) . "</td>";
    echo "<td data-tw='2'>" . number_format($averages2['tw2_real_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages2['tw3_avg'], 2) . "</td>";
    echo "<td data-tw='3'>" . number_format($averages2['tw3_real_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages2['tw4_avg'], 2) . "</td>";
    echo "<td data-tw='4'>" . number_format($averages2['tw4_real_avg'], 2) . "</td>";
    echo "</tr>";
    echo "</tbody>";
}
// Render averages for data_indikator2 and its parts


// Function to render a table for any dataset
// Fungsi untuk menampilkan tabel dengan data dari query
function renderTable($data, $tableId) {
    if (!empty($data)) {
        echo "<table id='$tableId' class='table table-bordered'>";
        echo "<thead>
            <tr>
                <th>ID Satker</th>
                <th>Satker Nama</th>
                <th>ID Tahun</th>
                <th>ID Indikator</th>
                <th>Indikator Nama</th>
                <th>Target</th>
                <th data-tw='1'>Realisasi TW1</th>
                <th data-tw='2'>Realisasi TW2</th>
                <th data-tw='3'>Realisasi TW3</th>
                <th data-tw='4'>Realisasi TW4</th>
                <th>Status Capaian</th>
            </tr>
        </thead>";
        echo "<tbody>";
        foreach ($data as $row) {
            // Perhitungan verifikasi pencapaian
            $tw1 = isset($row['id_realisasi_tw1']) ? $row['id_realisasi_tw1'] : 0;
            $tw2 = isset($row['id_realisasi_tw2']) ? $row['id_realisasi_tw2'] : 0;
            $tw3 = isset($row['id_realisasi_tw3']) ? $row['id_realisasi_tw3'] : 0;
            $tw4 = isset($row['id_realisasi_tw4']) ? $row['id_realisasi_tw4'] : 0;
            $target = isset($row['id_target']) ? $row['id_target'] : 0;

            $latestTW = max($tw1, $tw2, $tw3, $tw4);
            $verification = ($latestTW < $target) ? "Tidak Tercapai" : "Tercapai";
            $color = ($verification === "Tercapai") ? "green" : "red";    

            echo "<tr>";
            echo "<td>{$row['id_satker']}</td>";
            echo "<td>{$row['satkernama']}</td>";
            echo "<td>{$row['id_tahun']}</td>";
            echo "<td>{$row['id_indikator']}</td>";
            echo "<td>{$row['indikator_nama']}</td>";
            echo "<td>{$row['id_target']}</td>";
            echo "<td data-tw='1'>{$tw1}</td>";
            echo "<td data-tw='2'>{$tw2}</td>";
            echo "<td data-tw='3'>{$tw3}</td>";
            echo "<td data-tw='4'>{$tw4}</td>";
            echo "<td style='color: $color; font-weight: bold;'>{$verification}</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<table id='$tableId' class='data-table visually-hidden'>";
        echo "<tr><td colspan='10'>No data found.</td></tr></table>";
    }
}

function renderTable2($data, $tableId) {
    if (!empty($data)) {

        echo "<table id='$tableId' class='table table-bordered visually-hidden'>";
        echo "<thead>
            <tr>
                <th>Indikator Kinerja Utama (IKU)</th>
                <th>CAPAIAN TW1</th>
                <th>CAPAIAN TW2</th>
                <th>CAPAIAN TW3</th>
                <th>CAPAIAN TW4</th>
            </tr>
        </thead>";
        echo "<tbody>";
        foreach ($data as $row) {

            $tw1 = isset($row['id_realisasi_tw1']) ? $row['id_realisasi_tw1'] : 0;
            $tw2 = isset($row['id_realisasi_tw2']) ? $row['id_realisasi_tw2'] : 0;
            $tw3 = isset($row['id_realisasi_tw3']) ? $row['id_realisasi_tw3'] : 0;
            $tw4 = isset($row['id_realisasi_tw4']) ? $row['id_realisasi_tw4'] : 0;
            $target = isset($row['id_target']) ? $row['id_target'] : 0;

            // Determine the latest filled TW
            $latestTW = 0;
            if ($tw4 > 0) {
                $latestTW = $tw4;
            } elseif ($tw3 > 0) {
                $latestTW = $tw3;
            } elseif ($tw2 > 0) {
                $latestTW = $tw2;
            } elseif ($tw1 > 0) {
                $latestTW = $tw1;
            }
            echo "<tr>";
            echo "<td>Persentase aparatur Kejaksaan RI yang memiliki sertifikat kompentensi dan atau keahlian</td>";
            echo "<td>" . htmlspecialchars($row['id_realisasi_tw1']) . "</td>";
            echo "<td>" . htmlspecialchars($row['id_realisasi_tw2']) . "</td>";
            echo "<td>" . htmlspecialchars($row['id_realisasi_tw3']) . "</td>";
            echo "<td>" . htmlspecialchars($row['id_realisasi_tw4']) . "</td>";// New verification column with color
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<table id='$tableId' class='data-table visually-hidden'>";
        echo "<tr><td colspan='10'>No data found.</td></tr></table>";
    }
}
// Function to export data to Excel
function exportToExcel($data, $filename) {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    echo '<table border="1">';
    echo '<tr>
            <th>ID Satker</th>
            <th>Satker Nama</th>
            <th>ID Tahun</th>
            <th>ID Indikator</th>
            <th>Indikator Nama</th>
            <th>Target</th>';
    echo "<th data-tw='1'>Realisasi TW1</th>";
    echo"<th data-tw='2'>Realisasi TW2</th>";
    echo"<th data-tw='3'>Realisasi TW3</th>";
    echo"<th data-tw='4'>Realisasi TW4</th>";
    echo      '</tr>';

    // Loop through data and fill table rows
    foreach ($data as $entry) {
        echo '<tr>';
        echo '<td>' . $entry['id_satker'] . '</td>';
        echo '<td>' . $entry['satkernama'] . '</td>';
        echo '<td>' . $entry['id_tahun'] . '</td>';
        echo '<td>' . $entry['id_indikator'] . '</td>';
        echo '<td>' . $entry['indikator_nama'] . '</td>';
        echo '<td>' . $entry['id_target'] . '</td>';
        echo '<td>' . $entry['id_realisasi_tw1'] . '</td>';
        echo '<td>' . $entry['id_realisasi_tw2'] . '</td>';
        echo '<td>' . $entry['id_realisasi_tw3'] . '</td>';
        echo '<td>' . $entry['id_realisasi_tw4'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
    exit;
}

// Handle export request
if (isset($_GET['export']) && $_GET['export'] === 'excel') {
    $indicatorNumber = isset($_GET['indicator']) ? intval($_GET['indicator']) : 1;
    switch ($indicatorNumber) {
        case 1:
            exportToExcel($data_indikator1, 'Sasaran_Strategis_1.xls');
            break;
        case 2:
            exportToExcel($data_indikator2, 'Sasaran_Strategis_2.xls');
            break;
        case 3:
            exportToExcel($data_indikator3, 'Sasaran_Strategis_3.xls');
            break;
        case 4:
            exportToExcel($data_indikator4, 'Sasaran_Strategis_4.xls');
            break;
        case 5:
            exportToExcel($data_indikator5, 'Sasaran_Strategis_5.xls');
            break;
        case 6:
            exportToExcel($data_indikator6, 'Sasaran_Strategis_6.xls');
            break;
        default:
            echo "Invalid indicator selected";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Capaian SAKIP Kejaksaan RI</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src = "js/bootstrap.js"> </script>
    <script type="text/javascript" >
    document.addEventListener('DOMContentLoaded', function() {
    const rowsPerPage = 10;
    let currentPage = 1;

    // Fungsi untuk menampilkan tabel berdasarkan indikator yang dipilih
    function showTable(indikatorNumber) {
    console.log("Menampilkan tabel untuk indikator: ", indikatorNumber);
    const tables = document.querySelectorAll('.table-container');
    console.log("Total tabel ditemukan: ", tables.length);

    tables.forEach(table => {
        console.log("Menyembunyikan tabel: ", table.id);
        table.classList.add('visually-hidden');
    });

    const averages = document.querySelectorAll('.averages-container');
    averages.forEach(div => {
        console.log("Menyembunyikan averages: ", div.id);
        div.classList.add('visually-hidden');
    });

    const tableContainer = document.getElementById('table-container-' + indikatorNumber);
    if (tableContainer) {
        console.log("Menampilkan tabel container: ", tableContainer.id);
        tableContainer.classList.remove('visually-hidden');
    } else {
        console.error("Tabel dengan indikatorNumber tidak ditemukan: ", indikatorNumber);
    }

    const averagesContainer = document.getElementById('averages-container-' + indikatorNumber);
    if (averagesContainer) {
        console.log("Menampilkan averages container: ", averagesContainer.id);
        averagesContainer.classList.remove('visually-hidden');
    } else {
        console.error("Averages dengan indikatorNumber tidak ditemukan: ", indikatorNumber);
    }

    currentPage = 1;
    paginateTable(indikatorNumber);
}

    // Fungsi untuk paginasi tabel
    function paginateTable(indikatorNumber) {
    const table = document.getElementById('data_indikator' + indikatorNumber);
    if (!table) {
        console.error("Table not found for indikator " + indikatorNumber);
        return;
    }

    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    console.log("Total rows in table: ", rows.length);

    const totalRows = rows.length;
    const totalPages = Math.ceil(totalRows / rowsPerPage);
    console.log("Total pages: ", totalPages);

    const paginationContainer = document.querySelector('.pagination');
    paginationContainer.innerHTML = '';

    for (let i = 1; i <= totalPages; i++) {
        const button = document.createElement('button');
        button.innerText = i;
        button.onclick = () => changePage(indikatorNumber, i);
        if (i === currentPage) {
            button.classList.add('active');
        }
        paginationContainer.appendChild(button);
    }

    changePage(indikatorNumber, currentPage);
}


    // Fungsi untuk mengubah halaman saat paginasi
    function changePage(indikatorNumber, page) {
    console.log("Changing page to: ", page);
    const table = document.getElementById('data_indikator' + indikatorNumber);
    if (!table) {
        console.error("Table not found for indikator " + indikatorNumber);
        return;
    }

    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    console.log("Total rows to paginate: ", rows.length);

    // Hide all rows
    for (let i = 0; i < rows.length; i++) {
        rows[i].style.display = 'none';
    }

    // Show rows for the current page
    const start = (page - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    for (let i = start; i < end && i < rows.length; i++) {
        console.log("Showing row: ", i);
        rows[i].style.display = '';
    }

    // Update pagination buttons
    const paginationButtons = document.querySelectorAll('.pagination button');
    paginationButtons.forEach(button => button.classList.remove('active'));
    paginationButtons[page - 1].classList.add('active');
}


    // Fungsi untuk memfilter tampilan berdasarkan triwulan
    function filterAveragesByTW() {
        const selectedTW = document.getElementById('twFilter').value;
        const tableCells = document.querySelectorAll('td[data-tw], th[data-tw]');

        tableCells.forEach(cell => {
            if (selectedTW === 'all' || cell.getAttribute('data-tw') === selectedTW) {
                cell.style.display = '';
            } else {
                cell.style.display = 'none';
            }
        });
    }

    // Fungsi untuk mengekspor tabel ke Excel
    function exportToExcel(indicatorNumber) {
        window.location.href = '?export=excel&indicator=' + indicatorNumber;
    }

    // Pastikan tombol-tombol yang terkait dengan menampilkan tabel dan paginasi bekerja
    document.querySelector('.btn-container').addEventListener('click', function(event) {
        if (event.target.matches('button')) {
            const indikatorNumber = event.target.getAttribute('onclick').match(/\d+/)[0];
            showTable(indikatorNumber);
        }
    });

    // Event listener untuk memfilter rata-rata berdasarkan TW
    document.getElementById('twFilter').addEventListener('change', filterAveragesByTW);
});


    </script>
</head>
<body>

<div class="container-sm">

<h2 class = "text-center">Data Capaian Kinerja Sasaran Strategis Kejaksaan RI</h2>

<div class="btn-container row align-items-center">
    <button class="btn btn-primary col m-2 " onclick="showTable(1)">Sasaran Strategis 1</button>
    <button class="btn btn-primary col m-2" onclick="showTable(2)">Sasaran Strategis 2</button>
    <button class="btn btn-primary col m-2" onclick="showTable(3)">Sasaran Strategis 3</button>
    <button class="btn btn-primary col m-2" onclick="showTable(4)">Sasaran Strategis 4</button>
    <button class="btn btn-primary col m-2" onclick="showTable(5)">Sasaran Strategis 5</button>
    <button class="btn btn-primary col m-2" onclick="showTable(6)">Sasaran Strategis 6</button>
</div>
<div class="btn-container row align-items-center">
    <button class="btn btn-success col m-2" onclick="exportToExcel(1)">Export Sasaran Strategis 1</button>
    <button class="btn btn-success col m-2" onclick="exportToExcel(2)">Export Sasaran Strategis 2</button>
    <button class="btn btn-success col m-2" onclick="exportToExcel(3)">Export Sasaran Strategis 3</button>
    <button class="btn btn-success col m-2" onclick="exportToExcel(4)">Export Sasaran Strategis 4</button>
    <button class="btn btn-success col m-2" onclick="exportToExcel(5)">Export Sasaran Strategis 5</button>
    <button class="btn btn-success col m-2" onclick="exportToExcel(6)">Export Sasaran Strategis 6</button>
</div>
<!-- Dropdown for selecting Triwulan -->
<div class="dropdown mb-3">
    <label for="twFilter">Pilih Triwulan:</label>
    <select id="twFilter" class="form-select" onchange="filterAveragesByTW()">
        <option value="all">Semua Triwulan</option>
        <option value="1">Triwulan 1 (TW1)</option>
        <option value="2">Triwulan 2 (TW2)</option>
        <option value="3">Triwulan 3 (TW3)</option>
        <option value="4">Triwulan 4 (TW4)</option>
    </select>
</div>
<!-- Render averages for each indicator -->

<!-- Table and averages for each indicator -->
<div class="averages-container visually-hidden" id="averages-container-1">
        
        <?php renderAverages2($data_indikator1); ?>
    </div>

<div class="table-container visually-hidden" id="table-container-1">
        <?php renderTable($data_indikator1, 'data_indikator1'); ?>
        <?php renderAverages($data_indikator1); ?>
    </div>
    
<div class="averages-container visually-hidden" id="averages-container-2">

        <?php renderAveragesForParts($data_indikator2_part1, $data_indikator2_part2, $data_indikator2_part3); ?>
</div>

<div class="table-container visually-hidden" id="table-container-2">
        <?php renderTable($data_indikator2, 'data_indikator2'); ?>
        <?php renderAverages($data_indikator2); ?>
</div>

<div class="averages-container visually-hidden" id="averages-container-3">

<?php renderAverages3($data_indikator3); ?>
</div>
<div class="table-container visually-hidden" id="table-container-3">
        <?php renderTable($data_indikator3, 'data_indikator3'); ?>
        <?php renderAverages($data_indikator3); ?>
</div>

<div class="averages-container visually-hidden" id="averages-container-4">

<?php renderAveragesForParts2($data_indikator4_part1, $data_indikator4_part2); ?>
</div>
<div class="table-container visually-hidden" id="table-container-4" >
        <?php renderTable($data_indikator4, 'data_indikator4'); ?>
        <?php renderAverages($data_indikator4); ?>
</div>

<div class="averages-container visually-hidden" id="averages-container-5">

<?php renderAveragesForParts3($data_indikator5_part1, $data_indikator5_part2); ?>
</div>
<div class="table-container visually-hidden" id="table-container-5" >
        <?php renderTable($data_indikator5, 'data_indikator5'); ?>
        <?php renderAverages($data_indikator5); ?>
</div>

<div class="averages-container visually-hidden" id="averages-container-6">

<?php renderAverages4($data_indikator6); ?>
</div>
<div class="table-container visually-hidden" id="table-container-6" >
        <?php renderTable($data_indikator6, 'data_indikator6'); ?>
        <?php renderAverages($data_indikator6); ?>
</div>
<div class="container visually-hidden" id="averages6">

</div>
<!-- Pagination Controls -->
<div class="pagination m-1"></div>

</div>
</body>
</html>
<?php

} else {
    // Jika bukan 'menpanrb', redirect ke halaman error atau halaman lain
    header("Location: unauthorized.php");
    exit();
}
} else {
// Jika tidak ada hasil, session tidak valid
header("Location: index.php?error=invalid_session");
exit();
}

// Tutup statement
mysqli_stmt_close($stmt);
} else {
echo "Error preparing statement: " . mysqli_error($link);
}

// Tutup koneksi database utama
mysqli_close($link);
} else {
header("Location: index.php?error=invalid_session");
exit();
}
?>