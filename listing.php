<?php 
session_start();
include('includes/config.php');
error_reporting(0);


$conn= mysqli_connect("localhost","root","","report") 
or die("Error: " . mysqli_error($conn));
mysqli_query($conn, "SET NAMES 'utf8' ");
//query
$query=mysqli_query($conn,"SELECT COUNT(id) FROM `tblreport`");
	$row = mysqli_fetch_row($query);

	$rows = $row[0];

	$page_rows = 5;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 

	$last = ceil($rows/$page_rows);

	if($last < 1){
		$last = 1;
	}

	$pagenum = 1;

	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}

	if ($pagenum < 1) {
		$pagenum = 1;
	}
	else if ($pagenum > $last) {
		$pagenum = $last;
	}

	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

	$nquery=mysqli_query($conn,"SELECT * from  tblreport where tblreport.Status='1' GROUP BY id DESC $limit");

	$paginationCtrls = '';

	if($last != 1){

	if ($pagenum > 1) {
$previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="page-link">ย้อนกลับ</a> &nbsp; &nbsp; ';

		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="page-link">'.$i.'</a> &nbsp; ';
			}
	}
}

	$paginationCtrls .= ''.$pagenum.' &nbsp; ';

	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="page-link">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}

if ($pagenum != $last) {
$next = $pagenum + 1;
$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="page-link">ถัดไป</a> ';
}
	}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>

<title>รายชื่อทั้งหมด</title>
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
<!--Header--> 
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->
<div class="page-header_wrap">

      <div class="page-heading">
        <h1>รายชื่อทั้งหมด</h1>
      </div>
    </div>

	   <nav aria-label="Page navigation example">
  		<ul class="pagination justify-content-center">
   		 <li class="page-item disabled">
	   		<div align = 'center' id="pagination_controls"><?php echo $paginationCtrls; ?></div>
<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-push-4">
       
          <div class="sorting-count">


							<?php
								while($crow = mysqli_fetch_array($nquery)){
							?>
    
		<div class="product-listing-m gray-bg">
          <div class="product-listing-img"><img src="admin/img/uplode/<?php echo $crow['Vimage1'];?>" class="img-responsive" alt="Image" width="250" /> </a> 
          </div>
          <div class="product-listing-content">
		  <h5><a href="details.php?vhid=<?php echo $crow['id'];?>"><?php echo $crow['Fullname'];?> , <?php echo $crow['Nickname'];?></a></h5>
		  <h5 class="list-price">อายุ <?php echo $crow['Age'];?> ปี</h5>
            <ul>
              <h5><h5 class="fa fa-user" aria-hidden="true"> เพศ  <?php echo $crow['Sex'];?></h5></h5>
              <h5><h5 class="fa fa-calendar" aria-hidden="true"> สถานที่ <?php echo $crow['Province'];?> </h5></h5>
            </ul>
		<br>
            <a target ="_blank" href="details.php?vhid=<?php echo $crow['id'];?>" class="btn">ข้อมูลเพิ่มเติม <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
        </div>
		
        
							<?php
									}
							?>
</div>

      <!--Side-Bar-->
      <aside class="col-md-4 col-md-pull-12 ">
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
					<option value=""> กรุณาเลือกเพศที่ต้องการค้นหา </option>
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
<option value=""> กรุณาเลือกสาเหตุที่ต้องการค้นหา </option>

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
    
<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 


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