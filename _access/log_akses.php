<?php
	date_default_timezone_set("Asia/Jakarta");
	include '../db/config.php';
	$aktivitas = 'Masuk menu Log Akses';
	$waktu = date("H:i:s");
	$query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas','$waktu','$id')");

?>
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Management Log Access</h3>
						</div>
					</div>
					<div class="clearfix">
						<div class="col-md-4 col-sm-4"></div>
							<div class="col-md-4 col-sm-4">
								<?php
									if(isset($_GET['pesan'])){
										if($_GET['pesan'] == "sukses"){
								?>
								<div class="alert alert-success alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
									</button>
									<strong>Sukses!</strong> data berhasil di input.
								</div>
								<?php } else if($_GET['pesan'] == "suksesEdit"){ ?>
									<div class="alert alert-success alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
									</button>
									<strong>Sukses!</strong> data berhasil di Edit.
								</div>
								<?php } else if($_GET['pesan'] == "suksesHapus"){ ?>
									<div class="alert alert-success alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
									</button>
									<strong>Sukses!</strong> data berhasil di Hapus.
								</div>
								<?php } else if($_GET['pesan'] == "warning"){ ?>
								<div class="alert alert-warning alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
									</button>
									<strong>Data</strong> sudah ada!
								</div>
								<?php } else if($_GET['pesan'] == "pilih"){ ?>
								<div class="alert alert-warning alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
									</button>
									<strong>Anda</strong> belum memilih data!
								</div>
								<?php } else if($_GET['pesan'] == "gagal"){ ?>
								<div class="alert alert-danger alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
									</button>
									<strong>Gagal</strong> data tidak berhasil disimpan!
								</div>
								<?php } else if($_GET['pesan'] == "gagalEdit"){ ?>
								<div class="alert alert-danger alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
									</button>
									<strong>Gagal</strong> data tidak berhasil di edit!
								</div>
								<?php } else if($_GET['pesan'] == "gagalHapus"){ ?>
								<div class="alert alert-danger alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
									</button>
									<strong>Gagal</strong> data tidak berhasil di Hapus!
								</div>
								<?php } } ?>
							</div>
						<div class="col-md-4 col-sm-4"></div>
					</div>
					<div class="row">

						<div class="col-md-12 col-sm-12">
						  <div class="x_panel">
							<div class="x_title">
							  <h2>Data <small>aktivitas</small></h2>
							  <ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							  </ul>
							  <div class="clearfix"></div>
							  <form action="proses_hapusUser.php" method="POST">
							  
                                  <div class="col-md-2">
                                    <!-- <div class="col align-self-center"> -->
                                        <select class="form-control" name="level" id="level">
                                            <option> -- Pilih Level -- </option>
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>
                                        </select>
                                    <!-- </div> -->
                                  </div>
                                  <div class="col-md-2">
								  	<select class="form-control" name="level" id="tanggal">
                                            <option> -- Pilih Tanggal -- </option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
								  </div>
                                  <div class="col-md-2">
                                    <a href="#" class="btn btn-primary">OK</a>
                                    <a href="#" class="btn btn-outline-danger"><i class="fa fa-file"></i> PDF</a>
                                  </div>
                              <!-- <button class="btn btn-outline-secondary btn-sm" type="submit"><i class="fa fa-pencil-square-o"></i> Edit</button> -->
                             </div>
							<div class="x_content">
							<table id="datatable" class="table table-striped jambo_table table-responsive">
								<thead>
								  <tr align="center">
									<th>#</th>
									<th>IP Address</th> 
									<th>Nama</th> 
									<th>Level</th>
									<th>Unit</th>
									<th>Sistem Operasi</th> 
									<th>Browser</th> 
									<th>Device</th> 
									<th>Computer Name</th>
									<th>Login</th> 
                                    <th>Logout</th>
									<th>Aktivitas</th>
								  </tr>
								</thead>
								<tbody>
								<?php 
									$n = 1;
									$data2 = mysqli_query($conn,"SELECT log_akses.id_log,log_akses.ip_address,akses.nama,akses.level,unit.unit,log_akses.sistem_operasi,log_akses.browser,log_akses.device,log_akses.nama_computer,log_akses.login,log_akses.logout FROM log_akses INNER JOIN akses on log_akses.id_akses = akses.id_akses INNER JOIN unit ON akses.id_unit = unit.id_unit ORDER BY log_akses.id_log");
									while($d = mysqli_fetch_array($data2)){
										$login = date_create($d['login']);
										$logout = date_create($d['logout']);
										$keluar = date_format($logout,'d F Y')." Pukul : ".date_format($logout,'H:i:sa')
								?>
								  <tr>
								  <!-- <td align="center">
                                        <input type="checkbox" name="id_akses[]" value="<?php //echo $d['id_akses'] ?>">
                                    </td> -->
									<th scope="row"><?php echo $n++; ?></th>
									<td><?php echo $d['ip_address'] ?></td>
									<td><?php echo $d['nama'] ?></td>
									<td><?php echo $d['level'] ?></td>
									<td><?php echo $d['unit'] ?></td>
									<td><?php echo $d['sistem_operasi'] ?></td>
									<td><?php echo $d['browser'] ?></td>
									<td><?php echo $d['device'] ?></td>
									<td><?php echo $d['nama_computer'] ?></td>
									<td><?php echo date_format($login,'d F Y')." Pukul : ".date_format($login,'H:i:sa') ?></td>
									<td><?php echo $d['logout'] == '0000-00-00 00:00:00' ? '<b class=text-danger>Belum Logout</b>' : ''.$keluar.''; ?></td>
									<td align="center"><a href="#aktivitas" class="btn btn-round btn-outline-primary btn-sm" data-toggle="modal" data-target="#aktivitas" data-id_log="<?php echo $d['id_log']; ?>" data-nama="<?php echo $d['nama']; ?>"><i class="fa fa-book"></i></a></td>
									</tr>
								<?php } ?>
								</tbody>
							  </table>
								<!-- /modals -->
								<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-body"><h4>Apakah anda yakin menghapus document?</h4></div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-danger">Hapus</button>
										</div>

									</div>
									</div>
								</div>
							</form>
							</div>
						  </div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page content -->

			<div class="modal fade" id="aktivitas" tabindex="-1" role="dialog" aria-hidden="true">
				<!-- Large modal -->
				<div class="modal-dialog modal-md">
					<div class="modal-content">

					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Data Aktivitas /</h4><span class="nama ml-2"></span>
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">	
						<div class="fetched-data" id="fetched-data"></div>					
					</div>
					</div>

					</div>
				</div>
			</div>
<script>
	$(document).ready(function(){
		$('#aktivitas').on('show.bs.modal', function (e) {
			var id_log = $(e.relatedTarget).data('id_log');
			var nama = $(e.relatedTarget).data('nama');
			//menggunakan fungsi ajax untuk pengambilan data
			$.ajax({
				type : 'POST',
				url : 'detail_aktivitas.php',
				data :  'id_log='+ id_log,
				success : function(response){
					$('.fetched-data').html(response);//menampilkan data ke dalam modal
				}
			});
			
			$('.nama').html(nama);
		});
	});
</script>
<script type="text/javascript" language="javascript" >

 
</script>