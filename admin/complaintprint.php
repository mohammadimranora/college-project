<?php
require_once "../connect.php";
session_start();
if (!isset($_SESSION['adminid'])) {
	$URL = url()."/index.php";
	header("location: $URL ");
}
?>
	<?php require_once "../includes/static.header.php" ?>
	<?php require_once "../includes/menu.header.php" ?>
	<?php require_once "../includes/user.navbar.header.php" ?>
	<div class="container MainContainer">
		<div class="row">
			<?php require_once "../includes/admin.side-bar.php"; ?>
			<div class="col-sm-9 col-xs-12">
				<div class="panel panel-primary" id="PrintArea">
					<div class="panel-heading">Complaint</div>
					<div class="panel-body">
						<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
							<div class="col-xs-12 col-sm-12">
								<center><b>Complaint</b></center>
								<table class="table table-responsive" style="text-transform: capitalize;">
									<thead>
										<th>Name</th>
										<th>E-Mail</th>
										<th>Mobile No.</th>
										<th>Problem Type</th>
										<th>Problem Description</th>
									</thead>
									<?php
									$queries = "SELECT * FROM `support`";
									$result = mysqli_query($con, $queries);

									while ($row = mysqli_fetch_array($result)) {

										echo "<tr>
  													<td>$row[0]</td>
  													<td>$row[1]</td>
  													<td>$row[2]</td>
  													<td>$row[3]</td>
  													<td>$row[4]</td>
  												</tr>";
									}
									?>
								</table>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-10">
									<button class="btn btn-primary" name="print" onclick="printDiv('PrintArea');">Print <i class="fa fa-print"></i></button>

								</div>
							</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php require_once "../includes/foot.footer.php" ?>