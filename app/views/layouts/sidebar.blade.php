<!DOCTYPE html>
<html lang="en">
<head>
	@include('includes.admin_head')
</head>
<body>
	<div id="wrapper">
		
		<header>
			@include('includes.admin_header')
		</header>

		<div id="main">
			@yield('content')
		</div>
	</div>

 <!-- Core Scripts - Include with every page 
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="admin_style/js/plugins/metisMenu/jquery.metisMenu.js"></script>
-->
    <!-- Page-Level Plugin Scripts - Blank -->

    <!-- SB Admin Scripts - Include with every page
    <script src="admin_style/js/sb-admin.js"></script>

    Page-Level Demo Scripts - Blank - Use for reference -->

{{ HTML::script('js/jquery.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('admin_style/js/plugins/metisMenu/jquery.metisMenu.js') }}
{{ HTML::script('admin_style/js/sb-admin.js') }}

</body>
</html>