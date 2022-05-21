    <!-- page content -->
    <div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Edit Document</h3>
						</div>
					</div>
					<div class="clearfix"></div>
                    <form method="POST" action="proses_editDocument.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
<?php
    include '../db/config.php';
    // if (isset($_POST['id_document'])) {
    // $id_document = $_POST['id_document'];
    //     for ($i=0; $i < count($id_document) ; $i++){
?>

                    <div class="row">
						<div class="col-md-12 col-sm-12">
						  <div class="x_panel">
                                <?php
                                    $id = $_GET['id_document'];
                                    $query = mysqli_query($conn,"SELECT `id_document`, `nm_document`, `deskripsi`, `id_kategori`, `id_akses`, `id_unit`, `tanggal`, `status`, `file_pdf`, `penandatangan` FROM `documen` WHERE id_document = $id");
                                    while($dataDocument = mysqli_fetch_array($query)){
                                ?>
							  <h2>Data <small>Document <?php echo $dataDocument['nm_document'] ?></small></h2>
							  <div class="clearfix"></div>
                                
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                    <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nm_document">Nama Document <span class="required text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="hidden" name="id_document"  required="required" class="form-control " value="<?php echo $dataDocument['id_document'] ?>">
                                                            <input type="text" name="nm_document"  required="required" class="form-control " value="<?php echo $dataDocument['nm_document'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nm_document">Deskripsi <span class="required text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                        <textarea id="message" class="form-control" name="deskripsi" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="500" data-parsley-validation-threshold="10"><?php echo $dataDocument['deskripsi'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3 col-sm-3 label-align ">Kategori  <span class="required text-danger">*</span></label>
                                                        <div class="col-md-8 col-sm-9">	
                                                            <select class="form-control" name="id_kategori" required="required">
                                                                <option>-- Pilih --</option>
                                                                <?php
                                                                    $data = mysqli_query($conn,"select id_kategori,kategori from kategori");
                                                                    while($d = mysqli_fetch_array($data)){
                                                                        if ($dataDocument['id_kategori']==$d['id_kategori']) {
                                                                            $select="selected";
                                                                           }else{
                                                                            $select="";
                                                                           }
                                                                           echo "<option value=".$d['id_kategori']." $select>".$d['kategori']."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>                                        
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3 col-sm-3 label-align ">Unit  <span class="required text-danger">*</span></label>
                                                        <div class="col-md-8 col-sm-9">	
                                                            <select class="form-control" name="id_unit" required="required">
                                                                <option>-- Pilih --</option>
                                                                <?php
                                                                    $data = mysqli_query($conn,"select id_unit,unit from unit");
                                                                    while($d = mysqli_fetch_array($data)){
                                                                        if ($dataDocument['id_unit']==$d['id_unit']) {
                                                                            $select="selected";
                                                                           }else{
                                                                            $select="";
                                                                           }
                                                                           echo "<option value=".$d['id_unit']." $select>".$d['unit']."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                            <input type="hidden" name="id_akses" value="<?php echo $_SESSION['id_akses']  ?>"  class="form-control ">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"> Tanggal <span class="required text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input class="date-picker form-control" name="tanggal" value="<?php echo $dataDocument['tanggal']  ?>" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
                                                            <input class="form-control" type="file" name="file">
                                                            <span class="required">Tipe file PDF, Ukuran Maximum 1Mb</span>
                                                        </div>
                                                    </div>
                                                    <div class="item form-group row">
                                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"> Status Publish Document <span class="required text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <div class="form-check">
                                                                <div class="col-md-2">
                                                                    <input class="form-check-input" type="radio" name="status" value="OFF" <?php if($dataDocument['status']=='OFF') echo 'checked'?>>
                                                                    <label class="form-check-label" for="mySwitch">OFF</label>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <input class="form-check-input" type="radio" name="status" value="ON" <?php if($dataDocument['status']=='ON') echo 'checked'?>>
                                                                    <label class="form-check-label" for="mySwitch">ON</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"> Penanda tangan document <span class="required text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text" name="penandatangan" required="required" value="<?php echo $dataDocument['penandatangan'] ?>">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="ln_solid"></div> -->
									                <div class="col-md-3"></div>
									                <div class="col-md-8 mb-3">(<span class="required text-danger" >*</span>) Wajib di isi </div>
                                                    <div class="modal-footer" style="padding-right: 11%">
                                                        <!-- <div class="col-md-10 align-self-end"> -->
                                                            <a class="btn btn-primary" href="?page=data_document">Batal</a>
                                                            <button type="submit" class="btn btn-success">Kirim</button>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                        </div>
                <?php //} } ?>
            </form>
        </div>
    </div>