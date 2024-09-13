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

    // Mengecek apakah sesi valid
    $query = "SELECT id_satker, satkerkey FROM sinori_login WHERE id_satker = ? AND satkerkey = ?";
    $stmt = mysqli_prepare($link, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $session_id, $session_pass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_satker, $satkerkey);

        if (mysqli_stmt_fetch($stmt)) {
            if ($session_id == 'menpanrb' || $session_id == '888881') {
                $db = mysqli_connect($server, $username, $password, $database);

                // Query untuk mengambil data dengan LEFT JOIN
                $query = "SELECT 
                        sl.id_satker, 
                        sl.satkernama,
                        pk.id_approved,
                        pk.id_otentikasi_tw1,
                        pk.id_otentikasi_tw2,
                        pk.id_otentikasi_tw3,
                        pk.id_otentikasi_tw4,
                        kep.id_filesurat AS kep_filesurat,
                        renstra.id_satker AS renstra_satker,
                        renja.id_satker AS renja_satker,
                        pk.id_satker AS pk_satker,
                        iku.id_satker AS iku_satker,
                        dipa.id_satker AS dipa_satker,
                        renaksi.id_satker AS renaksi_satker,
                        lkjip.id_satker AS lkjip_satker
                    FROM sinori_login sl
                    LEFT JOIN sinori_sakip_keputusan kep ON sl.id_satker = kep.id_satker
                    LEFT JOIN sinori_sakip_renstra renstra ON sl.id_satker = renstra.id_satker
                    LEFT JOIN sinori_sakip_renja renja ON sl.id_satker = renja.id_satker
                    LEFT JOIN sinori_sakip_penetapan pk ON sl.id_satker = pk.id_satker
                    LEFT JOIN sinori_sakip_iku iku ON sl.id_satker = iku.id_satker
                    LEFT JOIN sinori_sakip_dipa dipa ON sl.id_satker = dipa.id_satker
                    LEFT JOIN sinori_sakip_renaksi renaksi ON sl.id_satker = renaksi.id_satker
                    LEFT JOIN sinori_sakip_lakip lkjip ON sl.id_satker = lkjip.id_satker
                    WHERE sl.id_hidesatker = '0'
                    GROUP BY sl.id_satker
                    ORDER BY sl.id_satker ASC";

                $result = mysqli_query($db, $query);
                $data = [];

                // Mengisi array data dengan status capaian kinerja
                while ($row = mysqli_fetch_assoc($result)) {
                    if($row['id_approved'] != "0"){
                        if ($row['id_otentikasi_tw4'] != '0') {
                            $status_capaian_kinerja = 'Sudah otentikasi sampai TW4';
                        } elseif ($row['id_otentikasi_tw3'] != '0') {
                            $status_capaian_kinerja = 'Sudah otentikasi sampai TW3';
                        } elseif ($row['id_otentikasi_tw2'] != '0') {
                            $status_capaian_kinerja = 'Sudah otentikasi sampai TW2';
                        } elseif ($row['id_otentikasi_tw1'] != '0') {
                            $status_capaian_kinerja = 'Sudah otentikasi sampai TW1';
                        } else {
                            $status_capaian_kinerja = 'PK sudah diapprove';
                        }
                    } else {
                        $status_capaian_kinerja = 'Belum diapprove PK';
                    }
                    $row['status_capaian_kinerja'] = $status_capaian_kinerja;
                    $data[] = $row;
                }

                mysqli_free_result($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rencana Kinerja Seluruh Satuan Kerja Kejaksaan RI</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
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
    <div class="container">
        <h2 class="text-center mt-4">Data Rencana Kinerja Satuan Kerja Kejaksaan RI</h2>

        <!-- Search Input -->
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" id="search-input" class="form-control" placeholder="Cari berdasarkan ID atau Nama Satker" oninput="filterData()">
            </div>
            <div class="col-md-6">
                <!-- Filter dropdown -->
                <select id="filter-input" class="form-control" onchange="filterData()">
                    <option value="">Tampilkan Semua</option>
                    <option value="withKep">Dengan Keputusan</option>
                    <option value="withoutKep">Tanpa Keputusan</option>
                </select>
            </div>
        </div>

        <!-- Table -->
        <table class="table table-bordered mt-4 table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th class='text-center'>ID Satker</th>
                    <th class='text-center'>Nama Satker</th>
                    <th class='text-center'>Keputusan</th>
                    <th class='text-center'>Renstra</th>
                    <th class='text-center'>Renja</th>
                    <th class='text-center'>Perjanjian Kinerja</th>
                    <th class='text-center'>Status Capaian Kinerja</th>
                    <th class='text-center'>IKU</th>
                    <th class='text-center'>DPA</th>
                    <th class='text-center'>Ren Aksi</th>
                    <th class='text-center'>LKjIP</th>
                </tr>
            </thead>
            <tbody id="table-body"></tbody>
        </table>

        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center" id="pagination"></ul>
        </nav>
    </div>

    <script>
        // Data yang dihasilkan oleh PHP
        const data = <?php echo json_encode($data); ?>;
        const rowsPerPage = 10; // Jumlah data per halaman
        let currentPage = 1;
        let filteredData = data; // Data setelah search/filter

        // Fungsi untuk menampilkan data pada tabel
        function displayTable(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const paginatedData = filteredData.slice(start, end);

            const tableBody = document.getElementById('table-body');
            tableBody.innerHTML = ''; // Bersihkan tabel sebelumnya

            paginatedData.forEach((row, index) => {
                const tableRow = `
                    <tr>
                        <td>${start + index + 1}</td>
                        <td>${row.id_satker}</td>
                        <td>${row.satkernama.replace('_', ' ')}</td>
                        <td class='text-center'>${row.kep_filesurat ? `<a href='KEP/${row.kep_filesurat}' target='_blank'><img src='images/centang.png' width='30' height='30'></a>` : '-'}</td>
                        <td class='text-center'>${row.renstra_satker ? `<a href='view.php?satker=${row.id_satker}&do=renstra' target='_blank'><img src='images/centang.png' width='30' height='30'></a>` : '-'}</td>
                        <td class='text-center'>${row.renja_satker ? `<a href='view.php?satker=${row.id_satker}&do=renja' target='_blank'><img src='images/centang.png' width='30' height='30'></a>` : '-'}</td>
                        <td class='text-center'>${row.pk_satker ? `<a href='view.php?satker=${row.id_satker}&do=pk' target='_blank'><img src='images/centang.png' width='30' height='30'></a>` : '-'}</td>
                        <td class='text-center'><a href='list_satker_detil.php?id_satker=${row.id_satker}'>${row.status_capaian_kinerja}</a></td>
                        <td class='text-center'>${row.iku_satker ? `<a href='view.php?satker=${row.id_satker}&do=iku' target='_blank'><img src='images/centang.png' width='30' height='30'></a>` : '-'}</td>
                        <td class='text-center'>${row.dipa_satker ? `<a href='view.php?satker=${row.id_satker}&do=dipa' target='_blank'><img src='images/centang.png' width='30' height='30'></a>` : '-'}</td>
                        <td class='text-center'>${row.renaksi_satker ? `<a href='view.php?satker=${row.id_satker}&do=renaksi' target='_blank'><img src='images/centang.png' width='30' height='30'></a>` : '-'}</td>
                        <td class='text-center'>${row.lkjip_satker ? `<a href='view.php?satker=${row.id_satker}&do=lkjip' target='_blank'><img src='images/centang.png' width='30' height='30'></a>` : '-'}</td>
                    </tr>
                `;
                tableBody.innerHTML += tableRow;
            });

            // Update pagination links
            updatePagination();
        }

        // Fungsi untuk memperbarui pagination
        function updatePagination() {
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = ''; // Bersihkan pagination sebelumnya

            const totalPages = Math.ceil(filteredData.length / rowsPerPage);
            const maxPagesToShow = 3; // Menampilkan maksimal 3 halaman di sekitar halaman aktif

            let startPage = Math.max(currentPage - Math.floor(maxPagesToShow / 2), 1);
            let endPage = Math.min(startPage + maxPagesToShow - 1, totalPages);

            if (endPage - startPage + 1 < maxPagesToShow) {
                startPage = Math.max(endPage - maxPagesToShow + 1, 1);
            }

            // Tombol sebelumnya
            if (currentPage > 1) {
                pagination.innerHTML += `<li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="changePage(${currentPage - 1})">Previous</a></li>`;
            }

            // Menampilkan nomor halaman
            for (let i = startPage; i <= endPage; i++) {
                pagination.innerHTML += `
                    <li class="page-item ${i === currentPage ? 'active' : ''}">
                        <a class="page-link" href="javascript:void(0);" onclick="changePage(${i})">${i}</a>
                    </li>
                `;
            }

            // Tombol berikutnya
            if (currentPage < totalPages) {
                pagination.innerHTML += `<li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="changePage(${currentPage + 1})">Next</a></li>`;
            }
        }

        // Fungsi untuk mengganti halaman
        function changePage(page) {
            currentPage = page;
            displayTable(page);
        }

        // Fungsi untuk mencari dan memfilter data
        function filterData() {
            const searchValue = document.getElementById('search-input').value.toLowerCase();
            const filterValue = document.getElementById('filter-input').value;

            // Filter berdasarkan search dan filter dropdown
            filteredData = data.filter(row => {
                const matchesSearch = row.id_satker.toLowerCase().includes(searchValue) || row.satkernama.toLowerCase().includes(searchValue);
                
                const matchesFilter = (filterValue === '') || 
                                      (filterValue === 'withKep' && row.kep_filesurat) || 
                                      (filterValue === 'withoutKep' && !row.kep_filesurat);

                return matchesSearch && matchesFilter;
            });

            // Reset ke halaman 1 setiap kali ada pencarian atau filter baru
            currentPage = 1;
            displayTable(currentPage);
        }

        // Tampilkan tabel pertama kali
        displayTable(currentPage);
    </script>
</body>
</html>


<?php
                mysqli_close($link);

            } else {
                header("Location: unauthorized.php");
                exit();
            }
        } else {
            header("Location: index.php?error=invalid_session");
            exit();
        }
    } else {
        echo "Error preparing statement: " . mysqli_error($link);
    }
} else {
    header("Location: index.php?error=invalid_session");
    exit();
}
?>
