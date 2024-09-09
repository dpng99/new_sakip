<?php
include 'C:\xampp\htdocs\new_sakip\sakip\mr.db.php'; 

// Database connection
$db = mysqli_connect("$server", "$username", "$password", "$database") or die(mysqli_error($db));

// Query to get data satker
$query = "
    SELECT sl.id_satker, sl.id_kejati, sl.id_kejari, sl.satkernama, sl.id_level, sl.id_sakip_level,
           sp.id_tahun, sp.id_bidang, sp.id_saspro, sp.id_indikator, sp.id_target, 
           sp.id_realisasi_tw1, sp.id_realisasi_tw2, sp.id_realisasi_tw3, sp.id_realisasi_tw4,
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

// Arrays to store data
$data_indikator1 = array();
$data_indikator2 = array();
$data_indikator3 = array();
$data_indikator4 = array();
$data_indikator5 = array();
$data_indikator6 = array();

// Process query results
while ($hasil1 = mysqli_fetch_array($hmpun_stker, MYSQLI_ASSOC)) {
    if ($hasil1['id_sakip_level'] == '1') {
        if (in_array($hasil1['id_indikator'], [1, 2, 3, 4, 5, 56, 59])) {
            $data_indikator1[] = $hasil1;
        } elseif (in_array($hasil1['id_indikator'], [7, 9, 39, 68, 71, 91])) {
            $data_indikator6[] = $hasil1;
        }

    } elseif ($hasil1['id_sakip_level'] == '2') {
        if (in_array($hasil1['id_indikator'], [6, 8, 10, 53, 54, 55, 60, 61, 62, 69, 70, 72, 77, 78, 79, 80, 82, 83, 84, 85, 86, 87, 88, 89, 90, 92])) {
            $data_indikator2[] = $hasil1;
        } elseif (in_array($hasil1['id_indikator'], [15, 16, 17, 18, 19, 20, 21, 44, 57, 58, 63, 73, 74, 75, 76])) {
            $data_indikator3[] = $hasil1;
        } elseif (in_array($hasil1['id_indikator'], [22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 35, 36, 37, 38, 45, 46, 47, 48, 49, 50, 51, 64, 65])) {
            $data_indikator4[] = $hasil1;
        } elseif (in_array($hasil1['id_indikator'], [11, 12, 13, 14, 34, 40, 41, 42, 43, 52, 66, 67])) {
            $data_indikator5[] = $hasil1;
        }
    }
}

// Close the database connection
mysqli_close($db);

// Function to compute averages
function computeAverages($data) {
    $tw1_sum = $tw2_sum = $tw3_sum = $tw4_sum = 0;
    $count = count($data);

    foreach ($data as $row) {
        $tw1_sum += $row['id_realisasi_tw1'] ?? 0;
        $tw2_sum += $row['id_realisasi_tw2'] ?? 0;
        $tw3_sum += $row['id_realisasi_tw3'] ?? 0;
        $tw4_sum += $row['id_realisasi_tw4'] ?? 0;
    }

    return [
        'tw1_avg' => $count > 0 ? $tw1_sum / $count : 0,
        'tw2_avg' => $count > 0 ? $tw2_sum / $count : 0,
        'tw3_avg' => $count > 0 ? $tw3_sum / $count : 0,
        'tw4_avg' => $count > 0 ? $tw4_sum / $count : 0,
    ];
}

// Function to render the averages
function renderAverages($data) {
    $averages = computeAverages($data);
    echo "<div><strong>Average for TW1:</strong> " . number_format($averages['tw1_avg'], 2) . "</div>";
    echo "<div><strong>Average for TW2:</strong> " . number_format($averages['tw2_avg'], 2) . "</div>";
    echo "<div><strong>Average for TW3:</strong> " . number_format($averages['tw3_avg'], 2) . "</div>";
    echo "<div><strong>Average for TW4:</strong> " . number_format($averages['tw4_avg'], 2) . "</div>";
}

