

<?php  
	include("include/connection.php");
	include("include/header.php");
			$name ="";
			$price="";
			$idate="";
			$emp="";
		if(isset($_POST['subbtn'])){
			if (!empty($_POST["name"])) {
				$name = $_POST["name"];
			}
			if (!empty($_POST["price"])) {
				$price = $_POST["price"];
			}
			if (!empty($_POST["idate"])) {
				$idate = $_POST["idate"];
				}
			if (!empty($_POST["employee"])) {
				$emp = $_POST["employee"];
			}
			$insertsql = "INSERT INTO items VALUE(NULL,'$name',$price,'$idate',$emp)";
			if (!empty($name) && !empty($price) && !empty($idate)) {	
			if(mysqli_query($c,$insertsql)){
				echo "رکورد موفقانه اضافه شد";
			}else{
				echo "record could't added!";
				}
			}else{
				echo "Please fill ";
			}
		}
			$sql = "SELECT emp_id,emp_name from employees";
			$r = mysqli_query($c,$sql);
?>

        <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="menu">
			   <ul class="nav nav-pills">
			   <li role="presentation" class="active"><a href="index.php"> برگشت </a></li>

			   </ul>
			</div>   
       </div>
       <br>
        <div class="row" id="content">
			<div class="pull col-lg-9 col-md-9">
			<h2 class="title">اضافه کردن جنس جدید</h2>
			<br>
				 <form class="form-horizontal" role="form" action="" method="post">
					<div class="form-group">
					<label class="control-label col-sm-2" for="name"><p>نام جنس:</p></label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="name" name="name" >
					</div>
					
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="price"><p>قیمت:</p></label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="price" name="price">
					</div>
					</div>	
					<div class="form-group">
					<label class="control-label col-sm-2" for="idate"><p>تاریخ:</p></label>
					<div class="col-sm-10">
					  <input type="text" placeholder="YYYY-MM-DD" class="form-control" id="idate" name="idate">
					</div>
					</div>
					
					<div class="form-group">
					<label class="control-label col-sm-2" for="price"><p>کارمند:</p></label>
						<div class="col-sm-10">
							<select name="employee" id="employee" class="form-control">
			      	<?php 
			      		if ($r) {
			      			while ($row = mysqli_fetch_row($r)) {
			      				echo "<option value ='" .$row[0]."'> " .$row[1]. "</option>";
			      			}
			      		}

			      	?>
							</select>
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