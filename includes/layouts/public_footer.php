<!-- closing div for content -->
</div>
<!-- closing div for content-page -->
</div>
<!-- closing div for wrapper -->
</div>


<!-- Right side setting bar -->
<?php include("../includes/views/setting_sidebar.php"); ?>


<!-- Vendor js -->
<script src="assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="assets/js/app.min.js"></script>


</body>

</html>
<?php
  //  Close database connection
	if (isset($connection)) {
	  mysqli_close($connection);}
?>