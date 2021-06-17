<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?><!DOCTYPE HTML>
<html lang="en">
<head>

<title>ประวัติการประกาศบุคคลสูญหาย</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->  
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!--Page Header-->
<!-- /Header --> 

<!--Page Header-->
<div class="page-header_wrap">
      <div class="page-heading">
        <h1>ประวัติการประกาศบุคคลสูญหาย</h1>
      </div>
    </div>

<!-- /Page Header--> 

<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$result=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($result as $result)
{ ?>
<section class="user_profile inner_pages">

      <div class="dealer_info">
        <h5><?php echo htmlentities($result->FullName);?></h5>
        <p><?php echo htmlentities($result->Address);?><br>
          <?php echo htmlentities($result->City);?>&nbsp;<?php echo htmlentities($result->Country); }}?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-3">
       <?php include('includes/sidebar.php');?>
   
      <div class="col-md-8 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">ประวัติการลงประกาศ </h5>


<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT tblreport.Fullname,tblbrands.BrandName,tblreport.Nickname,tblreport.Sex,tblreport.Age,tblreport.id,tblreport.DateMissing,
tblreport.TimeMissing,tblreport.Typepreson,tblreport.Overview,tblreport.CallPhone,tblreport.Vimage1,
tblreport.userEmail,tblreport.Status,tblreport.Place
from tblreport ,tblbrands where tblreport.userEmail='$useremail' and tblreport.Brand = tblbrands.id GROUP BY id DESC ";
////echo $sql;
$query = $dbh -> prepare($sql);
$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$resu=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($resu as $resu)
{  ?>
              
              <?php if($resu->Status==0)
                { ?>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">พบแล้ว</a>
                           <div class="clearfix"></div>
        </div>

              <?php } else if($resu->Status==1) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">ยังไม่พบตัว</a>
            <div class="clearfix"></div>
        </div>
             


                <?php } else { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">ไม่มีรายการประกาศ</a>
            <div class="clearfix"></div>
        </div>
                <?php } ?>
<table>
  <tr>
    <th>ชื่อ</th>
    <th>ชื่อเล่น</th>
    <th>อายุ</th>
    <th>สาเหตุ</th>
    <th>วันที่สูญหาย</th>
    <th>เวลาที่สูญหาย</th>
    <th>แก้ไขข้อมูล</th>
    <th>จัดการสถานะ</th>
  </tr>
  <tr>
    <td><?php echo htmlentities($resu->Fullname);?></td>
     <td><?php echo htmlentities($resu->Nickname);?></td>
      <td> <?php echo htmlentities($resu->Age);?></td>
       <td><?php echo htmlentities($tds=$resu->Typepreson);?></td>
       <td><?php echo htmlentities($tds=$resu->DateMissing);?></td>
       <td><?php echo htmlentities($tds=$resu->TimeMissing);?></td>
       <td> <a href="edit-post.php?id=<?php echo $resu->id;?>"><i class="fa fa-edit"></i></td>
        <td> <a href="edit-status.php?id=<?php echo $resu->id;?>"><i class="fa fa-edit"></i></td>
  </tr>
</table>

              <?php }}  else { ?>
                <h5 align="center" style="color:red">ยังไม่มีข้อมูลการแจ้ง</h5>
              <?php } ?>
             
         
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/my-report--> 
<?php include('includes/footer.php');?>

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
</html>
<?php } ?>