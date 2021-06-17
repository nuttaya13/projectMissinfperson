<?php
session_start();
error_reporting(0);
include('includes/config.php'); 

if(isset($_POST['submit']))

  { 	   
	$fullname=$_POST['fullname'];
	$brand=$_POST['brandname'];
	$nickname=$_POST['nickname'];
	$sex=$_POST['sex'];
	$age=$_POST['age'];
	$typepreson=$_POST['typepreson'];
	$weigh=$_POST['weigh'];
	$heigh=$_POST['heigh'];
	$datemissing=$_POST['datemissing'];
	$timemissing=$_POST['timemissing'];
	$clothes=$_POST['clothes'];
	$notable=$_POST['notable'];
	$place=$_POST['place'];
	$tambol=$_POST['tambol'];
	$district=$_POST['district'];
	$province=$_POST['province'];
	$overview=$_POST['overview'];
	$callphone=$_POST['callphone'];
	$status=$_POST['status'];
	$id=intval($_GET['id']);

	

$sql="update tblreport 
set fullname='$fullname',brand=$brand,nickname='$nickname',Sex='$sex',Age=$age,Typepreson='$typepreson',
Weigh=$weigh,Heigh=$heigh,DateMissing='$datemissing',TimeMissing='$timemissing',Clothes='$clothes',Notable='$notable',
Place='$place',Tambol='$tambol',District='$district',Province='$province',Overview='$overview',Callphone='$callphone',Status=$status 
where id=$id ";
/*$sql = "UPDATE tblreport SET Fullname=:fullname,Brand=:brand,Nickname=:nicknamr,Sex=:sex,
Age=:age,Typepreson=:typepreson,Weigh=weigh,Heigh=:heigh,DateMissing=:datemissing,TimeMissing=:timemissing,
Clothes=:clothes,Notable=:notable,Place=:place,Tambol=:tambol,District=:district,Province=:province,
Overview=:overview,CallPhone=:callphone WHERE id=:id ";*/

$stmt = $dbh->prepare($sql);
$stmt->execute();

$query = $dbh->prepare($sql);
$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':nickname',$nickname,PDO::PARAM_STR);
$query->bindParam(':sex',$sex,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':typepreson',$typepreson,PDO::PARAM_STR);
$query->bindParam(':weigh',$weigh,PDO::PARAM_STR);
$query->bindParam(':heigh',$heigh,PDO::PARAM_STR);
$query->bindParam(':datemissing',$datemissing,PDO::PARAM_STR);
$query->bindParam(':timemissing',$timemissing,PDO::PARAM_STR);
$query->bindParam(':clothes',$clothes,PDO::PARAM_STR);
$query->bindParam(':notable',$notable,PDO::PARAM_STR);
$query->bindParam(':place',$place,PDO::PARAM_STR);
$query->bindParam(':tambol',$tambol,PDO::PARAM_STR);
$query->bindParam(':district',$district,PDO::PARAM_STR);
$query->bindParam(':province',$province,PDO::PARAM_STR);
$query->bindParam(':overview',$overview,PDO::PARAM_STR);
$query->bindParam(':callphone',$callphone,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();


$msg="Data updated successfully";


}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>แก้ไขสถานะผู้สูญหาย</title>

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

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 

<link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
  <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <style>
    body {
      
      font-family: 'Source Sans Pro', sans-serif;

    }
    .demo {
      margin: 100px auto;
    }

    .doxdropdown-container {
      width: 250px;
      margin: 100px auto;
      position: relative;
    }

    .listselect {
      width: 100%;
      height: 50px;
      font-size: 100%;
      font-weight: bold;
      cursor: pointer;
      border-radius: 0;
      background-color: #c0392b;
      border: none;
      border-bottom: 2px solid #962d22;
      color: white;
      appearance: none;
      padding: 10px;
      padding-right: 38px;
      -webkit-appearance: none;
      -moz-appearance: none;
      transition: color 0.3s ease, background-color 0.3s ease, border-bottom-color 0.3s ease;
    }

    /* For IE <= 11 */
    select::-ms-expand {
      display: none; 
    }

    .select-icon {
      position: absolute;
      top: 4px;
      right: 4px;
      width: 30px;
      height: 36px;
      pointer-events: none;
      border: 2px solid #962d22;
      padding-left: 5px;
      transition: background-color 0.3s ease, border-color 0.3s ease;
    }
    .select-icon svg.icon {
      transition: fill 0.3s ease;
      fill: white;
    }

    select:hover,
    select:focus {
      color: #c0392b;
      background-color: white;
      border-bottom-color: #DCDCDC;
    }
    select:hover ~ .select-icon,
    select:focus ~ .select-icon {
      background-color: white;
      border-color: #DCDCDC;
    }
    select:hover ~ .select-icon svg.icon,
    select:focus ~ .select-icon svg.icon {
      fill: #c0392b;
    }

  </style>
  <link rel="stylesheet" href="jqueryui/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
  });
  </script>

