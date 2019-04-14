<?php 
	require "database.php";
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: customers.html");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM customers where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
?>

			<div>
				<!-- <h5 id="demo"></h5> -->
		    	<h3>Customer Details</h3>
		    </div>
		<div class="form-horizontal" >
			<div class="control-group">
				<label class="control-label">name</label>
				<div class="controls">
					<input id="name" type="text" placeholder="name" value="<?php echo $data['name']; ?>" disabled>
				</div>
			</div>
		</div>
		<div class="form-horizontal" >
			<div class="control-group">
				<label class="control-label">email</label>
				<div class="controls">
					<input id="email" type="text" placeholder="email" value="<?php echo $data['email']; ?>" disabled>
				</div>
			</div>
		</div>
		<div class="form-horizontal" >
		<div class="control-group">
				<label class="control-label">mobile</label>
				<div class="controls">
					<input id="mobile" type="text" placeholder="mobile" value="<?php echo $data['mobile']; ?>" disabled>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<a class="btn btn-info" href="customers.html">Back</a>
		</div>