<?php
	include '../db/config.php';
?>
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Edit Akun</h3>
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
                                <form method="POST" action="proses_editUser.php" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    <?php
                                        $n = 1;
                                        $data2 = mysqli_query($conn,"SELECT akses.id_akses,akses.nama,akses.username,akses.password,akses.NIP,akses.id_unit,unit.unit,akses.level FROM akses INNER JOIN unit ON akses.id_unit=unit.id_unit WHERE akses.id_akses = '$_GET[id_akses]'");
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
                                        <input class="form-control" type="password" name="password" value="<?php echo $d['password']?>" id="pass">
										<span style="position: absolute;right:20px;top:220px;" onclick="hideshow()" >
											<i id="slash" class="fa fa-eye-slash"></i>
											<i id="eye" class="fa fa-eye"></i>
										</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="middle-name" class="col-form-label label-align"> NIP <span class="required text-danger">*</span></label>
                                        <input id="middle-name" class="form-control" type="number" name="NIP" value="<?php echo $d['NIP'] ;?>">	
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label label-align ">Unit  <span class="required text-danger">*</span></label>
                                        <select class="form-control" name="id_unit">
                                            <option>Pilih</option>
                                            <?php
                                                $data = mysqli_query($conn,"select id_unit,unit from unit");
                                                while($d2 = mysqli_fetch_array($data)){
                                                    if ($d['id_unit']==$d2['id_unit']) {
                                                        $select="selected";
                                                        }else{
                                                        $select="";
                                                        }
                                                        echo "<option value=".$d2['id_unit']." $select>".$d2['unit']."</option>";
                                                }
                                            ?>
                                            
                                        </select>	
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label label-align ">Level  <span class="required text-danger">*</span></label>
                                        <select class="form-control" name="level">
                                            <option>Pilih</option>
                                            <?php
                                                $dataLevel = ['Admin','User'];
                                                for ($i = 0; $i < count($dataLevel); $i++) {
                                                    if($d['level'] == $dataLevel[$i]){
                                                        $select="selected";
                                                    }else{
                                                        $select="";
                                                    }
                                                    echo "<option value=".$dataLevel[$i]." $select>".$dataLevel[$i]."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <?php } ?>
									<div class="mb-1">(<span class="required text-danger mb-3" >*</span>) Wajib di isi </div>
                                    <div class="modal-footer">
                                        <a href="?page=user" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
							</div>
						  </div>
						</div>
						<script>
							function hideshow(){
								var password = document.getElementById("pass");
								var slash = document.getElementById("slash");
								var eye = document.getElementById("eye");
								
								if(password.type === 'password'){
									password.type = "text";
									slash.style.display = "block";
									eye.style.display = "none";
								}
								else{
									password.type = "password";
									slash.style.display = "none";
									eye.style.display = "block";
								}

							}
						</script>
					</div>
				</div>
			</div>
			<!-- /page content -->
