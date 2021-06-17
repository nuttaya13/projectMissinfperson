<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Car Rental Portal | Car Listing</title>
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
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  

<!--Header--> 
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->

<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
    <h1>คำค้นหา  "<?php echo $_POST['searchdata'];?>"</h1>
<?php 
//Query for Listing count
$searchdata=$_POST['searchdata'];
$sql = "SELECT * from tblreport 
where tblreport.Fullname LIKE '%$searchdata%' OR tblreport.Sex LIKE '%$searchdata%' OR tblreport.Nickname LIKE '%$searchdata%'";

$query = $dbh -> prepare($sql);
$query -> bindParam(':search',$searchdata, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
$cnt=1;

if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
  <div class="product-listing-m gray-bg">
          <div class="product-listing-img"><img src="admin/img/uplode/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="Image" width="200" /> </a> 
          </div>
          <div class="product-listing-content">
            <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->Fullname);?> , <?php echo htmlentities($result->Nickname);?></a></h5>
            <p class="list-price">อายุ <?php echo htmlentities($result->Age);?> ปี</p>
            <ul>
              <li><i class="fa fa-user" aria-hidden="true"></i>เพศ <?php echo htmlentities($result->Sex);?></li>
              <li><i class="fa fa-calendar" aria-hidden="true"> สถานที่</i><?php echo htmlentities($result->Province);?></li> <br>
    
            </ul>
            <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn">ข้อมูลเพิ่มเติม <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
        </div>
      <?php }} ?>
         </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget">
          <div class="widget_heading">
          <h5><i class="fa fa-filter" aria-hidden="true"></i> ค้นหารายชื่อ </h5>
          </div>
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="search.php" method="post" id="header-search-form">
            <input type="text" placeholder="ระบุคำค้นหา..." name="searchdata" class="form-control white_bg" >
                <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> ค้นหารายชื่อ</button>
           	 </form>
           <br>

		  <div class="widget_heading">
				   <form action="search2.php" method="post" id="header-search-form">  
            <h5><i class="fa fa-filter" aria-hidden="true"></i> ค้นหาตามเพศ </h5>
           </div>
		   <select class="listselect" name="searchdata1">
					<option value=""> Select </option>
					<option value="ชาย">ชาย</option>
					<option value="หญิง">หญิง</option>
				</select>
				<button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> ค้นหาตามเพศ</button>
		 </form>

<br>
		 <div class="widget_heading">
		 <form action="search3.php" method="post" id="header-search-form">
            <h5><i class="fa fa-filter" aria-hidden="true"></i> ค้นหาตามสาเหตุ </h5>
           </div>
<select  name="searchdata2">
<option value=""> Select </option>

<?php $ret="select id,BrandName from tblbrands";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->BrandName);?>"><?php echo htmlentities($result->BrandName);?></option>
<?php }} ?>
<option value="อื่นๆ"> อื่นๆ </option>
</select>
<button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> ค้นหาตามสาเหตุ</button>
		  </div>
          </div>
          </div>
		  
      <!--/Side-Bar--> 
    </div>
  </div>
</section>
<!-- /Listing--> 

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
