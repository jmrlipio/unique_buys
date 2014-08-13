<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Page</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="admin_style/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="admin_style/css/sb-admin.css" rel="stylesheet">

</head>
<body>

		


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
          {{ $errors->first('email',' <div class="col-md-12">
                <div class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span>
                   <strong>Email and/or password invalid.</strong>
                 </div>
            </div>') }}
           
           
              
            <div class="login-panel panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    {{ Form::open(array('url' => 'login')) }}
                    <form role="form">

                        <fieldset>
                            <div class="form-group">
                                <!-- <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus> -->
                               <!-- <label class="control-label" for="inputSuccess">Input with success</label> -->
                                {{ Form::text('email', Input::old('email'), array('placeholder' => 'E-mail','class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                <!-- <input class="form-control" placeholder="Password" name="password" type="password" value=""> -->
                                {{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            {{ Form::submit('Submit!', array('class' => 'btn btn-lg btn-success btn-block')) }}
                           <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                        </fieldset>
                    </form>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!--  The email must be a valid email address. -->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="admin_style/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="admin_style/js/sb-admin.js"></script>

</body>
</html>