<!DOCTYPE html>
<html>
    <head>
        <title><?= (isset($this->title) ? $this->title : 'project1'); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo BASE_URL; ?>public/bootstrab/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="<?php echo BASE_URL; ?>public/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>public/bootstrab/css/animate.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo BASE_URL; ?>public/bootstrab/js/jquery-2.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>public/bootstrab/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="<?php echo BASE_URL; ?>public/ckeditor/ckeditor.js" type="text/javascript"></script>
    </head>
    <body>
        <?php session::init(); ?>
        <div class="container-fluid no-padding containerClass">
            <div class="row">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo ADMIN_URL; ?>index">Project</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a target="_blank" href="<?php echo BASE_URL; ?>index">Browse Website <span class="sr-only">(current)</span></a></li>
                                <li><a href="<?php echo ADMIN_URL; ?>section">sections</a></li>
                                <li><a href="<?php echo ADMIN_URL; ?>page">page</a></li>
                                <li><a href="<?php echo ADMIN_URL; ?>slider">slider</a></li>
                                <li><a href="<?php echo ADMIN_URL; ?>comment">comments</a></li>
                                <li><a href="<?php echo ADMIN_URL; ?>sittings">sittings</a></li>
                                <li><a href="<?php echo ADMIN_URL; ?>user">admins</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo ADMIN_URL; ?>index/logout">Logout</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
                <div class="content">

