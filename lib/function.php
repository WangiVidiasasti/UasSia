<?php
include $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";

function Insert_Data($table, $data) {
    global $koneksi;

    // Convert array to SQL values
    $columns = implode(", ", array_keys($data));
    $values = implode("', '", array_values($data));
    $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

    // Convert to correct SQL string
    $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

    if ($koneksi->query($sql) === TRUE) {
        return true;
    } else {
        die("Error: " . $sql . "<br>" . $koneksi->error);
    }
}

function Tampil_Data($namaApi)
{
    global $baseURL;
    // Option untuk file_get_contents disable pengecekkan ssl certificate
    $arrContextOptions = array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
        ),
    );
    // URL API internal
    $apiURL = $baseURL . '/webservices/api/' . $namaApi . '.php';

  
}
?>
