<?php
	date_default_timezone_set("Asia/Jakarta");
  include '../db/config.php';
  $aktivitas1 = 'login';
  $aktivitas2 = 'Masuk menu Home';
  $waktu = date("H:i:s");
    $query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas2','$waktu','$id')");
  

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row" style="display: inline-block;">
            
            <?php 
              $query1 = mysqli_query($conn,"SELECT unit.unit,COUNT(documen.id_unit) as jum FROM unit INNER JOIN documen ON unit.id_unit=documen.id_unit GROUP BY documen.id_unit");
              while($d1 = mysqli_fetch_array($query1)){
                $nm_unit = $d1['unit'];
                @$nama_unit .= "'$nm_unit'". ", ";
                $jum = $d1['jum'];
                @$jumlah .= "'$jum'". ", ";

            ?>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
              <div class="top_tiles">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-file"></i></div>
                  <div class="count"><?php echo $d1['jum'] ?></div>
                  <h3 ><?php echo strtoupper($d1['unit']) ?></h3>
                  <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
                </div>
              </div>
            </div>
              <?php } ?>
            
              <div class="col-lg-12 col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Document<small>Universitas Kader Bangsa Palembang</small></h2>
                    <div class="filter">
                      <!-- <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> -->
                        <!-- <i class="glyphicon glyphicon-calendar fa fa-calendar"></i> -->
                        <!-- <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b> -->
                      <!-- </div> -->
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-12 ">
                      <div class="demo-container" style="height:280px">
                        <canvas id="myChart" class="demo-placeholder"></canvas>
                      </div>
                      <!-- <div class="tiles">
                        <div class="col-md-4 tile">
                          <span>Total Sessions</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                               <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Revenue</span>
                          <h2>$231,809</h2>
                          <span class="sparkline22 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Sessions</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                                 <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                      </div> -->

                    </div>

                    <div class="col-md-3 col-sm-12 ">
                      <div>
                        <div class="x_title">
                          <h2>Update Data Document</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><?php echo date("d F Y") ?></li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                        <?php 
													$no = 1;
													$query1 = mysqli_query($conn,"SELECT akses.nama,documen.nm_document,documen.tanggal_upload,akses.avatar,akses.level,unit.unit FROM documen INNER JOIN unit ON documen.id_unit=unit.id_unit INNER JOIN akses ON documen.id_akses=akses.id_akses ORDER BY documen.id_document DESC LIMIT 10");
													while($d1 = mysqli_fetch_array($query1)){
                            $tgl = date_create($d1['tanggal_upload']);
                            $query2 = mysqli_query($conn,"SELECT unit.unit FROM unit INNER JOIN akses ON unit.id_unit=akses.id_unit WHERE akses.nama = '$d1[nama]'");
                            $d2 = mysqli_fetch_array($query2);
												?>
                          <li class="media event">
                            <a class="">
                            <img src="
                              <?php
                                if($d1['level'] == 'Admin'){
                                  echo "profile/".$d1['avatar'];
                                } else if($d1['level'] == 'User' && $d1['avatar'] == ''){
                                  echo "../user/profile/avatar0.jpg";
                                } else if($d1['level'] == 'User'){
                                  echo "../user/profile/".$d1['avatar'];
                                } 
                              ?>" class="pull-left border-aero profile_thumb">
                            </a>
                            <div class="media-body">
                              <a class="title" href="#"><?php echo $d1['nama'] ?> <small> (<?php echo $d2['unit'] ?>)</small></a>
                              <p><strong>Document </strong> <?php echo $d1['nm_document'] ?> </p>
                              <p> <small><?php echo "Pukul : ".date_format($tgl,"H:i:sa") ?></small>
                              </p>
                            </div>
                          </li>
                          <?php } ?>

                        </ul>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
			</div>
      <!-- /page content -->