    <!-- jQuery -->
    <script src="{{ asset('/admin/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('/admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('/admin/vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('/admin/dist/js/sb-admin-2.js') }}"></script>

    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script type="text/javascript">
		$('select.select2').select2();
	</script>

	<!-- CKEditor -->
	<script src="{{ asset('/js/ckeditor/ckeditor.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			CKEDITOR.replace( 'ckeditor' );
		});
	</script>

	<!-- Datetime picker -->
	<link href="{{ asset('/js/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}" rel="stylesheet">
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
	<script src="{{ asset('/js/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}"></script>
	<script type="text/javascript">
		
		$(function () {
        	$('.datetimepicker').datetimepicker();
        });
	</script>

	<!-- Helper -->
	<link href="{{ asset('/css/helper.css') }}" rel="stylesheet" />
	<script src="{{ asset('/js/helper.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".image_upload").change(function () {
    			readURL(this);
    		});
       	});
	</script>
</body>

</html>