<!DOCTYPE html>
<html>
    <head>
        <title><?= (isset($this->title) ? $this->title : 'project1'); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="<?php echo BASE_URL; ?>public/bootstrab/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>public/bootstrab/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>public/bootstrab/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>public/bootstrab/css/animate.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <link href="<?php echo BASE_URL; ?>public/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container-fluid no-padding containerClass">
            <div class="row">
                <div class="logCon">
                    <h1 class="col-xs-offset-3 logH">Login</h1>
                    <form action="<?php echo ADMIN_URL; ?>login/submit" method="post">
                        <div class="form-group row ">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" name="username" placeholder="Username" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="password" placeholder="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" value="Sign in" class="btn btn-primary pull-right">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="footer">
                    <p class="col-md-offset-5">(c) footer</p>
                </div>
            </div>
        </div>
    </body>
</html>