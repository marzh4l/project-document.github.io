<?php 
    // koneksi database
    include '../db/config.php';

    $id = $_POST['getDetail'];
    $sql = mysqli_query($db, "SELECT file_pdf FROM documen where id_document='$id'");
    while ($row = mysqli_fetch_array($sql)){
        echo "<embed src='pdf/".$row['file_pdf']."' type='application/pdf'  width='100%'' height='600px'";
    }
    ?>
<embed src="pdf/file1.pdf" type="application/pdf"  width='100%'' height='600px'";