<?php
session_start();
include("mr.db.php");

if (isset($_SESSION['ID']) && isset($_SESSION['Pass'])) {
    $link = mysqli_connect($server, $username, $password, $database);
    if (!$link) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    $session_id = $_SESSION['ID'];
    $session_pass = $_SESSION['Pass'];

    // Check if the session is valid
    $query = "SELECT id_satker, satkerkey FROM sinori_login WHERE id_satker = ? AND satkerkey = ?";
    $stmt = mysqli_prepare($link, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $session_id, $session_pass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_satker, $satkerkey);

        if (mysqli_stmt_fetch($stmt)) {
            // We have fetched the results from the session query, so now we close the statement
            mysqli_stmt_close($stmt);

            // Get id_satker from URL
            if (isset($_GET['id_satker'])) {
                $id_satker_url = $_GET['id_satker'];

                // Query to fetch details for the given id_satker (without pagination)
                $query = "SELECT sl.id_satker, sl.satkernama, pk.id_approved, pk.id_target, pk.id_otentikasi_tw1,
                                pk.id_otentikasi_tw2, pk.id_otentikasi_tw3, pk.id_otentikasi_tw4,
                                pk.id_realisasi_tw1, pk.id_realisasi_tw2, pk.id_realisasi_tw3, pk.id_realisasi_tw4, 
                                sb.bidang_nama, sp.saspro_nama, ik.indikator_nama
                          FROM sinori_login sl
                          LEFT JOIN sinori_sakip_penetapan pk ON sl.id_satker = pk.id_satker
                          LEFT JOIN sinori_sakip_bidang sb ON pk.id_bidang = sb.id
                          LEFT JOIN sinori_sakip_saspro sp ON pk.id_saspro = sp.id
                          LEFT JOIN sinori_sakip_indikator ik ON pk.id_indikator = ik.id
                          WHERE sl.id_satker = ?";

                $stmt_detil = mysqli_prepare($link, $query);
                if ($stmt_detil) {
                    mysqli_stmt_bind_param($stmt_detil, "s", $id_satker_url);
                    mysqli_stmt_execute($stmt_detil);
                    mysqli_stmt_bind_result($stmt_detil, $id_satker, $satkernama, $id_approved, $id_target,
                        $id_otentikasi_tw1, $id_otentikasi_tw2, $id_otentikasi_tw3, $id_otentikasi_tw4, $id_realisasi_tw1,
                        $id_realisasi_tw2, $id_realisasi_tw3, $id_realisasi_tw4,
                        $bidang_nama, $saspro_nama, $indikator_nama);
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                    <link href="css/bootstrap.min.css" rel="stylesheet">
                    <script src = "js/bootstrap.bundle.min.js"> </script>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Detail Satker</title>
                        
                    </head>
                    <body>
                    <nav class="navbar navbar-light bg-warning-subtle mb-2 p-1 nav">
                        <div class="container">
                            <a class="navbar-brand">
                                <img src="images/logo_kejaksaan.png" alt="Logo Kejaksaan RI" width="50" class="d-inline-block align-text-top"/>
                                     Serenata AKIP Kejaksaan RI 
                            </a>
                            <a class="nav-link btn-info active" href="index.logout.php?g=proses6&i=mr&session=<?PHP echo $session_pass; ?>&idsatker=<?PHP echo $session_id; ?>">Logout</a>
                        </div>
                    </nav>
                    <div class='container m-2 p-2 align-items-center'>

                    <?php if (mysqli_stmt_fetch($stmt_detil)): ?>
                        <h1 class='text-center'>Detail Satker</h1>
                        <table class='table table-bordered table'>
                            <tr>
                                <th>Bidang</th>
                                <th>Sasaran Program</th>
                                <th>Indikator</th>
                                <th>Target</th>
                                <th>Status Realisasi TW1</th>
                                <th>Status Realisasi TW2</th>
                                <th>Status Realisasi TW3</th>
                                <th>Status Realisasi TW4</th>
                            </tr>
                            <?php
                            do {
                                echo "<tr>";
                                echo "<td class = 'text-center'>" . htmlspecialchars($bidang_nama) . "</td>";
                                echo "<td class = 'text-center'>" . htmlspecialchars($saspro_nama) . "</td>";
                                echo "<td class = 'text-center'>" . htmlspecialchars($indikator_nama) . "</td>";
                                echo "<td class = 'text-center'>" . htmlspecialchars($id_target) . "</td>";
                                echo "<td class = 'text-center'>" . htmlspecialchars($id_realisasi_tw1) . "</td>";
                                echo "<td class = 'text-center'>" . htmlspecialchars($id_realisasi_tw2) . "</td>";
                                echo "<td class = 'text-center'>" . htmlspecialchars($id_realisasi_tw3) . "</td>";
                                echo "<td class = 'text-center'>" . htmlspecialchars($id_realisasi_tw4) . "</td>";
                                echo "</tr>";
                            } while (mysqli_stmt_fetch($stmt_detil));
                            ?>
                        </table>
                    <?php else: ?>
                        <p>No records found for Satker ID: <?php echo htmlspecialchars($id_satker_url); ?></p>
                    <?php endif; ?>
                    </div>
                    </body>
                    </html>
                    <?php

                    mysqli_stmt_close($stmt_detil); // Close the detail statement once done
                } else {
                    echo "Error preparing detail query: " . mysqli_error($link);
                }
            } else {
                echo "ID Satker not found in URL.";
            }
        } else {
            echo "Invalid session.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing session validation query: " . mysqli_error($link);
    }
} else {
    header("Location: index.php?error=invalid_session");
    exit();
}
mysqli_close($link);
