<?php 
    include '../db/config.php';
    $query_pejabat = mysqli_query($conn,"SELECT NIP FROM unit WHERE pejabat = '$_POST[pejabat]'");
    while($np = mysqli_fetch_array($query_pejabat)){
        echo $np['NIP'];
    }
?>