<div class="pageCon">
    <h1 class="alert alert-info pageH">Create admin</h1>
    <div class="col-xs-offset-2">
        <form action="<?php echo ADMIN_URL; ?>user/store" method="POST">
            <div class="form-group row">
                <label for="username" class="col-xs-2 col-form-label">Username</label>
                <div class="col-xs-6">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-xs-2 col-form-label">Password</label>
                <div class="col-xs-6">
                    <input type="text" name="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-2 col-form-label" for="role">Role</label>
                <div class="col-xs-6">
                    <select name="role" class="form-control">
                        <option value="owner">owner</option>
                        <option value="admin">admin</option>
                    </select>
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