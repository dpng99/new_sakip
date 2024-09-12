<?php
session_start();
include("mr.db.php");

// Koneksi ke database
$link = mysqli_connect($server, $username, $password, $database);

// Periksa apakah koneksi berhasil
if (!$link) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Mengatur timezone default
date_default_timezone_set('Asia/Jakarta');

// Ambil input dari form, pastikan variabel POST ada sebelum mengaksesnya
$id1 = isset($_POST["n"]) ? $_POST["n"] : '';
$pass1 = isset($_POST["p"]) ? $_POST["p"] : '';

// Hash password menggunakan md5
$pass1 = md5($pass1);

// Query untuk mendapatkan data berdasarkan id_satker yang diinput
$id1_escaped = mysqli_real_escape_string($link, $id1);
$query = "SELECT * FROM sinori_login WHERE id_satker = '$id1_escaped'";
$result = mysqli_query($link, $query);

// Periksa apakah data ditemukan
if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    // Verifikasi password dengan yang ada di database
    if ($row['satkerpass'] == $pass1) {
        // Buat session ID baru untuk keamanan (menghindari session fixation)
        session_regenerate_id(true);

        // Generate session key acak untuk pengguna
        $actnum = "";
        $chars_for_actnum = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        
        // Membuat string acak sepanjang 20 karakter
        for ($i = 1; $i <= 20; $i++) {
            $actnum .= $chars_for_actnum[mt_rand(0, count($chars_for_actnum) - 1)];
        }

        // Simpan session key baru di database
        $link2 = mysqli_connect($server, $username, $password, $database);
        if (!$link2) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Update satkerkey di database dengan key yang baru saja digenerate
        $actnum_escaped = mysqli_real_escape_string($link2, $actnum);
        $id1_escaped = mysqli_real_escape_string($link2, $id1);
        $update_query = "UPDATE sinori_login SET satkerkey = '$actnum_escaped' WHERE id_satker = '$id1_escaped'";
        mysqli_query($link2, $update_query);

        // Simpan informasi dalam session
        $_SESSION['ID'] = $id1;        // Simpan id_satker dalam session
        $_SESSION['Pass'] = $actnum;   // Simpan session key
        $_SESSION['session_id'] = session_id();  // Simpan session_id yang baru
        
        // Redirect berdasarkan id_satker
        if ($row['id_satker'] == 'menpanrb') {
            header("Location: list_satker.php?session=$actnum&sid=$id1");
            exit();
        } else {
            header("Location: index.home.php?session=$actnum&sid=$id1");
            exit();
        }
    } else {
        // Jika password tidak sesuai
        header("Location: index.php?error=Invalid credentials");
        exit();
    }
} else {
    // Jika tidak ditemukan user
    header("Location: index.php?error=User not found");
    exit();
}

// Tutup koneksi database
mysqli_close($link);
?>