// Function to render a table for any dataset
function renderTable($data, $tableId) {
    if (!empty($data)) {
        echo "<table id='$tableId' class='data-table hidden'>";
        echo "<thead>
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
        </thead>";
        echo "<tbody>";
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id_satker']) . "</td>";
            echo "<td>" . htmlspecialchars($row['satkernama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['id_tahun']) . "</td>";
            echo "<td>" . htmlspecialchars($row['id_indikator']) . "</td>";
            echo "<td>" . htmlspecialchars($row['indikator_nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['id_target']) . "</td>";
            echo "<td>" . htmlspecialchars($row['id_realisasi_tw1']) . "</td>";
            echo "<td>" . htmlspecialchars($row['id_realisasi_tw2']) . "</td>";
            echo "<td>" . htmlspecialchars($row['id_realisasi_tw3']) . "</td>";
            echo "<td>" . htmlspecialchars($row['id_realisasi_tw4']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<table id='$tableId' class='data-table hidden'>";
        echo "<tr><td colspan='10'>No data found.</td></tr></table>";
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
        .hidden {
            display: none;
        }
        .btn-container {
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .pagination {
            margin: 20px 0;
            display: flex;
            justify-content: center;
        }
        .pagination button {
            padding: 10px;
            margin: 0 5px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .pagination button.disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        .averages-container {
            margin-top: 20px;
        }
    </style>
    <script>
        const rowsPerPage = 10;
        let currentPage = 1;

        function showTable(indikatorNumber) {
            const tables = document.querySelectorAll('.data-table');
            tables.forEach(table => table.classList.add('hidden'));
            document.getElementById('data_indikator' + indikatorNumber).classList.remove('hidden');
            currentPage = 1; // Reset page when switching tables
            paginateTable(indikatorNumber);
            
            // Show averages for the selected table
            document.querySelectorAll('.averages-container').forEach(div => div.classList.add('hidden'));
            document.getElementById('averages' + indikatorNumber).classList.remove('hidden');
        }

        function paginateTable(indikatorNumber) {
            const table = document.getElementById('data_indikator' + indikatorNumber);
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            const totalRows = rows.length;
            const totalPages = Math.ceil(totalRows / rowsPerPage);

            const paginationContainer = document.querySelector('.pagination');
            paginationContainer.innerHTML = '';

            for (let i = 0; i < totalPages; i++) {
                const button = document.createElement('button');
                button.innerText = i + 1;
                button.onclick = () => changePage(indikatorNumber, i + 1);
                if (i + 1 === currentPage) {
                    button.classList.add('disabled');
                }
                paginationContainer.appendChild(button);
            }

            changePage(indikatorNumber, currentPage);
        }

        function changePage(indikatorNumber, page) {
            currentPage = page;
            const table = document.getElementById('data_indikator' + indikatorNumber);
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                rows[i].style.display = 'none';
            }

            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            for (let i = start; i < end && i < rows.length; i++) {
                rows[i].style.display = '';
            }
        }
    </script>
</head>
<body>

<h2>Data Capaian Kinerja Sasaran Strategis Kejaksaan RI</h2>

<div class="btn-container">
    <button class="btn" onclick="showTable(1)">Sasaran Strategis 1</button>
    <button class="btn" onclick="showTable(2)">Sasaran Strategis 2</button>
    <button class="btn" onclick="showTable(3)">Sasaran Strategis 3</button>
    <button class="btn" onclick="showTable(4)">Sasaran Strategis 4</button>
    <button class="btn" onclick="showTable(5)">Sasaran Strategis 5</button>
    <button class="btn" onclick="showTable(6)">Sasaran Strategis 6</button>
</div>

<?php
// Render tables for each indicator
renderTable($data_indikator1, 'data_indikator1');
renderTable($data_indikator2, 'data_indikator2');
renderTable($data_indikator3, 'data_indikator3');
renderTable($data_indikator4, 'data_indikator4');
renderTable($data_indikator5, 'data_indikator5');
renderTable($data_indikator6, 'data_indikator6');
?>

<!-- Averages for each indicator -->
<div class="averages-container hidden" id="averages1">
    <?php renderAverages($data_indikator1); ?>
</div>
<div class="averages-container hidden" id="averages2">
    <?php renderAverages($data_indikator2); ?>
</div>
<div class="averages-container hidden" id="averages3">
    <?php renderAverages($data_indikator3); ?>
</div>
<div class="averages-container hidden" id="averages4">
    <?php renderAverages($data_indikator4); ?>
</div>
<div class="averages-container hidden" id="averages5">
    <?php renderAverages($data_indikator5); ?>
</div>
<div class="averages-container hidden" id="averages6">
    <?php renderAverages($data_indikator6); ?>
</div>

<!-- Pagination Controls -->
<div class="pagination"></div>

</body>
</html>
