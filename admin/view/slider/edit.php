<div class="pageCon">
    <h1 class="alert alert-info pageH">Edit slider</h1>
    <div class="col-xs-offset-1">
        <form action="<?php echo ADMIN_URL; ?>slider/update/<?php echo $this->getSingle['id']; ?>" method="POST"  enctype="multipart/form-data">
            <div class="form-group row">
                <label for="name" class="col-xs-1 col-form-label">Name</label>
                <div class="col-xs-10">
                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $this->getSingle['name']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Content" class="col-xs-1 col-form-label">Content</label>
                <div class="col-xs-10">
                    <textarea name="content" class="ckeditor form-control cke" rows="7" placeholder="Content"><?php echo $this->getSingle['content'];?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-1 col-form-label" for="Section">Section</label>
                <div class="col-xs-10">
                    <select name="sectionID" class="form-control">
                        <?php
                        foreach ($this->list as $value) {
                            if ($value['id'] == $this->getSingle['sectionID']) {
                                ?>
                                <option value="<?php echo $value['id']; ?>" selected><?php echo $value['name']; ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="Image" class="col-xs-1 col-form-label">Image</label>
                <div class="col-xs-10">
                    <input type="file" name="img" class="form-control">
                    <img style="width: 180px; height: 180px" class="img-thumbnail" src="<?php echo BASE_URL . $this->getSingle['img'];?>"> 
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-1 col-form-label" for="Activity">Activity</label>
                <div class="col-xs-10">
                    <select name="status" class="form-control">
                        <option value="activ"<?php echo ($this->getSingle['status'] == 'activ') ? 'selected' : ''; ?>>activ</option>
                        <option value="inactiv"<?php echo ($this->getSingle['status'] == 'inactiv') ? 'selected' : ''; ?>>inactive</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-11">
                    <input type="submit" value="submit" class="btn btn-info pull-right">
                </div>
            </div>
        </form>
    </div>
</div>