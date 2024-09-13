<?php
session_start();
include("mr.db.php");

$records_per_page = 10; // Define how many records to show per page

if (isset($_SESSION['ID']) && isset($_SESSION['Pass'])) {
    $link = mysqli_connect($server, $username, $password, $database);
    if (!$link) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $session_id = $_SESSION['ID'];
    $session_pass = $_SESSION['Pass'];

    // Mengecek apakah sesi valid
    $query = "SELECT id_satker, satkerkey FROM sinori_login WHERE id_satker = ? AND satkerkey = ?";
    $stmt = mysqli_prepare($link, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $session_id, $session_pass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_satker, $satkerkey);

        if (mysqli_stmt_fetch($stmt)) {
            // Ambil id_satker dari URL
            if (isset($_GET['id_satker'])) {
                $id_satker_url = $_GET['id_satker'];

                // Pagination setup
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $records_per_page;

                // Query untuk mengambil detail dari id_satker yang dikirimkan dengan limit untuk pagination
                $query = "SELECT sl.id_satker, sl.satkernama, pk.*, sb.id AS sb_id, sb.bidang_nama, sp.id AS sp_id, sp.saspro_nama, ik.id AS ik_id, ik.indikator_nama 
                          FROM sinori_login sl
                          LEFT JOIN sinori_sakip_penetapan pk ON sl.id_satker = pk.id_satker
                          LEFT JOIN sinori_sakip_bidang sb ON pk.id_bidang = sb.id
                          LEFT JOIN sinori_sakip_saspro sp ON pk.id_saspro = sp.id
                          LEFT JOIN sinori_sakip_indikator ik ON pk.id_indikator = ik.id
                          WHERE sl.id_satker = $id_satker_url
                          LIMIT ? OFFSET ?";

                $stmt_detil = mysqli_prepare($link, $query);
                mysqli_stmt_bind_param($stmt_detil, "sii", $id_satker_url, $records_per_page, $offset);
                mysqli_stmt_execute($stmt_detil);
                $result = mysqli_stmt_get_result($stmt_detil);

                // Query to get total records for pagination
                $query_count = "SELECT COUNT(*) as total FROM sinori_login sl WHERE sl.id_satker = ?";
                $stmt_count = mysqli_prepare($link, $query_count);
                mysqli_stmt_bind_param($stmt_count, "s", $id_satker_url);
                mysqli_stmt_execute($stmt_count);
                $result_count = mysqli_stmt_get_result($stmt_count);
                $row_count = mysqli_fetch_assoc($result_count);
                $total_records = $row_count['total'];
                $total_pages = ceil($total_records / $records_per_page);

                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Detail Satker</title>
                    <style>
                        table {
                            border-collapse: collapse;
                            width: 100%;
                        }
                        table, th, td {
                            border: 1px solid black;
                            padding: 8px;
                            text-align: left;
                        }
                        th {
                            background-color: #f2f2f2;
                        }
                        .pagination {
                            margin-top: 20px;
                        }
                        .pagination a {
                            margin: 0 5px;
                            padding: 8px 16px;
                            text-decoration: none;
                            border: 1px solid #ddd;
                            color: black;
                        }
                        .pagination a.active {
                            background-color: #4CAF50;
                            color: white;
                            border: 1px solid #4CAF50;
                        }
                        .pagination a:hover {
                            background-color: #ddd;
                        }
                    </style>
                </head>
                <body>

                <h1>Detail Satker: <?php echo htmlspecialchars($row['satkernama']); ?></h1>
                <table>
                    <tr>
                        <th>Bidang</th>
                        <th>Sasaran Program</th>
                        <th>Indikator</th>
                        <th>Status PK Approved</th>
                        <th>Status Otentikasi TW1</th>
                        <th>Status Otentikasi TW2</th>
                        <th>Status Otentikasi TW3</th>
                        <th>Status Otentikasi TW4</th>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['bidang_nama']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['saspro_nama']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['indikator_nama']) . "</td>";
                        echo "<td>" . ($row['id_approved'] ? 'Approved' : 'Belum Approved') . "</td>";
                        echo "<td>" . ($row['id_otentikasi_tw1'] ? 'Otentikasi Selesai' : 'Belum Otentikasi') . "</td>";
                        echo "<td>" . ($row['id_otentikasi_tw2'] ? 'Otentikasi Selesai' : 'Belum Otentikasi') . "</td>";
                        echo "<td>" . ($row['id_otentikasi_tw3'] ? 'Otentikasi Selesai' : 'Belum Otentikasi') . "</td>";
                        echo "<td>" . ($row['id_otentikasi_tw4'] ? 'Otentikasi Selesai' : 'Belum Otentikasi') . "</td>";
                        echo "</tr>";
                    }
                    ?>

                </table>

                <!-- Pagination -->
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?id_satker=<?php echo $id_satker_url; ?>&page=<?php echo $page - 1; ?>">&laquo; Prev</a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <a href="?id_satker=<?php echo $id_satker_url; ?>&page=<?php echo $i; ?>"
                           class="<?php if ($i == $page) echo 'active'; ?>"><?php echo $i; ?></a>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages): ?>
                        <a href="?id_satker=<?php echo $id_satker_url; ?>&page=<?php echo $page + 1; ?>">Next &raquo;</a>
                    <?php endif; ?>
                </div>

                </body>
                </html>
                <?php

                mysqli_stmt_close($stmt_detil);
            } else {
                echo "ID Satker tidak ditemukan di URL.";
            }
        } else {
            echo "Session tidak valid.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($link);
    }
} else {
    header("Location: index.php?error=invalid_session");
    exit();
}

mysqli_close($link);
?>
