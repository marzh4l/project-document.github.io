<?php
	date_default_timezone_set("Asia/Jakarta");
	include '../db/config.php';
	$aktivitas = 'Masuk menu Unit';
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
							  <h2>Data <small>Departemen</small></h2>
							  <ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							  </ul>
							  <div class="clearfix"></div>
							  <form action="proses_hapusUnit.php" method="POST">
							  <table id="datatable" class="table table-striped jambo_table">
							  <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambahUnit"><i class="fa fa-plus-square"></i> Tambah</a>
                              <!-- <button class="btn btn-outline-secondary btn-sm" type="submit"><i class="fa fa-pencil-square-o"></i> Edit</button> -->
                              <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#hapus"><i class="fa fa-trash-o"></i> Hapus</a>
							</div>
							<div class="x_content">
																  
								<thead>
								  <tr align="center">
									<th colspan="2"><input type="checkbox" onchange="checkAll(this)" name="id_unit[]"></th>
									<th align="center">Unit</th>
									<th>pejabat</th>
									<th>NIP</th>
									<th>Option</th>
								  </tr>
								</thead>
								<tbody>
								<?php 
									include '../db/config.php';
									$no = 1;
									$data = mysqli_query($conn,"select * from unit");
									while($d = mysqli_fetch_array($data)){
								?>
								  <tr>
								  	<td align="center">
									  	<input type="hidden" name="id" value="<?php echo $id ?>"  required="required" class="form-control" placeholder="Masukan ID">
                                        <input type="checkbox" name="id_unit[]" value="<?php echo $d['id_unit'] ?>" id="flexCheckDefault">
                                    </td>
									<th scope="row"><?php echo $no++ ?></th>
									<td><?php echo $d['unit']; ?></td>
									<td><?php echo $d['pejabat']; ?></td>
									<td><?php echo $d['NIP']; ?></td>
									<td align="center"><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editUnit" data-id_unit="<?php echo $d['id_unit']; ?>" data-unit="<?php echo $d['unit']; ?>" data-pejabat="<?php echo $d['pejabat']; ?>"><i class="fa fa-pencil-square"></i></a></td>
								  </tr>
								  <?php } ?>
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
								<!-- Small modal -->			
									<div class="modal fade" id="editUnit" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-sm modal-dialog-centered">
											<div class="modal-content">

												<div class="modal-header">
													<h4 class="modal-title"><i class="fa fa-cogs text-primary"></i> Edit Unit</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
													</button>
												</div>
												<div class="modal-body">												
													<form method="POST" action="proses_editUnit.php" data-parsley-validate class="form-horizontal form-label-left">
														<div class="mb-3">
															<label class="col-form-label label-align" for="first-name">Unit <span class="required text-danger">*</span>
															</label>
															<input type="hidden" name="id" value="<?php echo $id ?>"  required="required" class="form-control" placeholder="Masukan ID">
															<!-- <div class="col-md-8"> -->
																<input type="hidden" name="id_unit" id="id_unit" required="required" class="form-control ">
																<input type="text" name="unit" id="unit" required="required" class="form-control ">
															<!-- </div> -->
														</div>
														<div class="mb-3">
															<label class="col-form-label label-align" for="first-name">Pejabat <span class="required text-danger">*</span>
															</label>
															<!-- <div class="col-md-8"> -->
																<input type="text" name="pejabat" id="pejabat" required="required" class="form-control ">
															<!-- </div> -->
														</div>
														<div class="mb-3">
															<label class="col-form-label label-align" for="first-name">NIP <span class="required text-danger">*</span>
															</label>
															<!-- <div class="col-md-8"> -->
																<input type="text" name="NIP" id="NIP" required="required" class="form-control ">
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
							  </table>
									
								<!-- Small modal -->			
									<div class="modal fade" id="tambahUnit" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-sm modal-dialog-centered">
											<div class="modal-content">

												<div class="modal-header">
													<h4 class="modal-title"><i class="fa fa-file"></i> Input Unit</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
													</button>
												</div>
												<div class="modal-body">												
												<form method="POST" action="proses_unit.php" data-parsley-validate class="form-horizontal form-label-left">
														<div class="mb-3">
															<label class="col-form-label label-align" for="first-name">Unit <span class="required text-danger text-danger">*</span>
															</label>
															<input type="hidden" name="id" value="<?php echo $id ?>"  required="required" class="form-control" placeholder="Masukan ID">
															<!-- <div class="col-md-8"> -->
															<input type="text" name="unit" id="unit"  required="required" class="form-control" placeholder="Masukan Nama Unit">
															<!-- </div> -->
														</div>
														<div class="mb-3">
															<label class="col-form-label label-align" for="first-name">Pejabat <span class="required text-danger text-danger">*</span>
															</label>
															<!-- <div class="col-md-8"> -->
															<input type="text" name="pejabat" required="required" class="form-control" placeholder="Masukan Nama Pejabat">
															<!-- </div> -->
														</div>
														<div class="mb-3">
															<label class="col-form-label label-align" for="first-name">NIP <span class="required text-danger">*</span>
															</label>
															<!-- <div class="col-md-8"> -->
																<input type="text" name="NIP" required="required" class="form-control " placeholder="Masukan NIP Pejabat">
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