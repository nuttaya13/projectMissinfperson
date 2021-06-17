<?php
//error_reporting(0);
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$password=md5($_POST['password']); 
$idcard=$_POST['idcard'];
$sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password,idCard) VALUES(:fname,:email,:mobile,:password,:idcard)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':idcard',$idcard,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('ลงทะเบียนสำเร็จ สามารถเข้าสู่ระบบได้');</script>";
}
else 
{
echo "<script>alert('มีบางอย่างผิดพลาด โปรดลงอีกครั้ง');</script>";
}
}

?>

<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("รหัสผ่านไม่ตรงกัน  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">สมัครสมาชิก</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" onSubmit="return valid();">
                <div class="form-group">
                  <input type="text" class="form-control white_bg" name="fullname" placeholder="ชื่อ สกุล" required="required">
                </div>
                      <div class="form-group">
                  <input type="text" class="form-control white_bg" name="mobileno" placeholder="เบอร์โทรศัพท์" maxlength="10" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control white_bg" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="อีเมล์ใช้ในการเข้าสู่ระบบ" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group">
                  <input type="password" class="form-control white_bg" name="password" placeholder="รหัสผ่าน" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control white_bg" name="confirmpassword" placeholder="ยืนยันรหัสผ่าน" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control white_bg" name="idcard" placeholder="เลขบัตรประชาชน13หลัก" maxlength="13" required="required">
                </div>
                <div class="form-group">
                  <input type="submit" value="ยืนยันการสมัครสมาชิก" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>มีบัญชีแล้ว ? <a href="#loginform" data-toggle="modal" data-dismiss="modal">เข้าสู่ระบบ ที่นี่</a></p>
      </div>
    </div>
  </div>
</div>