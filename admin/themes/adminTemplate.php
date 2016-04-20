<html>	      
	<head>	
		<script type="text/javascript" src="theme/pmms/sites/all/themes/pmms/jquery1cc4.js?v=1.4.4"></script>
		<script type="text/javascript" src="theme/pmms/misc/jquery.once7839.js?v=1.2"></script>
		<script type="text/javascript" src="theme/pmms/misc/drupaldaf9.js?ne7jek"></script>
		<script type="text/javascript" src="theme/pmms/sites/all/themes/pmms/scriptdaf9.js?ne7jek"></script>
		<script type="text/javascript" src="theme/pmms/sites/all/themes/pmms/script.responsivedaf9.js?ne7jek"></script>
		
		<!-- Menu css -->
		<link href="<?php echo WEB_ROOT; ?>css/menustyles.css" rel="stylesheet">
		<!-- end of Menu css -->
		
		<!-- button css -->
		<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/normalize.css">
		<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/buttonstyle.css">
		<!-- end of button css -->
		
		<!-- Bootstrap core CSS -->
		<link href="<?php echo WEB_ROOT; ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo WEB_ROOT; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo WEB_ROOT; ?>css/dataTables.bootstrap.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/jquery.dataTables.css">
		<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap.min.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/jquery.dataTables.js"></script>
		
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				var t = $('#example').DataTable( {
					"columnDefs": [ {
						"searchable": false,
						"orderable": false,
						"targets": 1
					} ],
					"order": [[ 3, 'asc' ]]
				} );
				
				t.on( 'order.dt search.dt', function () {
					t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
						cell.innerHTML = i+1;
					} );
				} ).draw();
			} );
			
		</script>
		<?php include ("banner.php"); 
			include ("navbar.php");
			check_message();
		?>
	</head>	
	<body>
		
		<div class="col-lg-12 col-md-8 col-sm-12">
			<div class="panel panel-primary">
				<br>
				<?php require_once $content; ?>
			</div>
		</div>
		<br>
		<br>
	</body>
</html>


