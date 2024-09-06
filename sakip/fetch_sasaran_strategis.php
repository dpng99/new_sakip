<?php
include("mr.db.php");

if (isset($_POST['rumpun'])) {
    $rumpun = mysqli_real_escape_string($link, $_POST['rumpun']);

    $query = "SELECT * FROM sinori_sakip_saspro WHERE link = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, 's', $rumpun);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $options = '<option value="">Pilih Sasaran Strategis</option>';
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $text2 = htmlspecialchars($row['saspro_nama'], ENT_QUOTES, 'UTF-8');
        $options .= '<option value="' . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . '">' . substr($text2, 0, 1000) . '...</option>';
    }

    echo $options;

    mysqli_stmt_close($stmt);
}
?>