<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Report Table</title>
        <style>
table {
	border-collapse: collapse;
	width: 100%;
}

th, td {
	padding: 8px;
	text-align: left;
	border-bottom: 1px solid #ddd;
	background-color:burlywood;
	font-size:17px ;
}

th {
	background-color: blueviolet;
	color:yellow;
	font-size: 20px;
	font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

        </style>
</head>
<body>
<body><br>
<h3>Search hear for Baby detail--></h3>
<div class="container">

                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="POST">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" class="form-control" placeholder="Search Vaccine Baby ID or name">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    
<table>

<tr>
            <th>BABY ID</th>
			<th>BABY NAME</th>
			<th>GENDER</th>
			<th>DATE OF REGISTRATION</th>
			<th>WEIGHT</th>
			<th>DATE OF BIRTH</th>
			<th>FAMILY ID</th>
</tr>
<?php 
	require_once('conection.php');
	if(isset($_POST['search']))
	{
		$id=$_POST["search"];
		$filtervalues = $_POST['search'];
		$id=$_POST["search"];
		$query = "SELECT * FROM baby  WHERE CONCAT(babyID,babyname) LIKE '%$filtervalues%' ";
		$query_run = mysqli_query($con, $query);

		if(mysqli_num_rows($query_run) > 0)
		{
			foreach($query_run as $items)
			{
				?>
				<tr>
					<td><?= $items['babyID']; ?></td>
					<td><?= $items['babyname']; ?></td>
					<td><?= $items['gender']; ?></td>
					<td><?= $items['dateofReg']; ?></td>
					<td><?= $items['weight']; ?></td>
					<td><?= $items['dob']; ?></td>
					<td><?= $items['familyID']; ?></td>
					
					
				</tr>
				<?php
			}
		}
		else
		{
			?>
				<tr>
					<td colspan="7">No Record Found</td>
				</tr>
			<?php
		}
	}
?>
</table>
<br>
<br>
	<h1>BABY REPORT TABLE</h1>

	<table>
		<tr>
			<th>BABY ID</th>
			<th>BABY NAME</th>
			<th>GENDER</th>
			<th>DATE OF REGISTRATION</th>
			<th>WEIGHT</th>
			<th>DATE OF BIRTH</th>
			<th>FAMILY ID</th>
		</tr>
		<?php
		
		    require_once('conection.php');
			$sql = "SELECT * FROM baby";
			//re means table name
			$result = $con->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["babyID"] . "</td>";
					echo "<td>" . $row["babyname"] . "</td>";
					echo "<td>" . $row["gender"] . "</td>";
					echo "<td>" . $row["dateofReg"] . "</td>";
					echo "<td>" . $row["weight"] . "</td>";
					echo "<td>" . $row["dob"] . "</td>";
					echo "<td>" . $row["familyID"] . "</td>";
					echo "</tr>";
				}
			} 

			$con->close();
		?>
	</table>
</body>
</html>
