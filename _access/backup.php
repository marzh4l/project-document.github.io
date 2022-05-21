<?php
	include '../db/config.php';
	$aktivitas = 'Masuk menu Backup';
	$waktu = date("h:i:s");
	$query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas','$waktu','$id')");

?>
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3></h3>
						</div>
					</div>
					<div class="clearfix">
						<div class="col-md-4 col-sm-4"></div>
							<div class="col-md-4 col-sm-4">
								
							</div>
						<div class="col-md-4 col-sm-4"></div>
					</div>
					<div class="row">

						<div class="col-md-12 col-sm-12">
						  <div class="x_panel">
							<div class="x_title">
							  <h2>Backup<small>Database</small></h2>
							  <ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							  </ul>
							  <div class="clearfix"></div>
							  
							</div>
							<div class="x_content">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-auto">
									<?php
									if(isset($_GET['pesan'])){
										if($_GET['pesan'] == "berhasil"){ ?>
									<div class="alert alert-success alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
									</button>
									<strong>Sukses!</strong> data berhasil di beckup, <span>silahkan check file di Folder Downloads dengan nama file db-backup-waktu-documen.sql</span>.
								</div>
								<?php } } ?> 
                                    </div>
                                    
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="col-md-auto"><a href="proses_beckup.php?id=<?php echo $id ?>" class="btn btn-primary btn-sm"><i class="fa fa-cloud-download"> </i> Backup</a></div>
                                </div>
							</div>
						  </div>
						</div>




					</div>
				</div>
			</div>
			<!-- /page content -->
