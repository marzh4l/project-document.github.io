<div class="right_col" role="main">
	<div class="">
  <!-- page content -->
    <div class="col-md-12">
      <div class="col-middle" style="height: 629px;">
        <div class="text-center text-center">
          <h1 class="error-number">Selamat Datang</h1>
          <h2>di Dashboard unit ()</h2>
          <p>Jika terjadi kendala sistem silahkan hubungi unit PUSKOM</p>
          <div class="mid_center">
          <?php 
              $query1 = mysqli_query($conn,"SELECT unit.unit,COUNT(documen.id_unit) as jum FROM unit INNER JOIN documen ON unit.id_unit=documen.id_unit WHERE unit.id_unit = '$_SESSION[id_unit]' GROUP BY documen.id_unit");
              while($d1 = mysqli_fetch_array($query1)){
            ?>
            <div class="col-lg-10 col-md-10 col-sm-10 ">
              <div class="top_tiles">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-file"></i></div>
                  <div class="count" style="right: 100px;"><?php echo $d1['jum'] ?></div>
                  <h3 style="right: 80px;" class="mt-2"><?php echo strtoupper($d1['unit']) ?></h3>
                  <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
                </div>
              </div>
            </div>
              <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content -->
  </div>
</div>