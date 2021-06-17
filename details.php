<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<title>รายละเอียดผู้สูญหาย</title>
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
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,500" rel="stylesheet">
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  

<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Listing-Image-Slider-->

<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT tblreport.*,tblbrands.BrandName,tblbrands.id as bid  from tblreport join tblbrands on tblbrands.id=tblreport.Brand where tblreport.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>  

<div style="text-align:center">
  <img src="admin/img/uplode/<?php echo htmlentities($result->Vimage1);?>"  alt="image" style="width: 24%;" >
  <img src="admin/img/uplode/<?php echo htmlentities($result->Vimage2);?>"  alt="image" style="width: 24%;" >
  </div>
  <?php } ?>

<!--/Listing-Image-Slider-->


<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-9">
        <h3><?php echo htmlentities($result->Nickname);?> , <?php echo htmlentities($result->Fullname);?></h3>
        <h3><font color="red">เบอร์โทรติดต่อกลับ:  <?php echo htmlentities($result->CallPhone);?></font></h3>
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <h4><font color="#FF0000">อายุขณะที่หาย <?php echo htmlentities($result->Age);?> ปี </h4></font>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-mr-9">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active"><a href="overview " aria-controls="overview" role="tab" data-toggle="tab">รายละเอียด </a></li>

            </ul>
            <div><br></div>


            <table> 
            <colgroup>
  <col span="1" width="80">
  <col span="1" width="500">
  </colgroup>  
  <tr>
    <th><font size="4">ชื่อ</font></th>
    <td><font size="4" color="black"> <?php echo htmlentities($result->Fullname);?></font></td>

  </tr>
  <tr>
    <th><font size="4">ชื่อเล่น</th>
     <td><font size="4" color="black"><?php echo htmlentities($result->Nickname);?></font></td>
  </tr>

  <tr>
    <th><font size="4">เพศ</font></th>
    <td><font size="4" color="black"><?php echo htmlentities($result->Sex);?></font></td>

  </tr>

  <tr>
    <th><font size="4">น้ำหนัก</font></th>
    <td><font size="4" color="black"><?php echo htmlentities($result->Weigh);?></font></td>

  </tr>

  <tr>
  
    <th><font size="4">ส่วนสูง</font></th>
    <td><font size="4" color="black"><?php echo htmlentities($result->Heigh);?></font></td>
    
  </tr>

  <tr>
    <th><font size="4">อายุขณะที่หาย</th>
     <td><font size="4" color="black"><?php echo htmlentities($result->Age);?></font></td>

  </tr>

  <tr>
    <th><font size="4">วันที่หายตัว</font></th>
    <td><font size="4" color="black"><?php echo htmlentities($result->DateMissing);?></font></td>

  </tr>

  <tr>
    <th><font size="4">เวลาที่หายตัว</font></th>
    <td><font size="4" color="black"><?php echo htmlentities($result->TimeMissing);?></font></td>

  </tr>

  <tr>
    <th><font size="4">ตำหนิ/ลักษณะเด่น</font></th>
    <td><font size="4" color="black"><?php echo htmlentities($result->Notable);?></font></td>
  </tr>

  <tr>
    <th><font size="4">สถานที่พบล่าสุด</font></th>
    <td><font size="4" color="black"><?php echo htmlentities($result->Place);?></font></td>
  </tr>

  <tr>
    <th><font size="4">ตำบล</font></th>
    <td><font size="4" color="black"><?php echo htmlentities($result->Tambol);?></font></td>
  </tr>

  <tr>
    <th><font size="4">อำเภอ</font></th>
    <td><font size="4" color="black"><?php echo htmlentities($result->District);?></font></td>
  </tr>

  <tr>
    <th><font size="4">จังหวัด</font></th>
    <td><font size="4" color="black"><?php echo htmlentities($result->Province);?></font></td>
  </tr>
  
  <tr>
    <th><font size="4">หมายเหตุ</font></th>
    <td><font size="4" color="black"><?php echo htmlentities($result->Overview);?></font></td>
  </tr>

  <tr>
    <th><font size="4">วันเวลาลงประกาศ</font></th>
    <td><font size="4" color="black"><?php echo htmlentities($result->RegDate);?></font></td>
  </tr>
</table>
                </table>
              </div>
            </div>
          </div>
          
        </div>
<?php } ?>
   
    
    
    
  </div>
</section>
<!--/Listing-detail--> 

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

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>