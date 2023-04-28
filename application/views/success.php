<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment Success</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" integrity="sha512-gMjQeDaELJ0ryCI+FtItusU9MkAifCZcGq789FrzkiM49D8lbDhoaUaIX4ASU187wofMNlgBJ4ckbrXM9sE6Pg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style type="text/css">
		.hide{
			display: none;
		}
		.form-group{
			margin-bottom: 15px;
		}
		.card-icon {
        font-size: 32px; /* adjust size as needed */
      }
      .input-group-text {
      	background-color: #fff;
      }
	</style>
</head>
<body>
	<div style="margin:15%">
		<center>
			<div style="border:solid 1px #ccc; padding: 15px 30px;">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="alert alert-success">
							<h2>Payment Success</h2>
						</div>
						<table class="table table-bordered">
							<tr>
								<th>Payment ID</th>
								<td><?= $id; ?></td>
							</tr>
							<tr>
								<th>Amount/currency</th>
								<td><?= $amount/100; ?> / <?= $currency; ?></td>
							</tr>
							<tr>
								<th>Payment ID</th>
								<td><?= $id; ?></td>
							</tr>
							<tr>
								<th>Receipt url</th>
								<td><?= $receipt_url; ?></td>
							</tr>
							<tr>
								<th>Created</th>
								<td><?= date('d-m-Y H:i:s', $created); ?></td>
							</tr>
						</table>
						<br><br>
						<a href="<?= base_url(); ?>">
							<button class="btn btn-primary">Pay Again</button>
						</a>
					</div>
				</div>
			</div>
		</center>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

</body>
</html>