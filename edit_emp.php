

<?php  
	include("include/connection.php");
	include("include/header.php");
			
	$name = ""; $fname=""; $surname =""; $job = "";	
	$id = $_GET['id'];	
	if (isset($_POST["subbtn"])) {
		
		if (!empty($_POST["name"]) && !empty($_POST["fname"]) && !empty($_POST["surname"]) && !empty($_POST["job"])) {
			$name = $_POST["name"];
			$fname = $_POST["fname"];
			$surname = $_POST["surname"];
			$job = $_POST["job"];
		}

		$update = mysqli_query($c, "UPDATE employees SET emp_name = '$name', emp_fname = '$fname', emp_surname = '$surname', emp_job= '$job' WHERE emp_id = $id ");
		if ($update) {
			echo "Successfully Updated";
			header("location:list_emp.php");
		}else{
			echo "Update Failed";
			header("location:edit_emp.php");
		}

		}else{
	
		$result = mysqli_query($c, "SELECT * FROM employees WHERE emp_id = $id");
		$row = mysqli_fetch_row($result);
	}	
?>

        <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
			   <ul class="nav nav-pills">
			   <li role="presentation" class="active"><a href="list_emp.php"> برگشت </a></li>

			   </ul>
			</div>   
       </div>
       <br>
        <div class="row">
       <div class="pull col-lg-9 col-md-9">
		<h2 class="title">ویرایش کارمند</h2>
			 <form class="form-horizontal" action="" method="post">
				<div class="form-group">
				<label class="control-label col-sm-2" for="name">نام کارمند:</label>
				<div class="col-sm-10">
				  <input type="text" value="<?php if(!empty($row[1])){ echo $row[1]; } ?>" class="form-control"  name="name" placeholder="نام کارمند">
				</div>
				
				</div>
				<div class="form-group">
				<label class="control-label col-sm-2" for="name">نام پدر:</label>
				<div class="col-sm-10">
				  <input type="text" value="<?php if(!empty($row[2])){ echo $row[2]; } ?>" class="form-control"  name="fname" placeholder="نام پدر">
				</div>
				</div>	
				<div class="form-group">
				<label class="control-label col-sm-2" for="name">تخلص کارمند:</label>
				<div class="col-sm-10">
				  <input type="text" value="<?php if(!empty($row[3])){ echo $row[3]; } ?>" class="form-control"  name="surname" placeholder="تخلص">
				</div>
				</div>
				<div class="form-group">
				<label class="control-label col-sm-2" for="name">وظیفه:</label>
				<div class="col-sm-10">
				  <input type="text" value="<?php if(!empty($row[4])){ echo $row[4]; } ?>" class="form-control"  name="job" placeholder="وظیفه">
				</div>
				</div>		
				<div class="form-group">
				<div class="pull-left col-md-2">
				  <button type="submit" name="subbtn" class="btn btn-success btn-block">ویرایش</button>
				</div>
				</div>

				</form>
	   </div>  
       </div>
		
    </div>

<?php  
	include("include/footer.php");

?>