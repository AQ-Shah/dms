	</div>
</body>
<footer>
	<div class="container" style = "margin-top:20px">
		<div class="row">
			<!-- ONLly laptop VIEW -->
			
				<!-- ONLY MOBILE VIEW -->
			<div class="d-lg-none">
				<nav class="navbar navbar-expand-sm bg-primary navbar-dark" id= "">
				<h4>copyright <?php echo date("Y");?>, Optimal UAE </h4>
			</nav>
			</div>
		</div>
	</div>
</footer>
</html>
<?php
  // 5. Close database connection
	if (isset($connection)) {
	  mysqli_close($connection);
	}
?>
