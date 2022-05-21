<?php
    include '../db/config.php';
    $no = 1;
    $data_unit = mysqli_query($conn,"SELECT id_unit,unit FROM unit WHERE pejabat = '$_POST[pejabat]'");
    while($d_unit = mysqli_fetch_array($data_unit)){

        echo "<option value='".$d_unit['id_unit']."'>".$d_unit['unit']."</option>";
        // echo $d_unit['unit'];
    } 
?>