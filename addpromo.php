<?php
require_once("include/header.php");
?>
<div id="body">
	<div id="left_content">
		<?php include_once("include/left_content.php"); ?>
	</div>
	<div class="rcontent">
		<h1><span>Add Promo:</span></h1>
		<div id="data">
			To view a list of promos <a style="text-decoration:none" href="viewlist.php?list=promo">Click Here</a><br /><br />
			<?php
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				// Set $time to the current date and check if 'valid' exists in the POST request
				$time = strtotime(date("Y-m-d"));
				$date = isset($_POST['valid']) ? strtotime($_POST['valid']) : null;

				if ($date && $date > $time) {
					$result = mysqli_query($connect, "INSERT INTO promotion VALUES({$_POST['discount']}, '{$_POST['valid']}', '{$_POST['promo_code']}', '{$_POST['count']}')");
					if (!$result) {
						echo "Addition not successful: " . mysqli_error($connect);
					} else {
						echo "Addition of promo data successful";
					}
				} else {
					echo "Date error";
				}
			} else {
				// Display the form if the form was not submitted
				echo "<form method='post' action='addpromo.php?success=1'><table>
				<tr><td style='padding:5px'>Discount:</td><td><input type='text' placeholder='%' name='discount' /></td></tr>
				<tr><td style='padding:5px'>Valid Upto:</td><td><input type='text' name='valid' /></td></tr>
				<tr><td style='padding:5px'>Promo Code:</td><td><input type='text' name='promo_code' /></td></tr>
				<tr><td style='padding:5px'>Count:</td><td><input type='text' name='count' /></td></tr>
				<tr><td style='padding:5px' colspan='2'><input type='submit' value='submit' /></td></tr>
				</table></form>";
			}
			?>
		</div>
	</div>
</div>
<!-- body ends -->
<?php
require_once("include/footer.php");
?>
<!-- fixed errors of promo and emp -->