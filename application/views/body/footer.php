	<footer class="footer">
						<div class="container-fluid">
							
							<div class="copyright ml-auto">
							SI KOSTUM - 2019</a>
						</div>
					</div>
				</footer>
			</div>
			
			
		</div>
		<!--   Core JS Files   -->
		<script src="<?php echo base_url();?>assets/js/core/jquery.3.2.1.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/core/popper.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/core/bootstrap.min.js"></script>
		<!-- jQuery UI -->
		<script src="<?php echo base_url();?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
		<!-- jQuery Scrollbar -->
		<script src="<?php echo base_url();?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
		<!-- Chart JS -->
		<script src="<?php echo base_url();?>assets/js/plugin/chart.js/chart.min.js"></script>
		<!-- jQuery Sparkline -->
		<script src="<?php echo base_url();?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
		<!-- Chart Circle -->
		<script src="<?php echo base_url();?>assets/js/plugin/chart-circle/circles.min.js"></script>
		<!-- Datatables -->
		<script src="<?php echo base_url();?>assets/js/plugin/datatables/datatables.min.js"></script>
		<!-- Bootstrap Notify -->
		<script src="<?php echo base_url();?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
		<!-- jQuery Vector Maps -->
		<script src="<?php echo base_url();?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
		<!-- Sweet Alert -->
		<script src="<?php echo base_url();?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
		<!-- Atlantis JS -->
		<script src="<?php echo base_url();?>assets/js/atlantis.min.js"></script>
		<!-- Atlantis DEMO methods, don't include it in your project! -->
		<script src="<?php echo base_url();?>assets/js/setting-demo.js"></script>
		<script src="<?php echo base_url();?>assets/js/demo.js"></script>

		<script >
		$(document).ready(function() {
			$('#mydata').DataTable({
				"Language" : {
					"url" : "//cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json","sEmptyTable" : "Tidak Ada Data "
				}
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			
		});
	</script>
		
	</body>
</html>