

<?php  
	include("include/connection.php");
	include("include/header.php");
			$name ="";
			$price="";
			$idate="";
			$emp="";
		$id = $_GET["id"];
	if (isset($_POST["subbtn"])) {
		if (!empty($_POST["name"]) && !empty($_POST["price"]) && !empty($_POST["date"])) {
				$name = $_POST["name"];
				$price = $_POST["price"];
				$date = $_POST["date"];
				$employee = $_POST["employee"];
			}			
				$update = mysqli_query($con, "UPDATE items SET item_name = '$name', item_price = $price, item_date = '$idate', employee_id= $emp WHERE item_id = $id ");
				if ($update) {
					echo "Successfully Updated";
					header("location:index.php");
				}else{
					echo "Update Failed";
					header("location:edit_item.php");
				}

		}
		
		$result = mysqli_query($c, "SELECT employee_id, emp_name FROM employees");

		$resulti = mysqli_query($c, "SELECT * FROM items WHERE item_id = $id");
		$rowi = mysqli_fetch_row($resulti);
?>

        <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			   <ul class="nav nav-pills">
			   <li role="presentation" class="active"><a href="index.php"> برگشت </a></li>

			   </ul>
			</div>   
       </div>
       <br>
        <div class="row">
			<div class="pull col-lg-9 col-md-9">
			<h2 class="title">ویرایش جنس</h2>
			<br>
				 <form class="form-horizontal" role="form" action="" method="post">
					<div class="form-group">
					<label class="control-label col-sm-2" for="name"><p>نام جنس:</p></label>
					<div class="col-sm-10">
					  <input type="text" value="<?php if(!empty($rowi[1])){ echo $rowi[1];} ?>" class="form-control" name="name" >
					</div>
					
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="price"><p>قیمت:</p></label>
						<div class="col-sm-10">
						  <input type="text" value="<?php if(!empty($rowi[2])){ echo $rowi[2];} ?>" class="form-control" name="price">
					</div>
					</div>	
					<div class="form-group">
					<label class="control-label col-sm-2" for="idate"><p>تاریخ:</p></label>
					<div class="col-sm-10">
					  <input type="text" value="<?php if(!empty($rowi[3])){ echo $rowi[3];} ?>" placeholder="YYYY-MM-DD" class="form-control" name="idate">
					</div>
					</div>
					
					<div class="form-group">
					<label class="control-label col-sm-2" for="price"><p>کارمند:</p></label>
						<div class="col-sm-10">
							<select name="employee" class="form-control">
			      	<?php 
			      		if ($result) {
			      			while ($row = mysqli_fetch_row($result)) {
			      				if ($rowi[4] == $row[0]) {
			      					echo "<option selected= 'selected' value= '".$row[0]."'> ".$row[1]."</option>";
			      				}else{
			      					echo "<option value ='" .$row[0]."'> " .$row[1]. "</option>";	
			      				}
			      				
			      			}
			      		}

			      	?>
							</select>
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