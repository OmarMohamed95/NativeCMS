<?php
if (isset($this->slider)) {
    ?>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php
            foreach ($this->slider as $key => $v) {
                if ($key === 0):
                    ?>
                    <div class="item active">
                        <a href="<?php echo BASE_URL; ?>page/index/<?php echo $v['id']; ?>">
                            <img src="<?php echo BASE_URL . $v['img']; ?>" style="width: 100%; height: 500px;">
                            <div class="carousel-caption">
                                <h3><?php echo $v['name']; ?></h3>
                            </div>
                        </a>
                    </div>
                <?php else : ?>
                    <div class="item">
                        <a href="<?php echo BASE_URL; ?>page/index/<?php echo $v['id']; ?>">
                            <img src="<?php echo BASE_URL . $v['img']; ?>" style="width: 100%; height: 500px;">
                            <div class="carousel-caption">
                                <h3><?php echo $v['name']; ?></h3>
                            </div>
                        </a>                            
                    </div>
                <?php endif; ?>
            <?php } ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="icon-next" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<?php } ?>
<?php if (!empty($this->pagesBySec)) { ?>
    <div>
        <div class="row">
            <?php foreach ($this->pagesBySec as $value) { ?>
                <div class="pageTitle">
                    <h2><strong><?php echo strtoupper($value[0]['sectionName']); ?></strong></h2>
                </div>
                <?php foreach ($value as $v) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo BASE_URL . $v['img']; ?>">
                            <div class="caption">
                                <div class="text">
                                    <h3><?php echo $v['name']; ?></h3>
                                    <p><?php echo $v['content']; ?></p>
                                </div>
                                <a href="<?php echo BASE_URL; ?>page/index/<?php echo $v['id']; ?>" class="btn btn-info" role="button">Read more</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <div class="clearfix"></div>
            <?php } ?>
        </div>
    </div>
<?php } ?>