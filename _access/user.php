<?php
	date_default_timezone_set("Asia/Jakarta");
	include '../db/config.php';
	$aktivitas = 'Masuk menu User';
	$waktu = date("H:i:s");
	$query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas','$waktu','$id')");

?>
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Management User</h3>
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
							  <h2>Data <small>user</small></h2>
							  <ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							  </ul>
							  <div class="clearfix"></div>
							  <form action="proses_hapusUser.php" method="POST">
							  <table id="datatable" class="table table-striped jambo_table">
							  <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus-square"></i> Tambah</a>
                              <!-- <button class="btn btn-outline-secondary btn-sm" type="submit"><i class="fa fa-pencil-square-o"></i> Edit</button> -->
                              <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#hapus"><i class="fa fa-trash-o"></i> Hapus</a>
							</div>
							<div class="x_content">
							  
								<thead>
								  <tr align="center">
									<th colspan="2" ><input type="checkbox" onchange="checkAll(this)" name="id_akses[]"></th>
									<th>Nama</th> 
									<th>Username</th> 
									<th>Password</th>
									<th>NIP</th>
									<th>Unit</th>
									<th>Level</th> 
									<th>Option</th>
								  </tr>
								</thead>
								<tbody>
								<?php 
									$n = 1;
									$data2 = mysqli_query($conn,"SELECT akses.id_akses,akses.nama,akses.username,akses.password,akses.NIP,akses.id_unit,unit.unit,akses.level FROM akses INNER JOIN unit ON akses.id_unit=unit.id_unit");
									while($d = mysqli_fetch_array($data2)){
								?>
								  <tr>
									<td align="center">
										<input type="hidden" name="id" value="<?php echo $id ?>"  required="required" class="form-control" placeholder="Masukan ID">
                                        <input type="checkbox" name="id_akses[]" value="<?php echo $d['id_akses'] ?>">
                                    </td>
									<th scope="row"><?php echo $n++; ?></th>
									<td><?php echo $d['nama'] ?></td>
									<td><?php echo $d['username'] ?></td>
									<td>******</td>
									<td><?php echo $d['NIP'] ?></td>
									<td><?php echo $d['unit'] ?></td>
									<td><?php echo $d['level'] ?></td>
									<td align="center"><a href="?page=edit_user&id_akses=<?php echo $d['id_akses']; ?>&level=<?php echo $d['level']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square"></i></a></td>
									<!-- <td align="center"><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editUser" data-id_akses="<?php //echo $d['id_akses']; ?>" data-nama="<?php //echo $d['nama']; ?>" data-username="<?php //echo $d['username']; ?>" data-password="<?php //echo $d['password']; ?>" data-jk="<?php //echo $d['NIP']; ?>" data-id_unit="<?php //echo $d['id_unit']; ?>" data-level="<?php //echo $d['level']; ?>"><i class="fa fa-pencil-square"></i></a></td> -->
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

						<!-- Small modal -->			
						<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">

									<div class="modal-header">
										<h4 class="modal-title"><i class="fa fa-file"></i> Input User</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
										</button>
									</div>
									<div class="modal-body">												
										<form method="POST" action="proses_user.php" data-parsley-validate class="form-horizontal form-label-left">
											
											<div class="mb-3">
												<label class="col-form-label label-align" for="first-name">Nama <span class="required text-danger">*</span>
												</label>
												<input type="text" name="id_akses" id="id_akses"  required="required" class="form-control ">
												<input type="text" name="nama" id="nama"  required="required" class="form-control ">
											</div>
											<div class="mb-3">
												<label class="col-form-label label-align" for="first-name">Password <span class="required text-danger">*</span>
												</label>
												<input id="middle-name" class="form-control" type="password" name="password" id="password">
											</div>
											<div class="mb-3">
												<label for="middle-name" class="col-form-label label-align"> Jenis Kelamin <span class="required text-danger">*</span></label>
												<div class="col align-self-center">
													<input class="form-check-input" type="radio" name="jk" id="Laki-laki"checked>
													<label class="form-check-label" for="flexRadioDefault1">
														Laki-laki
													</label>
												</div>
												<div class="col align-self-center">
													<input class="form-check-input" type="radio" name="jk" id="Perempuan" checked>
													<label class="form-check-label" for="flexRadioDefault2">
														Perempuan
													</label>
												</div>	
											</div>
											<div class="mb-3">
												<label class="control-label label-align ">Unit  <span class="required text-danger">*</span></label>
												<div class="col align-self-center">	
													<select class="form-control" name="id_unit">
														<option>Pilih</option>
														<?php 
															include '../db/config.php';
															$no = 1;
															$data = mysqli_query($conn,"select id_unit,unit from unit");
															while($d = mysqli_fetch_array($data)){
														?>
														<option value="<?php echo $d['id_unit']; ?>"  id="id_unit" selected><?php echo $d['unit']; ?></option>
														<?php } ?>
													</select>
												</div>	
											</div>
											<div class="mb-3">
												<label class="col-form-label label-align ">Level  <span class="required text-danger">*</span></label>
												<div class="col align-self-center">
													<select class="form-control" name="level">
														<option>Pilih</option>
														<option value="Admin" id="level" selected>Admin</option>
														<option value="User" id="level" >User</option>
													</select>
												</div>
											</div>
											<div class="col-md-3"></div>
                							<div class="col-md-8 mb-3">(<span class="required text-danger" >*</span>) Wajib di isi </div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>

						<!-- Small modal -->			
						<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">

									<div class="modal-header">
										<h4 class="modal-title"><i class="fa fa-file"></i> Input User</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
										</button>
									</div>
									<div class="modal-body">												
										<form method="POST" action="proses_user.php" data-parsley-validate class="form-horizontal form-label-left">
											
											<div class="mb-3">
												<label class="control-label label-align ">Nama  <span class="required text-danger">*</span></label>
												<div class="col align-self-center">	
													<input type="hidden" name="id" value="<?php echo $id ?>"  required="required" class="form-control" placeholder="Masukan ID">
													<!-- <select class="form-control" name="nama" id="nama" onchange="cek_cb(this)"> -->
													<select class="form-control" name="nama" id="pejabat" onchange="cek_cb(this)">
														<option> -- Pilih -- </option>
														<?php 
															$no = 1;
															$data1 = mysqli_query($conn,"SELECT pejabat,NIP FROM unit");
															while($d1 = mysqli_fetch_array($data1)){
														?>
														<option value="<?php echo $d1['pejabat']; ?>"><?php echo $d1['pejabat']; ?></option>
														<?php } ?>
														<option id="lainnya" value="lainnya">Lainnya</option>
													</select>
													<input class="form-control" name="nama2" type="text" id="txt" style="display:none" placeholder="Masukan Nama">
												</div>	
											</div>
											<div class="mb-3">
												<label class="col-form-label label-align" for="first-name">NIP <span class="required text-danger">*</span>
												</label>
												<div class="col align-self-center">
													<input type="number" name="NIP" id="NIP" required="required" readonly class="form-control">
												</div>
											</div>
											<script>
												function cek_cb(obj) {
													var value = obj.value;
													if (value =="lainnya"){
														document.getElementById('txt').style.display='block';
														document.getElementById('NIP').readOnly = false;
														document.getElementById('unit').style.display='none';
														document.getElementById('unit2').style.display='block';
													} else {
														document.getElementById('txt').style.display='none';
														document.getElementById('txt').value='';
														document.getElementById('NIP').readOnly = true;
														document.getElementById('unit').style.display='block';
														document.getElementById('unit2').style.display='none';
													}
												}												
											</script>
											<div class="mb-3">
												<label class="control-label label-align ">Unit  <span class="required text-danger">*</span></label>
												<div class="col align-self-center">	
												<!-- <input type="text" name="id_unit" id="unit" required="required" readonly class="form-control">													<select class="form-control" name="id_unit2" style="display:none"> -->
													<select class="form-control" name="id_unit" id="unit" style="display:none">
														<!-- <option>Pilih</option> -->
													</select>
													<select class="form-control" name="id_unit2" id="unit2" style="display:block">
														<option> -- Pilih -- </option>
														<?php 
															$no = 1;
															$data = mysqli_query($conn,"select id_unit,unit from unit");
															while($d = mysqli_fetch_array($data)){
														?>
														<option value="<?php echo $d['id_unit']; ?>"><?php echo $d['unit']; ?></option>
														<?php } ?>
													</select>
												</div>	
											</div>
											<div class="mb-3">
												<label class="col-form-label label-align ">Level  <span class="required text-danger">*</span></label>
												<div class="col align-self-center">
													<select class="form-control" name="level">
														<option> -- Pilih -- </option>
														<option value="admin">Admin</option>
														<option value="user">User</option>
													</select>
												</div>
											</div>
											<div class="mb-3">
												<label class="col-form-label label-align" for="first-name">Username <span class="required text-danger">*</span>
												</label>
												<div class="col align-self-center">
													<input type="text" name="username"  required="required" class="form-control" placeholder="Masukan Username">
												</div>
											</div>
											<div class="mb-3">
												<label class="col-form-label label-align" for="first-name">Password <span class="required text-danger">*</span>
												</label>
												<div class="col align-self-center">
													<input class="form-control" type="password" name="password" placeholder="Masukan Password">
												</div>
											</div>
											<div class="mb-1">(<span class="required text-danger mb-3" >*</span>) Wajib di isi </div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
												<button type="submit" class="btn btn-success">Simpan</button>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page content -->
<script>
	$(document).ready(function(){
		$("#pejabat").change(function() { // Jika select box id kurir dipilih
			var pejabat = $(this).val(); // Ciptakan variabel kota
			$.ajax({
				type: 'POST', // Metode pengiriman data menggunakan POST
				url: 'nipPejabat.php', // File pemroses data
				data: 'pejabat=' + pejabat, // Data yang akan dikirim ke file pemroses yaitu ada 2 data
				success: function(response) { // Jika berhasil
					$('#NIP').val(response); // Berikan hasilnya ke id biaya
				}
			});
			$.ajax({
				type: 'POST', // Metode pengiriman data menggunakan POST
				url: 'idUnit.php', // File pemroses data
				data: 'pejabat=' + pejabat, // Data yang akan dikirim ke file pemroses yaitu ada 2 data
				success: function(response2) { // Jika berhasil
					$('#unit').html(response2); // Berikan hasilnya ke id biaya
				}
			});
		});
	});
</script>