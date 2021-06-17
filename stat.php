<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  ?>
  
<!DOCTYPE HTML>
<html lang="en">
<head>

<title>สถิติ</title>

	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="a/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="a/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="a/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="a/css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="a/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="a/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="a/css/style.css">
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart for Sarah's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawSarahChart);

      // Draw the pie chart for the Anthony's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawAnthonyChart);

      // Callback that draws the pie chart for Sarah's pizza.
      function drawSarahChart() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
		  ['ผู้สูญหายทั้งหมด', 13],
		  ['อยู่ระหว่างการดำเนินการ', 12],
          ['ผู้สูญหายที่พบแล้ว', 1]
        ]);

        // Set options for Sarah's pie chart.
        var options = {title:'รายงานประจำเดือน สิงหาคม',
                       width:600,
                       height:500};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
        chart.draw(data, options);
      }

      // Callback that draws the pie chart for Anthony's pizza.
      function drawAnthonyChart() {

        // Create the data table for Anthony's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['ผู้สูญหายทั้งหมด', 13],
          ['เพศชาย', 6],
          ['เพศหญิง', 7]
        ]);

        // Set options for Anthony's pie chart.
        var options = {title:'รายงานประจำเดือน สิงหาคม ตามเพศ',
                       width:600,
                       height:500};

        // Instantiate and draw the chart for Anthony's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
        chart.draw(data, options);
      }
    </script>
</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">รายการสถิติทั้งหมด</h2>
						
						<div class="row">
							<div class="col-md-10">
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
													<div class="stat-panel-title text-uppercase h3">จำนวนผู้สูญหาย</div>
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
													<div class="stat-panel-title text-uppercase h3">พบตัวผู้สูญหาย</div>
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
                          <div class="stat-panel-title text-uppercase h3">ยังไม่พบตัวผู้สูญหาย</div>
                          </div>
											</div>
												</div>
									</div>


					
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-dark text-light">
												<div class="stat-panel text-center">

									<?php 
$sql4 ="SELECT id from tblreport where Sex='ชาย' ";
$query4= $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$brands=$query4->rowCount();
?>												
													<div class="stat-panel-number h1 "><?php echo htmlentities($brands);?></div>
                          <div class="stat-panel-title text-uppercase h3">เพศชาย</div>
                          </div>
											</div>
												</div>
									</div>


									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">

									<?php 
$sql5 ="SELECT id from tblreport where Sex='หญิง' ";
$query5= $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$brands=$query5->rowCount();
?>												
													<div class="stat-panel-number h1 "><?php echo htmlentities($brands);?></div>
                          <div class="stat-panel-title text-uppercase h3">เพศหญิง</div>
                          </div>
											</div>
												</div>
									</div>

			</div>
		</div>
	</div>
	</div>
	</div>
	<h3>ประจำเดือน</h3>
	<?php
    $months = array(
        'Jan' => 'มกราคม',
        'Feb' => 'กุมภาพันธ์',
        'Mar' => 'มีนาคม',
        'Apr' => 'เมษายน',
        'May' => 'พฤษภาคม',
        'Jun' => 'มิถุนายน',
        'Jul' => 'กรกฎาคม',
        'Aug' => 'สิงหาคม',
        'Sep' => 'กันยายน',
        'Oct' => 'ตุลาคม',
        'Nov' => 'พฤศจิกายน',
        'Dec' => 'ธันวาคม'
    );
?>
<Select name="search">
	<Option value="-">เดือน</option>
	<?php
    foreach ($months as $key => $value) {
        $selected = $key == date('M')?'Selected':'';
        echo "<Option value=\"{$key}\" {$selected}>{$value}</option>";
    }
    ?>
</Select>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
       <!--Table and divs that hold the pie charts-->
	<div class="col-12">
	   <table class="columns">
      <tr>
		<td><div id="Sarah_chart_div" style="border: 1px solid #ccc"></div></td>
		<td><div id="Anthony_chart_div" style="border: 1px solid #ccc"></div></td>
	  </tr>
    </table>
</script>
</div>



</body>
</html>
<?php ?>