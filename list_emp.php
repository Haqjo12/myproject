

<?php  
	include("include/connection.php");
	include("include/header.php");
		if(!empty($_POST['search'])){
			$search = $_POST['search'];
			$sql = "SELECT * FROM employees"; 
			$sql ." WHERE CONCAT(emp_name,emp_fnam,emp_surname,emp_job) Like '%$search%'";
			
			mysqli_set_charset($c,"utf8");
			$result = mysqli_query($c,$sql);			
		}
		else{
			$sql = "SELECT * FROM employees";
			
			mysqli_set_charset($c,"utf8");
			$result = mysqli_query($c,$sql);
		}
?>

        <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="menu">
			   <ul class="nav nav-pills">
			   <li role="presentation" class="active"><a href="add_item.php"> جنس جدید </a></li>
			   <li role="presentation"><a href="add_emp.php"> کارمند جدید </a></li>
			   <li role="presentation"><a href="index.php"> لیست اجناس </a></li>
			   </ul>
			</div>   
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="search">
				
                <form action="" method="post" class="form-inline">
						<div >
							<span class="input-group-addon">
							<input type="text" class="form-control" name="search" placeholder="جستجو">
							</span>
								<span class="input-group-btn" id="search-icon">
									<button class="btn btn-primary"><p></p>
								<span class="glyphicon glyphicon-search"></span>
								جستجو
							</button>
							</span>
						</div>
					</form>				
			    </div>
			
			<div class="col-md-2">
				<h2 class="title">لیست کارمندان</h2>
			</div>

       </div>
       <br>
        <div class="row" id="content">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
				<table class="table table-striped">
					<thead>
						<tr class="info">
							<th>نام کارمند</th>
							<th>نام پدر</th>
							<th>تخلص</th>
							<th>وظیفه</th>
							<th>عملیات</th>
						</tr>
					</thead>
					<tbody>
					<?php
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_row($result)){
								echo "<tr>";
									echo "<td>".$row[1]."</td>";
									echo "<td>".$row[2]."</td>";
									echo "<td>".$row[3]."</td>";
									echo "<td>".$row[4]."</td>";
									echo "<td><a href='edit_emp.php?id=".$row[0]."'>اصلاح</a></td>";
								echo "</tr>";
							}
						}
					?>
						
					</tbody>
				</table>
			</div>   
       </div>
		
    </div>

<?php  
	include("include/footer.php");

?>