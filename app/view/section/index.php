<?php if (!empty($this->getSingle)): ?>
    <div class="row pageTitle">
        <h2><strong><?php echo strtoupper($this->getSingle[0]['n']); ?></strong></h2>
    </div>
    <?php foreach ($this->getSingle as $value) { ?>
        <div class="animated fadeInUp">
            <a href="<?php echo BASE_URL; ?>page/index/<?php echo $value['id']; ?>">
                <div class="row sec">
                    <img class="img-responsive col-md-4 col-xs-6 col-xs-offset-0" src="<?php echo BASE_URL . $value['img']; ?>">
                    <div class="col-md-8 col-xs-6">
                        <small><i class="far fa-calendar-alt"></i> <?php echo date('l, d F Y', strtotime($value['date'])); ?></small>
                        <h2><?php echo $value['name']; ?></h2>
                        <div class="secPageContent">
                            <p class="hidden-xs"><?php echo substr($value['content'], 0, 660); ?></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php }; ?>
<?php else: ?>
    <p class="alert alert-danger">Sorry, no articles found!</p>
<?php endif; ?>