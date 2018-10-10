<div class="pageCon">
    <h1 class="alert alert-info pageH">Preview</h1>
    <h2 class=""><?php echo $this->getSingle['name'];?></h2>
    <small><?php echo $this->getSingle['date'];?></small>
    <hr>
    <img src="<?php echo BASE_URL . $this->getSingle['img'];?>">
    <hr>
    <p><?php echo nl2br($this->getSingle['content']);?></p>
</div>