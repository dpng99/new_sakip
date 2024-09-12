<?php
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['Pass'])) {
    include("mr.db.php");
    $mytable = "sinori_login";
    $sid1 = $_GET["sid"] ?? '';   // Menggunakan null coalescing operator untuk mencegah error jika tidak ada nilai sid
    $session1 = $_GET["session"] ?? '';  // Sama untuk session

    // Membuat koneksi ke database dan mengecek apakah berhasil
    $link = mysqli_connect($server, $username, $password, $database);
    
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Menggunakan prepared statements untuk mencegah SQL injection
    $stmt = $link->prepare("SELECT * FROM $mytable WHERE id_satker = ?");
    $stmt->bind_param("s", $sid1);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Memeriksa apakah session key cocok
        if ($row["satkerkey"] == $session1) {
            $id_satker1 = $row["id_satker"];
            $nama1 = $row["satkernama"];

            // Mengarahkan pengguna ke halaman sesuai dengan nilai 'id_simeryd'
            switch ($row['id_simeryd']) {
                case '5':
                    header("Location: list_satker.php?nama=$nama1&session=$session1&idsatker=$id_satker1");
                    exit;  // Menghentikan eksekusi setelah redirect
                case '2':
                    header("Location: index.pembinaan.php?nama=$nama1&session=$session1&idsatker=$id_satker1");
                    exit;  // Menghentikan eksekusi setelah redirect
                case '0':
                    header("Location: mr.php?nama=$nama1&session=$session1&idsatker=$id_satker1");
                    exit;
                case '1':
                    header("Location: index.pengawasan.php?nama=$nama1&session=$session1&idsatker=$id_satker1");
                    exit;
                default:
                    include("index.landing.php");
                    break;
            }
        } else {
            // Jika session key tidak cocok, arahkan kembali ke halaman login
            header("Location: index.php");
            exit;
        }
    } else {
        // Jika tidak menemukan data untuk satker yang diminta
        header("Location: index.php");
        exit;
    }

    // Menutup statement dan koneksi database
    $stmt->close();
    mysqli_close($link);
} else {
    // Jika sesi tidak valid, tampilkan pesan dan redirect setelah 3 detik
    echo "ANDA BELUM LOGIN";
    echo "<meta http-equiv=\"refresh\" content=\"3; url=index.php\">";
}
?>
