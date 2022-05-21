<?php
	include '../db/config.php';
?>
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Setting Akun</h3>
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
					<div class="row justify-content-md-center">
                        
                        <div class="col-md-auto"></div>
						<div class="col-md-6">
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
							</div>
							<div class="x_content">											
                                <form method="POST" action="proses_editProfile.php" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    <?php
                                        $n = 1;
                                        $data2 = mysqli_query($conn,"SELECT akses.id_akses,akses.nama,akses.username,akses.password,akses.NIP,akses.id_unit,unit.unit,akses.level FROM akses INNER JOIN unit ON akses.id_unit=unit.id_unit WHERE akses.id_akses = '$_SESSION[id_akses]'");
                                        while($d = mysqli_fetch_array($data2)){
                                    ?>
                                    <div class="mb-3">
                                        <label class="col-form-label label-align" for="first-name">Nama <span class="required text-danger">*</span>
                                        </label>
                                        <input type="hidden" name="id_akses" value="<?php echo $d['id_akses'] ;?>" class="form-control ">
                                        <input type="text" name="nama" value="<?php echo $d['nama'] ;?>" class="form-control ">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label label-align" for="first-name">Username <span class="required text-danger">*</span>
                                        </label>
                                        <input type="text" name="username" value="<?php echo $d['username'] ;?>" class="form-control ">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label label-align" for="first-name">Password <span class="required text-danger">*</span>
                                        </label>
                                        <input class="form-control" type="password" name="password" value="<?php echo $d['password']?>">
                                    </div>
                                    <fieldset disabled>
                                    <div class="mb-3">
                                        <label for="middle-name" class="col-form-label label-align"> NIP <span class="required text-danger">*</span></label>
                                        <input id="middle-name" class="form-control" type="text" name="NIP" value="<?php echo $d['NIP'] ;?>">	
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label label-align ">Unit  <span class="required text-danger">*</span></label>
                                        <input id="disabledTextInput" class="form-control" type="text" name="unit" value="<?php echo $d['unit'] ;?>">	
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label label-align ">Level  <span class="required text-danger">*</span></label>
                                        <input id="middle-name" class="form-control" type="text" name="unit" value="<?php echo $d['level'] ;?>">
                                    </div>
                                    </fieldset>
                                    <div class="mb-3">
                                        <label class="col-form-label label-align ">Avatar  <span class="required text-danger">*</span></label>
                                        <input id="middle-name" class="form-control" type="file" name="avatar">
                                    </div>
                                    <?php } ?>
									<div class="mb-1">(<span class="required text-danger mb-3" >*</span>) Wajib di isi </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
							</div>
						  </div>
						</div>

					</div>
				</div>
			</div>
			<!-- /page content -->
