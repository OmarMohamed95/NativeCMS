<h1>note - edit</h1>

<form action="<?php echo BASE_URL; ?>note/editSave/<?php echo $this->note['noteid'];?>" method="post">
    <div class="form-group">
        <input class="form-control" type="text" name="title" placeholder="title" value="<?php echo $this->note['title'];?>">
    </div>
    <div class="form-group">
        <textarea class="form-control" name="content"><?php echo $this->note['content'];?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="submit" class="btn btn-primary">
    </div>
</form>