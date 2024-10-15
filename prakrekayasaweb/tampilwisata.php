<?php
function curl($url) {
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch); 
    curl_close($ch);
    return $output; // Menggunakan variable "output" yang benar
}

$send = curl("http://localhost/prakrekayasaweb/getwisata.php"); 
$data = json_decode($send, TRUE); 

echo "<table border='1'>";
echo "<tr>
        <th>ID Wisata</th>
        <th>Kota</th>
        <th>Landmark</th>
        <th>Tarif</th></tr>";

foreach($data as $row) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row["id_wisata"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["kota"])."</td>";
    echo "<td>" . htmlspecialchars($row["landmark"])."</td>";
    echo "<td>" . htmlspecialchars($row["tarif"]) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
