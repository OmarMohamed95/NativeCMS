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
    </head>
    <body>
        <?php session::init(); ?>
        <div class="container-fluid no-padding containerClass">
            <div class="row">
                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo BASE_URL; ?>index"><?php echo $this->sittings['site_name'];?></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="<?php echo BASE_URL; ?>index">Home <span class="sr-only">(current)</span></a></li>

                                <?php
                                if (isset($this->pS)) {
                                    foreach ($this->pS as $p) {
                                        ?>
                                        <li class="dropdown">
                                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $p['name']; ?> <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <?php
                                                if (isset($this->cS)) {
                                                    foreach ($this->cS as $c) {
                                                        if ($p['id'] == $c['parentID']) {
                                                            ?>
                                                            <li><a href="<?php echo BASE_URL; ?>section/index/<?php echo $c['id']; ?>"><?php echo $c['name']; ?></a></li>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>

                                <?php
                                if (isset($this->s)) {
                                    foreach ($this->s as $s) {
                                        ?>
                                        <li><a href="<?php echo BASE_URL; ?>section/index/<?php echo $s['id']; ?>"><?php echo $s['name']; ?></a></li>
                                        <?php
                                    }
                                }
                                ?>

                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <?php if (session::get('loggedIn') === TRUE): ?>
                                <li class="profile"><a href="<?php echo BASE_URL; ?>profile/index/<?php echo session::get('userid');?>"><img class="img-circle" src="<?php echo BASE_URL . session::get('img');?>"><?php echo session::get('username');?></a></li>
                                    <li><a href="<?php echo BASE_URL; ?>index/logout">Logout</a></li>
                                <?php else: ?>
                                    <li><a href="<?php echo BASE_URL; ?>signup">Sign up</a></li>
                                    <li><a href="<?php echo BASE_URL; ?>login">Log in</a></li>
                                <?php endif; ?>
                            </ul>
                            <form action="<?php echo BASE_URL; ?>search" method="POST" class="navbar-form navbar-right">
                                <div class="form-group">
                                    <input name="search" type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
                <div class="appContent">

