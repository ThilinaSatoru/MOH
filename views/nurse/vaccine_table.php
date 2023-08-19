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

		th,
		td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
			background-color: burlywood;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 15px;
		}

		th {
			background-color: slategray;
			color: whitesmoke;
			font-size: 20px;
		}
	</style>
</head>

<body><br>
	<h3>Search hear for Vaccine detail</h3>
	<div class="container">

		<div class="row">
			<div class="col-md-7">

				<form action="" method="POST">
					<div class="input-group mb-3">
						<input type="text" name="search" required value="<?php if (isset($_POST['search'])) {
																				echo $_POST['search'];
																			} ?>" class="form-control" placeholder="Search Vaccine batch ID or Vaccine name">
						<button type="submit" class="btn btn-primary">Search</button>
					</div>
				</form>

			</div>
		</div>

		<table>

			<tr>
				<th>VACCINE ID</th>
				<th>EXPIRE DATE</th>
				<th>MANUFACTURE DATE</th>
				<th>VACCINE REGISTER DATE</th>
				<th>NUMBER OF BOTTLES STORED</th>
				<th>AVELABLE BOTTLES IN STOCK</th>
				<th>VACCINE NAME</th>
			</tr>

			<?php
			if (isset($_POST['search'])) {
				$id = $_POST["search"];
				$filtervalues = $_POST['search'];
				$id = $_POST["search"];
				$query = "SELECT * FROM vaccine  WHERE CONCAT(batchID,vaccineName) LIKE '%$filtervalues%' ";
				$query_run = mysqli_query($con, $query);

				if (mysqli_num_rows($query_run) > 0) {
					foreach ($query_run as $items) {
			?>
						<tr>
							<td><? $items['batchID']; ?></td>
							<td><? $items['expireDate']; ?></td>
							<td><? $items['manufacturedate']; ?></td>
							<td><? $items['VaccineregisterDate']; ?></td>
							<td><? $items['numberofBottels']; ?></td>
							<td><? $items['avelableBottels']; ?></td>
							<td><? $items['vaccineName']; ?></td>


						</tr>
					<?php
					}
				} else {
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

		<h1>VACCINE REPORT TABLE</h1>
		<br>
		<br>
		<table>
			<tr>
				<th>VACCINE ID</th>
				<th>EXPIRE DATE</th>
				<th>MANUFACTURE DATE</th>
				<th>VACCINE REGISTER DATE</th>
				<th>NUMBER OF BOTTLES STORED</th>
				<th>AVELABLE BOTTLES IN STOCK</th>
				<th>VACCINE NAME</th>
			</tr>
			<?php
			// $result = $con->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["batchID"] . "</td>";
					echo "<td>" . $row["expireDate"] . "</td>";
					echo "<td>" . $row["manufacturedate"] . "</td>";
					echo "<td>" . $row["VaccineregisterDate"] . "</td>";
					echo "<td>" . $row["numberofBottels"] . "</td>";
					echo "<td>" . $row["avelableBottels"] . "</td>";
					echo "<td>" . $row["vaccineName"] . "</td>";
					echo "</tr>";
				}
			}

			$con->close();
			?>
		</table>
</body>

</html>