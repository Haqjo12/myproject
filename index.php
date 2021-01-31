

<?php  
	include("include/connection.php");
	include("include/header.php");
		if(!empty($_POST['search'])){
			$search = $_POST['search'];
			$sql = "SELECT item_id,item_name,item_price,item_date,emp_name FROM items,employees
			WHERE item_emp_id=emp_id AND CONCAT(item_name,item_price,item_date,emp_name) Like '%$search%'";
			
			mysqli_set_charset($c,"utf8");
			$result = mysqli_query($c,$sql);			
		}
		else{
			$sql = "SELECT item_id,item_name,item_price,item_date,emp_name FROM items,employees
			WHERE item_emp_id=emp_id";
			mysqli_set_charset($c,"utf8");
			$result = mysqli_query($c,$sql);
		}
?>

        <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="menu">
			   <ul class="nav nav-pills">
			   <li role="presentation" class="active"><a href="add_item.php"> جنس جدید </a></li>
			   <li role="presentation"><a href="add_emp.php"> کارمند جدید </a></li>
			   <li role="presentation"><a href="list_emp.php"> لیست کارمندان </a></li>
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
				<h2 class="title">لیست اجناس</h2>
			</div>

       </div>
       <br>
        <div class="row" id="content">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
				<table class="table table-striped">
					<thead>
						<tr class="info">
							<th>نام حنس</th>
							<th>قیمت</th>
							<th>تاریخ</th>
							<th>کارمند</th>
							<th>عملیات</th>
						</tr>
					</thead>
					<tbody>
					<?php
						
						mysqli_set_charset($c,"utf8");
						$result = mysqli_query($c,$sql);
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_row($result)){
								echo "<tr>";
									echo "<td>".$row[1]."</td>";
									echo "<td>".$row[2]."</td>";
									echo "<td>".$row[3]."</td>";
									echo "<td>".$row[4]."</td>";
									echo "<td><a href='edit_item.php?id=".$row[0]."'>اصلاح</a></td>";
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