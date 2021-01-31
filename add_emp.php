

<?php  
	include("include/connection.php");
	include("include/header.php");
	$name="";
	$fname="";
	$surname="";
	$job="";
	if(isset($_POST['subbtn'])){

	if(!empty($_POST['name'])){
		$name=$_POST['name'];
		
	}	
	if(!empty($_POST['fname'])){
		$fname=$_POST['fname'];
		
	}
	if(!empty($_POST['surname'])){
		$surname=$_POST['surname'];
		
	}
	if(!empty($_POST['job'])){
		$job=$_POST['job'];
		
	}
	$sql = "INSERT INTO employees VALUE(Null,'$name','$fname','$surname','$job')";
	if(mysqli_query($c,$sql)){
		echo "record successfully added";
	}
	else{
		echo "added record has a problem";
	}
			
	}
?>

        <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="menu">
			   <ul class="nav nav-pills">
			   <li role="presentation" class="active"><a href="list_emp.php"> برگشت </a></li>

			   </ul>
			</div>   
       </div>
       <br>
        <div class="row" id="content">
       <div class="pull col-lg-9 col-md-9">
		<h2 class="title">اضافه کردن کارمند جدید</h2>
			 <form class="form-horizontal" action="" method="post">
				<div class="form-group">
				<label class="control-label col-sm-2" for="name">نام کارمند:</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="name" name="name" placeholder="نام کارمند">
				</div>
				
				</div>
				<div class="form-group">
				<label class="control-label col-sm-2" for="name">نام پدر:</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="name" name="fname" placeholder="نام پدر">
				</div>
				</div>	
				<div class="form-group">
				<label class="control-label col-sm-2" for="name">تخلص کارمند:</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="name" name="surname" placeholder="تخلص">
				</div>
				</div>
				<div class="form-group">
				<label class="control-label col-sm-2" for="name">وظیفه:</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="name" name="job" placeholder="وظیفه">
				</div>
				</div>		
				<div class="form-group">
				<div class="pull-left col-md-2">
				  <button type="submit" name="subbtn" class="btn btn-success btn-block">اضافه کردن</button>
				</div>
				</div>

				</form>
	   </div>  
       </div>
		
    </div>

<?php  
	include("include/footer.php");

?>