<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>
	<?php include('includes/header.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
					<h2 class="page-title">แก้ไขสถานะการสูญหาย</h2>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
			<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

			
<?php 
$id=intval($_GET['id']);
$sql ="SELECT tblreport.*,tblbrands.BrandName,tblbrands.id as bid from tblreport join tblbrands on tblbrands.id=tblreport.Brand where tblreport.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{		?>

<form  method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="demo">
    <div class="doxdropdown-container">
    <select class="listselect" name="status" required>
        <option value="">กรุณาระบุสถานะ</option>
        <option value="1">ยังไม่พบ</option>
        <option value="0">พบแล้ว</option>
      </select>
      <div class="select-icon">
        <svg focusable="false" viewBox="0 0 104 128" width="18" height="35" class="icon">
          <path d="m2e1 95a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm0-3e1a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm0-3e1a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm14 55h68v1e1h-68zm0-3e1h68v1e1h-68zm0-3e1h68v1e1h-68z"></path>
        </svg>
      </div>
    </div>

			<div class="form-group">
				<label class="col-sm-2 control-label">ชื่อ สกุล<span style="color:red">*</span></label>
			<div class="col-sm-4">
				<input type="text" name="fullname" id = "fullname" class="form-control white_bg" value="<?php echo htmlentities($result->Fullname)?>" required>
			</div>


		<label class="col-sm-2 control-label">สาเหตุ<span style="color:red">*</span></label>
			<div class="col-sm-4">
			<select id="brandname" name="brandname" required>
<option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($result->BrandName); ?> </option>
<?php $ret="select id,BrandName from tblbrands";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
if($results->BrandName==$bdname)
{
continue;
} else{
?>


<option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->BrandName);?></option>
<?php }}} ?>

</select>

</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">ชื่อเล่น<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="nickname" class="form-control white_bg" value="<?php echo htmlentities($result->Nickname)?>" required>
</div>
<label class="col-sm-2 control-label">เพศ<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="select" name="sex" required>
<option value="<?php echo htmlentities($result->Sex);?>"> <?php echo htmlentities($result->Sex);?> </option>
<option value="ชาย">ชาย</option>
<option value="หญิง">หญิง</option>
</select>
</div>
</div>

<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">อายุ<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="age" class="form-control white_bg" value="<?php echo htmlentities($result->Age)?>" required>
</div>
<label class="col-sm-2 control-label">ความสัมพันธ์กับผู้สูญหาย<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="typepreson" name="typepreson" required>
<option value="<?php echo htmlentities($result->Typepreson);?>"> <?php echo htmlentities($result->Typepreson);?> </option>

<option value="บิดา">บิดา</option>
<option value="มารดา">มารดา</option>
<option value="อื่นๆ">อื่นๆ</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">น้ำหนัก<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="weigh" class="form-control white_bg" value="<?php echo htmlentities($result->Weigh)?>" required>
</div>
<label class="col-sm-2 control-label">ส่วนสูง<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="heigh" class="form-control white_bg" value="<?php echo htmlentities($result->Heigh)?>" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">วันที่หายตัว<span style="color:red">*</span></label>
<div class="col-sm-2">
<input type="date" id="datepicker" name="datemissing" class="form-control white_bg" value="<?php echo htmlentities($result->DateMissing)?>" required>
</div>
<label class="col-sm-4 control-label">เวลาที่หายตัว<span style="color:red">*</span></label>
<div class="col-sm-2">
<input type="time"  id="Time" name="timemissing" class="form-control white_bg" value="<?php echo htmlentities($result->TimeMissing)?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">การแต่งกาย ณ วันที่สูญหาย<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="clothes" class="form-control white_bg" value="<?php echo htmlentities($result->Clothes)?>"  required>
</div>
<label class="col-sm-2 control-label">ตำหนิ/รูปพรรณ<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="notable" class="form-control white_bg" value="<?php echo htmlentities($result->Notable)?>"  required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">สถานที่สูญหาย<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="place" class="form-control white_bg" value="<?php echo htmlentities($result->Place)?>"  required>
</div>
<label class="col-sm-2 control-label">ตำบล<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="tambol" class="form-control white_bg" value="<?php echo htmlentities($result->Tambol)?>"  required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">อำเภอ<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="district" class="form-control white_bg" value="<?php echo htmlentities($result->District)?>"   required>
</div>
<label class="col-sm-2 control-label">จังหวัด<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="province" class="form-control white_bg" value="<?php echo htmlentities($result->Province)?>"  required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">หมายเหตุ</label>
<div class="col-sm-4">
<input type="text" name="overview" class="form-control white_bg" value="<?php echo htmlentities($result->Overview)?>">
</div>
<label class="col-sm-2 control-label">เบอร์โทรติดต่อกลับ<span style="color:red">*</span> </label>
<div class="col-sm-4">
<input type="text" name="callphone" class="form-control white_bg" maxlength="10" value="<?php echo htmlentities($result->CallPhone)?>"  required>
</div>
</div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1<img src="admin/img/uplode/<?php echo htmlentities($result->Vimage1);?>" width="300"  style="border:solid 1px #000">
<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id)?>">Change Image</a>
</div>
<div class="col-sm-4">
Image 2<img src="admin/img/uplode/<?php echo htmlentities($result->Vimage2);?>" width="300"  style="border:solid 1px #000">
<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 2</a>
</div>
</div>						
<?php }} ?>

<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2" >
<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">ย้อนกลับ</button>													
<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">ยืนยันการแก้ไข</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php ?>