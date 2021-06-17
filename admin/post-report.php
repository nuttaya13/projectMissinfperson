<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

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
	$vimage1=$_FILES["img1"]["name"];
	$vimage2=$_FILES["img2"]["name"];
	$status=1;
	$useremail=$_SESSION['login'];
	move_uploaded_file($_FILES["img1"]["tmp_name"],"admin/img/uplode/".$_FILES["img1"]["name"]);
	move_uploaded_file($_FILES["img2"]["tmp_name"],"admin/img/uplode/".$_FILES["img2"]["name"]);
	
	$sql="INSERT INTO tblreport (Fullname,Brand,Nickname,Sex,Age,Typepreson,Weigh,Heigh,DateMissing,TimeMissing,Clothes,Notable,Place,Tambol,District,Province,Overview,CallPhone,Vimage1,Vimage2,Status,userEmail) 
				VALUES(:fullname,:brand,:nickname,:sex,:age,:typepreson,:weigh,:heigh,:datemissing,:timemissing,:clothes,:notable,:place,:tambol,:district,:province,:overview,:callphone,:vimage1,:vimage2,:status,:useremail)";
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
	$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
	$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
	$query->bindParam(':status',$status,PDO::PARAM_STR);
	$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
{
$msg="เพิ่มข้อมูลสำเร็จ";
}
else 
{
$error="ผิดพลาด โปรดลองอีกครั้ง";
}

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
	
	<title> Admin เพิ่มข้อมูลค้นหาย</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
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
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">เพิ่มข้อมูลคนหาย</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">ชื่อ สกุล<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="fullname" class="form-control white_bg" required>
</div>
<label class="col-sm-2 control-label">สาเหตุ<span style="color:red">*</span></label>
<div class="col-sm-4">
<select  name="brandname" required>
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
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
<?php }} ?>
<option value="อื่นๆ"> อื่นๆ </option>
</select>
</div></div>	
<div class="form-group">
<label class="col-sm-2 control-label">ชื่อเล่น<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="nickname" class="form-control white_bg" required>
</div>
<label class="col-sm-2 control-label">เพศ<span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="sex" required>
<option value=""> Select </option>
<option value="ชาย">ชาย</option>
<option value="หญิง">หญิง</option>
</select>
</div>
</div>

<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">อายุ<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="age" class="form-control white_bg" required>
</div>
<label class="col-sm-2 control-label">ความสัมพันธ์กับผู้สูญหาย<span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="typepreson" required>
<option value=""> Select </option>
<option value="บิดา">บิดา</option>
<option value="มารดา">มารดา</option>
<option value="อื่นๆ">อื่นๆ</option> 
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">น้ำหนัก<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="weigh" class="form-control white_bg" required>
</div>
<label class="col-sm-2 control-label">ส่วนสูง<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="heigh" class="form-control white_bg" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">วันที่หายตัว<span style="color:red">*</span></label>
<div class="col-sm-2">
<input type="date" id="datepicker" name="datemissing" class="form-control white_bg" required>
</div>
<label class="col-sm-4 control-label">เวลาที่หายตัว<span style="color:red">*</span></label>
<div class="col-sm-2">
<input type="time"  id="Time" name="timemissing" class="form-control white_bg" value="">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">การแต่งกาย ณ วันที่สูญหาย<span style="color:red">*</span></label>
<div class="col-sm-4">
<textarea class="form-control white_bg" name="clothes" rows="3" required></textarea>
</div>
<label class="col-sm-2 control-label">ตำหนิ/รูปพรรณ<span style="color:red">*</span></label>
<div class="col-sm-4">
<textarea class="form-control white_bg" name="notable" rows="3" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">สถานที่สูญหาย<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="place" class="form-control white_bg" required>
</div>
<label class="col-sm-2 control-label">ตำบล<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="tambol" class="form-control white_bg" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">อำเภอ<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="district" class="form-control white_bg" required>
</div>
<label class="col-sm-2 control-label">จังหวัด<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="province" class="form-control white_bg" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">หมายเหตุ</label>
<div class="col-sm-4">
<textarea class="form-control white_bg" name="overview" rows="3"></textarea>
</div>
<label class="col-sm-2 control-label">เบอร์โทรติดต่อกลับ<span style="color:red">*</span> </label>
<div class="col-sm-4">
<input type="text" name="callphone" class="form-control white_bg" maxlength="10" required>
</div>
</div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>อัพโหลดผู้สูญหาย</b></h4>
</div>
</div>

<div class="form-group">
<div class="col-sm-4">
รูปใบน้าชัดเจน <span style="color:red">*</span><input type="file" name="img1" required>
</div>
<div class="col-sm-4">
รูปถ่ายเพิ่มเติม<input type="file" name="img2">
</div>
</div>


											<div class="form-group">
												<div class="col-sm-12 col-sm-offset-3">
													<button class="btn btn-default" type="reset">ยกเลิก</button>
													<button class="btn btn-primary" name="submit" type="submit">ยืนยัน</button>
												</div>
											</div>

										</form>
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
<?php } ?>