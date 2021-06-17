<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>

<title>report Missng Person</title>

		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 

<style>
.grid-container {
  display: grid;
  grid-template: auto / auto auto;
  grid-gap: 10px;
  background-color: #2196F3;
  padding: 10px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}
</style>

</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$sql ="SELECT id from tblreport ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$regusers=$query->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regusers);?></div>
													<div class="stat-panel-title text-uppercase h3">จำนวนผู้สูญหายทั้งหมด</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
											

<?php 
$sql2 ="SELECT id from tblreport where status='0' ";
$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$bookings=$query2->rowCount();
?>

													<div class="stat-panel-number h1 "><?php echo htmlentities($bookings);?></div>
													<div class="stat-panel-title text-uppercase h3">ผู้สูญหายที่พบแล้ว</div>
												</div>
											</div>
												</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">
<?php 
$sql3 ="SELECT id from tblreport where status='1' ";
$query3= $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$brands=$query3->rowCount();
?>												
													<div class="stat-panel-number h1 "><?php echo htmlentities($brands);?></div>
                          <div class="stat-panel-title text-uppercase h3">อยู่ระหว่างการดำเนินการ</div>
                          </div>
											    </div>
												</div>
                        </div>

<section class="section-padding gray-bg">
  <div class="container">
    <div class="section-header text-center">
    </div>

    <div class="row"> 
      <div class="recent-tab">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation"  class="active"><a href="#new" role="tab" data-toggle="tab">ประกาศผู้สูญหายล่าสุด</a></li>
        </ul>
      </div>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="new">

<?php $sql = "SELECT tblreport.Fullname,tblbrands.BrandName,tblreport.Nickname,tblreport.Sex,tblreport.Age,tblreport.id,tblreport.Typepreson,tblreport.RegDate,tblreport.Overview,tblreport.CallPhone,tblreport.Vimage1,tblreport.Status 
          from tblreport join tblbrands on tblbrands.id=tblreport.Brand where tblreport.Status='1' GROUP BY id DESC limit 8 ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>  

<div class="col-list-3">
      <div class="recent-car-list">
              <div align="center" class="car-info-box"> 
                   <a target ="_blank" href="details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/uplode/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" height="80"></a>
                   <ul>
                    <li><i class="fa fa-user" aria-hidden="true"></i>เพศ<?php echo htmlentities($result->Sex);?></li>
                  </ul>
              </div>
        <div class="car-title-m">
          <h6><a href="details.php?vhid=<?php echo htmlentities($result->id);?>"> <?php echo htmlentities($result->Fullname);?></a></h6>
      <span class="price"> <?php echo htmlentities($result->Age);?> ปี</span> 
      </div>
      <div class="inventory_info_m">
      <h6>เบอร์โทรติดต่อกลับ :</h6> <B><font color="#FF0000" Size = "5"> <?php echo substr($result->CallPhone,0,70);?></B></font>
      <li>ประกาศเมื่อ <?php echo htmlentities($result->RegDate);?></li>
      </div>
      </div>
      </div> 
<?php }}?>

  
     
    </div>
  </div>
    </div>
</section>






<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->
</html>