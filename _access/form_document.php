<?php
	include '../db/config.php';
?>
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Input Document</h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Cari</button>
									</span>
								</div>
							</div>
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
								<?php } else if($_GET['pesan'] == "warning"){ ?>
								<div class="alert alert-warning alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
									</button>
									<strong>Data</strong> sudah ada!
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
								<?php } } ?>
							</div>
						<div class="col-md-4 col-sm-4"></div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form <small>Document</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<form method="POST" action="proses_user.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    	<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="nm_document">Nama Document <span class="required">*</span></label>
											<div class="col-md-6">
												<input type="text" name="nm_document"  required="required" class="form-control ">
											</div>
										</div>

										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 label-align ">Kategori  <span class="required">*</span></label>
											<div class="col-md-6 col-sm-9">	
												<select class="form-control" name="id_unit">
													<option>Pilih</option>
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
											<label class="control-label col-md-3 col-sm-3 label-align ">Unit  <span class="required">*</span></label>
											<div class="col-md-6 col-sm-9">	
												<select class="form-control" name="id_unit">
													<option>Pilih</option>
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
                                        <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"> Tanggal <span class="required">*</span></label>
											<div class="col-md-6">
												<input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"> File <span class="required">*</span></label>
											<div class="col-md-6">
												<input class="form-control" type="file" name="file">
											</div>
										</div>
                                        <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"> Pengesah Document <span class="required">*</span></label>
											<div class="col-md-6">
												<input class="form-control" type="text" name="pengesahan_document">
											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="item form-group label-align">
											<div class="col-md-9 align-self-end">
												<button class="btn btn-primary" type="button">Batal</button>
												<button type="submit" class="btn btn-success">Kirim</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
			</div>
			<!-- /page content -->
