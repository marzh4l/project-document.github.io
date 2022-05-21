<?php 
    include '../db/config.php';
?>
    
    <table id="datatable" class="table table-hover">
        <thead>
            <tr>
            <th>#</th>
            <th>Aktivitas</th>
            <th>Waktu</th>
            </tr>
        </thead>
    <?php 
        $n = 1;
        $id = $_POST['id_log'];
        $query_log = mysqli_query($conn,"SELECT `aktivitas`, `waktu` FROM `aktivitas` WHERE id_log = '$id'");
        while($d = mysqli_fetch_array($query_log)){
    ?>
        <tbody>
            <tr>
                <th scope="row"><?php echo $n++; ?></th>
                <td><?php echo $d['aktivitas'] ?></td>
                <td><?php echo $d['waktu'] ?></td>
            </tr>
        </tbody>
    <?php } ?>
    </table>
    <p class="d-flex flex-row-reverse"><a href="#" class="btn btn-outline-danger btn-sm"> Cetak Aktivitas</a></p>