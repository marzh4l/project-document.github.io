<?php
	date_default_timezone_set("Asia/Jakarta");
	include '../db/config.php';
	$aktivitas = 'Masuk menu Document';
	$waktu = date("H:i:s");
	$query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas','$waktu','$id')");

?>
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Data Document</h3>
						</div>

						<!-- <div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Cari</button>
									</span>
								</div>
							</div>
						</div> -->
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
								<?php } else if($_GET['pesan'] == "ukuran"){ ?>
								<div class="alert alert-warning alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
									</button>
									<strong>Ukuran</strong> file terlalu besar!
								</div>
								<?php } else if($_GET['pesan'] == "tipe"){ ?>
								<div class="alert alert-warning alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
									</button>
									<strong>Ekstensi</strong> File yang diupload tidak diperbolehkan!
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
							  <form action="proses_hapusDocument.php" method="POST">
							  	<div class="x_title">
									<h2>Data <small>Document</small></h2>                              
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a></li>
									</ul>
									<div class="clearfix"></div>
									
									<table id="datatable-responsive" class="table table-striped jambo_table table-responsive">
									<a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus-square"></i> Tambah</a>
									<!-- <button class="btn btn-outline-secondary btn-sm" type="submit"><i class="fa fa-pencil-square-o"></i> Edit</button> -->
									<a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#hapus"><i class="fa fa-trash-o"></i> Hapus</a>
								</div>
								<div class="x_content">		  
								
									<thead>
									<tr align="center">
										<th colspan="2"><div class="form-check"><input class="form-check-input" type="checkbox" onchange="checkAll(this)" name="id_document[]"></div></th>
										<th>Nama Document</th>
										<th>No Document</th>
										<th>Kategori</th> 
										<th>Deskripsi</th> 
										<th>Tanda Tangan</th> 
										<th>Tanggal Document</th> 
										<th>Tanggal Upload</th> 
										<th>User</th>
										<th>Unit</th>
										<th>Status</th>
										<th>Option</th> 
									</tr>
									</thead>
									<tbody>
									<?php 
										$n = 1;
										$data2 = mysqli_query($conn,"SELECT documen.id_document,documen.nm_document,documen.no_surat,documen.deskripsi,akses.nama,unit.unit,kategori.kategori,documen.tanggal_document,documen.tanggal_upload,documen.status,documen.penandatangan,documen.file_pdf FROM documen INNER JOIN unit ON documen.id_unit=unit.id_unit INNER JOIN akses ON documen.id_akses=akses.id_akses INNER JOIN kategori ON documen.id_kategori=kategori.id_kategori GROUP BY documen.id_document");
										while($d = mysqli_fetch_array($data2)){
											$tgl_document = date_create($d['tanggal_document']);
											$tgl_upload = date_create($d['tanggal_upload']);
									?>
									<tr>
										<td align="center">
											<div class="form-check">
											<input type="hidden" name="id" value="<?php echo $id ?>"  required="required" class="form-control" placeholder="Masukan ID">
												<input class="form-check-input" type="checkbox" name="id_document[]" value="<?php echo $d['id_document'] ?>" id="flexCheckDefault">
											</div>
										</td>
										<td align="center"> <?php echo $n++; ?></td>
										<td><?php echo $d['nm_document'] ?></td>
										<td><?php echo $d['no_surat'] ?></td>
										<td><?php echo $d['kategori'] ?></td>
										<td><?php echo $d['deskripsi'] ?></td>
										<td><?php echo $d['penandatangan'] ?></td>
										<td><?php echo date_format($tgl_document,'d F Y') ?></td>
										<td><?php echo date_format($tgl_upload,'d F Y')." Pukul : ".date_format($tgl_upload,'H:i:sa') ?></td>
										<td><?php echo $d['nama'] ?></td>
										<td><?php echo $d['unit'] ?></td>
										<td>
											<?php 
												if($d['status'] == "OFF"){
													echo "Not Publish";
												} else if($d['status'] == "ON"){
													echo "Publish";
												}
											?>
										</td>
										<td align="center">
											<a href="pdf/<?php echo $d['file_pdf'] ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-eye"></i> <?php $d['file_pdf'] ?></a>
											<a href="index.php?page=editDocument&id_document=<?php echo $d['id_document'] ?>" class="btn btn-primary btn-sm" ><i class="fa fa-pencil-square"></i></a>
										</td>
									</tr>
									<?php } ?>
									</tbody>
								</table>
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
								</div>
								<!-- /modals -->
							   </form>
							</div>
						  
						</div>
					</div>
				</div>
			</div>
			<!-- /page content -->
		<!-- Large modal -->
		<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-file"></i> Input Document</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
				<form method="POST" action="proses_document.php" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12 col-sm-12">
									<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align" for="nm_document">Nama Document <span class="required text-danger">*</span></label>
										<div class="col-md-8">
										<input type="hidden" name="id" value="<?php echo $id ?>"  required="required" class="form-control" placeholder="Masukan ID">
											<input type="text" name="nm_document"  required="required" class="form-control" placeholder="Masukan Nama Document">
										</div>
									</div>
									<div class="item form-group row">
										<label class="col-form-label col-md-3 col-sm-3 label-align" for="nm_document">No Surat <span class="required text-danger">*</span></label>
										<div class="col-md-8">
											<input type="text" name="no_surat"  required="required" class="form-control" placeholder="Masukan Nomor Surat">
										</div>
									</div>
									<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align" for="nm_document">Deskripsi <span class="required text-danger">*</span></label>
										<div class="col-md-8">
										<textarea id="message" class="form-control" name="deskripsi" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="500" data-parsley-validation-threshold="10" placeholder="Masukan Deskripsi"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label col-md-3 col-sm-3 label-align ">Kategori  <span class="required text-danger">*</span></label>
										<div class="col-md-8 col-sm-9">	
											<select class="form-control" name="id_kategori" required="required">
												<option>-- Pilih --</option>
												<?php 
													$no = 1;
													$data = mysqli_query($conn,"select id_kategori,kategori from kategori");
													while($d = mysqli_fetch_array($data)){
												?>
												<option value="<?php echo $d['id_kategori']; ?>"><?php echo $d['kategori']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>                                        
									<div class="form-group row">
										<label class="control-label col-md-3 col-sm-3 label-align ">Unit  <span class="required text-danger">*</span></label>
										<div class="col-md-8 col-sm-9">	
											<select class="form-control" name="id_unit" required="required">
												<option>-- Pilih --</option>
												<?php 
													$no = 1;
													$data = mysqli_query($conn,"select id_unit,unit from unit");
													while($d = mysqli_fetch_array($data)){
												?>
												<option value="<?php echo $d['id_unit']; ?>"><?php echo $d['unit']; ?></option>
												<?php } ?>
											</select>
											<input type="hidden" name="id_akses" value="<?php echo $_SESSION['id_akses']  ?>"  class="form-control ">
										</div>
									</div>
									<div class="item form-group">
										<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"> Tanggal Document <span class="required text-danger">*</span></label>
										<div class="col-md-8">
											<input class="date-picker form-control" name="tanggal_document" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
										</div>
									</div>
									<div class="item form-group">
										<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"> File <span class="required text-danger">*</span></label>
										<div class="col-md-8">
											<input class="form-control" type="file" name="file" required="required">
											<span class="required">Tipe file PDF, Ukuran Maximum 1Mb</span>
										</div>
									</div>
									<div class="item form-group row">
										<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"> Status Publish Document <span class="required text-danger">*</span></label>
										<div class="col-md-8 mt-2">
											<div class="form-check">
												<div class="col-md-2">
													<input class="form-check-input" type="radio" name="status" value="OFF">
													<label class="form-check-label" for="mySwitch">OFF</label>
												</div>
												<div class="col-md-1">
													<input class="form-check-input" type="radio" name="status" value="ON">
													<label class="form-check-label" for="mySwitch">ON</label>
												</div>
											</div>
										</div>
									</div>
									<div class="item form-group">
										<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"> Penanda tangan document <span class="required text-danger">*</span></label>
										<div class="col-md-8">
											<input class="form-control" type="text" name="penandatangan" required="required" placeholder="Masukan penanda tangan document">
										</div>
									</div>
									<!-- <div class="ln_solid"></div> -->
									<div class="col-md-3"></div>
									<div class="col-md-8">(<span class="required text-danger mb-3" >*</span>) Wajib di isi </div>
								</div>
							</div>
						</div>
						<div class="modal-footer" style="padding-right: 11%">
						<!-- <div class="col-md-10 align-self-end"> -->
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-success">Kirim</button>
						<!-- </div> -->
					</div>
					</div>
				
				</form>
				
            </div>
            </div>

			<!-- Large modal -->
			<div class="modal fade" id="filePdf" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">

					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Document</h4>
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">						
						<input type="text" id="id_document">
					</div>
					</div>

					</div>
				</div>
			</div>