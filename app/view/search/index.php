<div>
    <div class="pageTitle">
        <h2><strong>Results for</strong>: <?php echo $this->searchQ;?></h2>
    </div>
    <?php if (!empty($this->r)) : ?>
        <div class="row">
            <?php foreach ($this->r as $value) { ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="<?php echo BASE_URL . $value['img']; ?>">
                        <div class="caption">
                            <div class="text">
                                <h3><?php echo $value['name']; ?></h3>
                                <p><?php echo $value['content']; ?></p>
                            </div>
                            <a href="#" class="btn btn-primary" role="button">Button</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">
            <p>Sorry, no result found!</p>
        </div>
    <?php endif; ?>
</div>