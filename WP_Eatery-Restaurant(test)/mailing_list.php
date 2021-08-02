<?php include("header.php"); ?>
            <div id="content">
               <?php 
			  $database = new mysqli ("localhost", "wp_eatery", "password", "wp_eatery");
				
				$sql = "SELECT * FROM mailinglist;";
				$result = mysqli_query($database,$sql);
				while($row = $result->fetch_assoc()) {
				echo "id: " . $row["_id"]. " - Name: " . $row["customerName"]. " Phone: " . $row["phoneNumber"]. " Email: " . $row["emailAddress"]. " Reference: " . $row["referrer"]. "<br>";
				}
				//$result = mysqli->query('SELECT * FROM mailinglist');
				//$result = $database->query($sql);
				//$database->close();
				?>
            </div><!-- End Content -->
<?php include("footer.php"); ?>
