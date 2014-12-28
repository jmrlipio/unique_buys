<html>
<head>

	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="Jone">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Page</title>
    
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('admin_style/css/sb-admin.css') }} 
    {{ Minify::stylesheet(array('/admin_style/css/plugins/dataTables/dataTables.bootstrap.css', 
    '/css/style.css' ,'/admin_style/css/plugins/dataTables/dataTables.bootstrap.css' ,'/admin_style/font-awesome/css/font-awesome.css'))->withFullUrl() }}


    
    