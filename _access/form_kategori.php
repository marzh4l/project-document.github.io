<?php
	date_default_timezone_set("Asia/Jakarta");
	include '../db/config.php';
	$aktivitas = 'Masuk menu Kategori';
	$waktu = date("H:i:s");
	$query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas','$waktu','$id')");

?>
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Master Setup</h3>
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
							  <h2>Data <small>Kategori</small></h2>
							  <ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							  </ul>
							  <div class="clearfix"></div>
							  <form action="proses_hapuskategori.php" method="POST">
							  <table  id="datatable" class="table table-striped jambo_table">
							  <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus-square"></i> Tambah</a>
                              <!-- <button class="btn btn-outline-secondary btn-sm" type="submit"><i class="fa fa-pencil-square-o"></i> Edit</button> -->
                              <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#hapus"><i class="fa fa-trash-o"></i> Hapus</a>
							</div>
							<div class="x_content">
		  							  
								<thead>
								  <tr align="center">
									<th colspan="2">
									<input type="hidden" name="id" value="<?php echo $id ?>"  required="required" class="form-control" placeholder="Masukan ID">
										<input type="checkbox" onchange="checkAll(this)" name="id_kategori[]">
									</th>
									
									<th>Nama Kategoti</th>
									<th>deskripsi</th>
									<th>Option</th>
								  </tr>
								</thead>
								<tbody>
								<?php 
									$no = 1;
									$data = mysqli_query($conn,"select * from kategori");
									while($d = mysqli_fetch_array($data)){
								?>
								  <tr>
								  	<td align="center">
                                        <input type="checkbox" name="id_kategori[]" value="<?php echo $d['id_kategori'] ?>" id="flexCheckDefault">
                                        
                                    </td>
									<th scope="row"><?php echo $no++; ?></th>
									<td><?php echo $d['kategori']; ?></td>
									<td align="justify">
										<!-- <a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#collapseExample">Liat</a> -->
										<!-- <div class="collapse" id="collapseExample"> -->
  											<!-- <div class="card card-body"> -->
												<?php echo $d['deskripsi']; ?>
											<!-- </div> -->
										<!-- </div> -->
									</td>
									<td align="center"><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit" data-id_kategori="<?php echo $d['id_kategori']; ?>" data-kategori="<?php echo $d['kategori']; ?>" data-deskripsi="<?php echo $d['deskripsi'] ?>"><i class="fa fa-pencil-square"></i></a></td>
								  </tr>
								  <?php }?>
								  
								</tbody>
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
								<!-- /modals -->
							</form>
								
							  </table>
							  <!-- Small modal -->			
							  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">

												<div class="modal-header">
													<h4 class="modal-title"><i class="fa fa-cogs text-primary"></i> Edit Kategori</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
													</button>
												</div>
												<div class="modal-body">												
													<form method="POST" action="proses_edit.php" data-parsley-validate class="form-horizontal form-label-left">
														
														<div class="mb-3">
															<label class="col-form-label label-align" for="first-name">Kategori <span class="required text-danger">*</span>
															</label>
															<!-- <div class="col-md-8"> -->
																<input type="hidden" name="id_kategori" id="id_kategori" required="required" class="form-control ">
																<input type="text" name="kategori" id="kategori" required="required" class="form-control ">
															<!-- </div> -->
														</div>
														<div class="mb-3">
															<label class="col-form-label label-align" for="first-name">deskripsi <span class="required text-danger" >*</span>
															</label>
															<!-- <div class="col-md-8"> -->
															<textarea class="form-control" name="deskripsi" rows="3" placeholder="" id="deskripsi"></textarea>
															<!-- </div> -->
														</div>
														<div class="mb-1">(<span class="required text-danger mb-3" >*</span>) Wajib di isi </div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-success">Simpan</button>
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
													<h4 class="modal-title"><i class="fa fa-file"></i> Input Kategori</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
													</button>
												</div>
												<div class="modal-body">												
													<form method="POST" action="proses_kategori.php" data-parsley-validate class="form-horizontal form-label-left">
														
														<div class="mb-3">
															<label class="col-form-label label-align" for="first-name">Kategori <span class="required text-danger">*</span>
															</label>
															<input type="hidden" name="id" value="<?php echo $id ?>"  required="required" class="form-control" placeholder="Masukan ID">
															<!-- <div class="col-md-8"> -->
															<input type="text" name="kategori" id="kategori" required="required" class="form-control" placeholder="Masukan Nama Kategori">
															<!-- </div> -->
														</div>
														<div class="mb-3">
															<label class="col-form-label label-align" for="first-name">deskripsi <span class="required text-danger" >*</span>
															</label>
															<!-- <div class="col-md-8"> -->
															<textarea class="form-control" rows="3" name="deskripsi" placeholder="Masukan Deskripsi Kategori"></textarea>
															<!-- </div> -->
														</div>
														<div class="mb-1">(<span class="required text-danger mb-3" >*</span>) Wajib di isi </div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
				</div>
			</div>
			</div>

			<!-- /page content -->
			