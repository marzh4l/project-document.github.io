<?php 
	include '../db/config.php';
	include("../db/UserInformation.php");
	session_start();
	date_default_timezone_set("Asia/Jakarta");
	if($_SESSION['level']=="Admin"){
		$query_logId = mysqli_query($conn,"SELECT id_log FROM log_akses WHERE `ip_address`= '$_SESSION[ip]' AND `id_akses` = '$_SESSION[id_akses]' AND `login` = '$_SESSION[tanggal]'");
        $logId = mysqli_fetch_array($query_logId);
		$id = $logId['id_log'];
		$status = $_SESSION['status'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>DocumenApp </title>
	<link href="../logo/ukb.png" rel="icon">

	<!-- Bootstrap -->	
	<link href="../assets/vendors-adm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../assets/vendors-adm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../assets/vendors-adm/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../assets/vendors-adm/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="../assets/vendors-adm/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<!-- Select2 -->
	<!-- <link href="../assets/vendors-adm/vendors/select2/dist/css/select2.min.css" rel="stylesheet"> -->
	<link href="../assets/vendors-adm/select2/dist/css/select2.min.css" rel="stylesheet">
	<!-- Switchery -->
	<link href="../assets/vendors-adm/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- starrr -->
	<link href="../assets/vendors-adm/starrr/dist/starrr.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<!-- <link href="../assets/vendors-adm/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> -->
	<!-- Datatable -->
	<link href="../assets/vendors-adm/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors-adm/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors-adm/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors-adm/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors-adm/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
	<script src="jquery/dist/jquery.min.js"></script>

	<!-- Custom Theme Style -->
	<link href="../assets/custom.min.css" rel="stylesheet">
	<style>
		.myform {
            margin-top: 15%;
            background: #fafafa;
            padding: 20px;
            border: 1px solid #f4f4f4;
         }
		 .myinput {
            width: 100%;
            padding: 5px;
         }
	</style>
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.php" class="site_title"><img src="../logo/ukb.png" width="34px" height="50px" alt=""> <span>Document App</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<?php 
								$queryImg = mysqli_query($conn,"SELECT avatar FROM akses WHERE id_akses = '$_SESSION[id_akses]'");
								while($image = mysqli_fetch_array($queryImg)){
							?>
							<img src="profile/<?php echo $image['avatar']=='' ? 'avatar0.jpg' : ''.$image['avatar'].''; ?>" alt="..." class="img-circle profile_img">
							<?php } ?>
						</div>
						<div class="profile_info">
							<span><?php echo $_SESSION['nama'] ?></span>
							<h2><a href="?page=editProfile" class="btn text-light btn-sm">Edit</a></h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Manu</h3>
							<ul class="nav side-menu">
								<li><a href="index.php?page=home"><i class="fa fa-home"></i> Home </a>
								</li>
								<li><a href="index.php?page=setup"><i class="fa fa-gears"></i> Setup </a>
								</li>
								<li><a><i class="fa fa-edit"></i>Master<span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="index.php?page=kategori">Kategori</a></li>
										<li><a href="index.php?page=unit">Unit</a></li>
									</ul>
								</li>
								<li><a href="index.php?page=data_document"><i class="fa fa-file-text"></i>Data Document</a>
								</li>
								<li><a href="index.php?page=user"><i class="fa fa-user"></i> Management User </a>
								</li>
								<li><a href="index.php?page=backup"><i class="fa fa-cloud-download"></i> Backup Database </a>
								</li>
								<li><a href="index.php?page=log_akses"><i class="fa fa-list-alt"></i> Log Akses </a>
								</li>
							</ul>
						</div>

					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-placement="top" title="">
							<span class="glyphicon" aria-hidden="true"></span>
						</a>
						<a data-placement="top" title="">
							<span class="glyphicon" aria-hidden="true"></span>
						</a>
						<a data-placement="top" title="">
							<span class="glyphicon" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php?id=<?php echo $id;?>">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<nav class="nav navbar-nav">
						<ul class=" navbar-right">
							<li class="nav-item dropdown open" style="padding-left: 15px;">
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
									<!-- <img src="images/img.jpg" alt="">-->
                                    <?php echo $_SESSION['level']?> 
								</a>
								<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="?page=editProfile"> Profile</a>
									<a class="dropdown-item" href="logout.php?id=<?php echo $id;?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
								</div>
							</li>

							
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->

			<!-- page content -->
            <?php 
                if(isset($_GET['page'])){
                    $page = $_GET['page'];

                    switch ($page) {
                        case 'home':
                            include "home.php";
                            break;
                        case 'kategori':
                            include "form_kategori.php";
                            break;
                        case 'unit':
                            include "form_unit.php";
                            break;			
                        // case 'form_document':
                        //     include "form_document.php";
                        //     break;			
                        case 'data_document':
                            include "data_document.php";
                            break;			
                        case 'user':
                            include "user.php";
                            break;			
                        case 'editProfile':
                            include "editProfile.php";
                            break;			
                        case 'edit_user':
                            include "edit_user.php";
                            break;			
                        case 'editDocument':
                            include "editDocument.php";
                            break;			
                        case 'backup':
                            include "backup.php";
                            break;			
                        case 'log_akses':
                            include "log_akses.php";
                            break;			
                        default:
                            // echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                            include "page_404.html";
                            break;
                    }
                }else{
                    include "home.php";
                }
            ?>
		</div>
			<!-- /page content -->

			<!-- footer content -->
			<footer>
			<?php
				echo $_SESSION['id_akses']."<br>";
				echo "My Ip Address :".UserInfo::get_ip()."<br>";
				echo "My OS :".UserInfo::get_os()."<br>";
				echo "My Browser :".UserInfo::get_browser()."<br>";
				echo "My Device :".UserInfo::get_device()."<br>";
				$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			
				echo "My Name Computer :".$hostname;
			?>
				<div class="pull-right">
					DocumenApp - Bootstrap Admin Template by <a href="">Universitas Kader Bangsa Palembang</a>
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>


	<!-- jQuery -->
	
	<!-- <script src="jquery-2.2.3.min.js"></script> -->
	<!-- Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="../assets/vendors-adm/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="../assets/vendors-adm/nprogress/nprogress.js"></script>    
    <!-- Chart.js -->
    <script src="../assets/vendors-adm/Chart.js/dist/Chart.min.js"></script>

    <!-- jQuery Sparklines -->
    <script src="../assets/vendors-adm/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

    <!-- DateJS -->
    <script src="../assets/vendors-adm/DateJS/build/date.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="../assets/vendors-adm/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="../assets/vendors-adm/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<!-- <script src="../assets/vendors-adm/moment/min/moment.min.js"></script> -->
	<!-- <script src="../assets/vendors-adm/bootstrap-daterangepicker/daterangepicker.js"></script> -->
	<!-- bootstrap-wysiwyg -->
	<script src="../assets/vendors-adm/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="../assets/vendors-adm/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="../assets/vendors-adm/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="../assets/vendors-adm/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="../assets/vendors-adm/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="../assets/vendors-adm/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="../assets/vendors-adm/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="../assets/vendors-adm/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="../assets/vendors-adm/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<!-- <script src="../assets/vendors-adms"></script> -->
	<!-- datatabke -->
	<script src="../assets/vendors-adm/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendors-adm/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../assets/vendors-adm/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendors-adm/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
	<script src="../assets/vendors-adm/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<!-- Custom Theme Scripts -->
	<!-- <script src="jquery.js"></script> -->
	<script src="custom.min.js"></script>

			
    <script>
    	$('#edit').on('show.bs.modal', function (event) {
		// event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
		var button              = $(event.relatedTarget)

		// data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
		var id_kategori         = button.data('id_kategori')
		var kategori         = button.data('kategori')
		var deskripsi         = button.data('deskripsi')
		var modal = $(this)

		//variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
		modal.find('#id_kategori').val(id_kategori)
		modal.find('#kategori').val(kategori)
		modal.find('#deskripsi').val(deskripsi)
	})

	$('#editUnit').on('show.bs.modal', function (event) {
		// event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
		var button              = $(event.relatedTarget)

		// data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
		var id_unit         = button.data('id_unit')
		var unit         = button.data('unit')
		var pejabat         = button.data('pejabat')
		var NIP         = button.data('NIP')
		var modal = $(this)

		//variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
		modal.find('#id_unit').val(id_unit)
		modal.find('#unit').val(unit)
		modal.find('#pejabat').val(pejabat)
		modal.find('#NIP').val(NIP)
	})

	$('#editUser').on('show.bs.modal', function (event) {
		// event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
		var button              = $(event.relatedTarget)

		// data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
		var id_akses         = button.data('id_akses')
		var nama         = button.data('nama')
		var username         = button.data('username')
		var password         = button.data('password')
		var jk         = button.data('jk')
		var id_unit         = button.data('id_unit')
		var level         = button.data('level')
		var modal = $(this)

		//variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
		modal.find('#id_akses').val(id_akses)
		modal.find('#nama').val(nama)
		modal.find('#username').val(username)
		modal.find('#password').val(password)
		modal.find('#jk').val(jk)
		modal.find('#id_unit').val(id_unit)
		modal.find('#level').val(level)
	})
</script>
        <script>
          var ctx = document.getElementById('myChart');
          var chart = new Chart(ctx, {
          type:"bar",
          data:{
            labels:[<?php echo @$nama_unit ?>],
            datasets:[{
            label:"Document Unit",
            backgroundColor: [ 'rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(38,255,0,02)','rgba(0,180,255,2)','rgba(0,89,255,2)','rgba(255,90,0,2)','rgba(252,255,0,2)','rgba(129,129,117,2)'],
            data:[<?php echo $jumlah?>],
            }]
          },
          options:{
            scales:{
            yAxes:[{
              ticks:{
              beginAtZero:true
              }
            }]
            }
          }
          })
    </script>
	<script type="text/javascript">
		function checkAll(ele) {
			var checkboxes = document.getElementsByTagName('input');
			if (ele.checked) {
				for (var i = 0; i < checkboxes.length; i++) {
					if (checkboxes[i].type == 'checkbox' ) {
						checkboxes[i].checked = true;
					}
				}
			} else {
				for (var i = 0; i < checkboxes.length; i++) {
					if (checkboxes[i].type == 'checkbox') {
						checkboxes[i].checked = false;
					}
				}
			}
		}
	</script>


	</body>
</html>
<?php 
	} else {
		header("location:../index.php?pesan=belum_login");
	}
?>