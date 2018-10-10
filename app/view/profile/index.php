<div>
    <div class="pageTitle">
        <h2><?php echo strtoupper($_SESSION['username']); ?> <strong>Profile</strong></h2>
    </div>
    <div class="col-md-offset-4 login">
        <form action="<?php echo BASE_URL; ?>profile/update/<?php echo $this->getSingle['userid'];?>" method="post" enctype="multipart/form-data">
            <img style="width: 180px; height: 180px" class="proImg img-thumbnail" src="<?php echo BASE_URL .  $this->getSingle['img'];?>">
            <div class="form-group row">
                <label for="name" class="col-xs-2 col-form-label">Username</label>
                <div class="col-xs-8">
                    <input type="text" name="username" value="<?php echo $this->getSingle['username'];?>" class="form-control" placeholder="Username">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-xs-2 col-form-label">Email</label>
                <div class="col-xs-8">
                    <input type="email" name="email" value="<?php echo $this->getSingle['email'];?>" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="Password" class="col-xs-2 col-form-label">Password</label>
                <div class="col-xs-8">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="img" class="col-xs-2 col-form-label">Picture</label>
                <div class="col-xs-8">
                    <input type="file" name="img" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="submit" value="update" class="btn btn-info pull-right">
                </div>
            </div>
        </form>
    </div>
</div>