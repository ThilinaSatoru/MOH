<!DOCTYPE html>
<html>
<head>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Report Table</title>
        <style>
table {
	border-collapse: collapse;
	width: 2300px;
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
	font-size: 18px;
	font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

        </style>
</head>
<body><br>
	<h3>Search hear for Family detail--></h3>
<div class="container">

                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="POST">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" class="form-control" placeholder="Search mother NIC or father NIC">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    
<table>

<tr>
			<th>FAMILY ID</th>
			<th>ADDRESS</th>
			<th>CONTACT</th>
			<th>MOTHER NIC</th>
			<th>MOTHER NAME</th>
			<th>BIRTH DAY</th>
            <th>MOTHER AGE</th>
			<th>AGE OF MARREGE MOTHER</th>
            <th>CONTACT NUMBER MOTHER</th>
			<th>FATHER NIC</th>
			<th>FATHER NAME</th>
			<th>BIRTH DAY</th>
			<th>FATHER AGE</th>
			<th>AGE OF MARRAGE FATHER</th>
			<th>FATHER CONTACT NUMBER</th>
            
		</tr>

<?php 
	require_once('conection.php');
	if(isset($_POST['search']))
	{
		$id=$_POST["search"];
		$filtervalues = $_POST['search'];
		$id=$_POST["search"];
		$query = "SELECT * FROM family  WHERE CONCAT(familyID,mothername,fathername,mothernic,fathernic) LIKE '%$filtervalues%' ";
		$query_run = mysqli_query($con, $query);

		if(mysqli_num_rows($query_run) > 0)
		{
			foreach($query_run as $items)
			{
				?>
				<tr>
					<td><?= $items['familyID']; ?></td>
					<td><?= $items['address']; ?></td>
					<td><?= $items['contactnum']; ?></td>
					<td><?= $items['mothernic']; ?></td>
					<td><?= $items['mothername']; ?></td>
					<td><?= $items['motherbirthday']; ?></td>
					<td><?= $items['motherage']; ?></td>
					<td><?= $items['motherageofmarrege']; ?></td>
					<td><?= $items['mothercontact']; ?></td>
					<td><?= $items['fathernic']; ?></td>
					<td><?= $items['fathername']; ?></td>
					<td><?= $items['fatherbirthday']; ?></td>
					<td><?= $items['fathgerage']; ?></td>
					<td><?= $items['fatherageofmarrege']; ?></td>
					<td><?= $items['fathercontact']; ?></td>
					
				</tr>
				<?php
			}
		}
		else
		{
			?>
				<tr>
					<td colspan="11">No Record Found</td>
				</tr>
			<?php
		}
	}
?>  


</table>	

<br>
	<h1>FAMILY REPORT DETAILS</h1>

<br>
<br>
	<table>
		<tr>
			<th>FAMILY ID</th>
			<th>ADDRESS</th>
			<th>CONTACT</th>
			<th>MOTHER NIC</th>
			<th>MOTHER NAME</th>
			<th>BIRTH DAY</th>
            <th>MOTHER AGE</th>
			<th>AGE OF MARREGE MOTHER</th>
            <th>CONTACT NUMBER MOTHER</th>
			<th>FATHER NIC</th>
			<th>FATHER NAME</th>
			<th>BIRTH DAY</th>
			<th>FATHER AGE</th>
			<th>AGE OF MARRAGE FATHER</th>
			<th>FATHER CONTACT NUMBER</th>
            
		</tr>
		              					   
		<?php		
		    require_once('conection.php');
			$sql = "SELECT * FROM family";
			//re means table name
			$result = $con->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["familyID"] . "</td>";
					echo "<td>" . $row["address"] . "</td>";
					echo "<td>" . $row["contactnum"] . "</td>";
					echo "<td>" . $row["mothernic"] . "</td>";
					echo "<td>" . $row["mothername"] . "</td>";
					echo "<td>" . $row["motherbirthday"] . "</td>";
					echo "<td>" . $row["motherage"] . "</td>";
                    echo "<td>" . $row["motherageofmarrege"] . "</td>";
					echo "<td>" . $row["mothercontact"] . "</td>";
					echo "<td>" . $row["fathernic"] . "</td>";
					echo "<td>" . $row["fathername"] . "</td>";
					echo "<td>" . $row["fatherbirthday"] . "</td>";
					echo "<td>" . $row["fathgerage"] . "</td>";
					echo "<td>" . $row["fatherageofmarrege"] . "</td>";
                    echo "<td>" . $row["fathercontact"] . "</td>";

					echo "</tr>";
				}
			} 

			$con->close();
		?>
	</table>
</body>
</html>
