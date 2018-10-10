<div class="pageCon">
    <h1 class="alert alert-info pageH">Edit admin</h1>
    <div class="col-xs-offset-2">
        <form action="<?php echo ADMIN_URL; ?>user/editSave/<?php echo $this->user['userid']; ?>" method="post">
            <div class="form-group row">
                <label for="username" class="col-xs-2 col-form-label">Username</label>
                <div class="col-xs-6">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $this->user['username']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="New password" class="col-xs-2 col-form-label">New password</label>
                <div class="col-xs-6">
                    <input type="text" name="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-2 col-form-label" for="role">Role</label>
                <div class="col-xs-6">
                    <select name="role" class="form-control">
                        <option <?php if ($this->user['role'] == 'owner') echo 'selected'; ?> value="owner">owner</option>
                        <option <?php if ($this->user['role'] == 'admin') echo 'selected'; ?> value="admin">admin</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>