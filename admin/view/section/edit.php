<div class="pageCon">
    <h1 class="alert alert-info pageH">Edit section</h1>
    <div class="col-xs-offset-2">
        <form action="<?php echo ADMIN_URL; ?>section/update/<?php echo $this->getSingle['id']; ?>" method="POST">
            <div class="form-group row">
                <label for="name" class="col-xs-2 col-form-label">Name</label>
                <div class="col-xs-6">
                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $this->getSingle['name']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-2 col-form-label" for="Parent">Parent section</label>
                <div class="col-xs-6">
                    <select name="parentID" class="form-control">
                        <?php if($this->getSingle['parentID'] === NULL):?>
                            <option value="<?php echo ''; ?>" selected>none</option>
                        <?php else:?>
                            <option value="<?php echo ''; ?>">none</option>
                        <?php endif;?>
                        <?php
                        foreach ($this->list as $value) {
                            if ($value['parentID'] == NULL) {
                                if ($value['id'] == $this->getSingle['parentID']) {
                                    ?>
                                    <option value="<?php echo $value['id']; ?>" selected><?php echo $value['name']; ?></option>
                                    <?php
                                } else {
                                    ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-2 col-form-label" for="Parent">Activity</label>
                <div class="col-xs-6">
                    <select name="status" class="form-control">
                        <option value="activ"<?php echo ($this->getSingle['status'] == 'activ')? 'selected' : '';?>>activ</option>
                        <option value="inactiv"<?php echo ($this->getSingle['status'] == 'inactiv')? 'selected' : '';?>>inactive</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="Sort" class="col-xs-2 col-form-label">Sort</label>
                <div class="col-xs-6">
                    <input type="number" name="sort" class="form-control" placeholder="Sort" value="<?php echo $this->getSingle['sort']; ?>">
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