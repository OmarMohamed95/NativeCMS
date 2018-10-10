<div class="pageCon">
    <h1 class="alert alert-info pageH">Sittings</h1>
    <div class="col-xs-offset-2">
        <form action="<?php echo ADMIN_URL; ?>sittings/store" method="POST">
            <div class="form-group row">
                <label for="site_name" class="col-xs-2 col-form-label">Site name</label>
                <div class="col-xs-6">
                    <input type="text" name="site_name" class="form-control" placeholder="Site name" value="<?php echo $this->l['site_name'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="site_email" class="col-xs-2 col-form-label">Site email</label>
                <div class="col-xs-6">
                    <input type="email" name="site_email" class="form-control" placeholder="Site email" value="<?php echo $this->l['site_email'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="fb" class="col-xs-2 col-form-label">Facebook</label>
                <div class="col-xs-6">
                    <input type="text" name="fb" class="form-control" placeholder="Facebook" value="<?php echo $this->l['fb'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tw" class="col-xs-2 col-form-label">Twitter</label>
                <div class="col-xs-6">
                    <input type="text" name="tw" class="form-control" placeholder="Twitter" value="<?php echo $this->l['tw'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="yt" class="col-xs-2 col-form-label">Youtube</label>
                <div class="col-xs-6">
                    <input type="text" name="yt" class="form-control" placeholder="Youtube" value="<?php echo $this->l['yt'];?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8">
                    <input type="submit" value="submit" class="btn btn-info pull-right">
                </div>
            </div>
        </form>
    </div>
</div>