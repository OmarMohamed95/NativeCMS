<?php if (!empty($this->getSingle)): ?>
    <div class="row articlePage">
        <img class="img-responsive col-xs-12" src="<?php echo BASE_URL . $this->getSingle['img']; ?>">
        <div class="col-xs-12">
            <h2><?php echo $this->getSingle['name']; ?></h2>
            <small><i class="far fa-calendar-alt"></i> <?php echo date('l, d F Y', strtotime($this->getSingle['date'])); ?></small>
            <hr>
            <p><?php echo $this->getSingle['content']; ?></p>
            <hr>
        </div>
    </div>
    <h3>Comments</h3>
    <form action="<?php echo BASE_URL; ?>page/comment/<?php echo $this->getSingle['id']; ?>" method="POST" id="commentForm">
        <div class="form-group row">
            <div class="col-xs-5">
                <textarea class="form-control" rows="4" name="content" placeholder="comment..."></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-5">
                <input type="submit" value="COMMENT" class="btn btn-info  pull-right">
            </div>
        </div>
    </form>
    <p id="commentMsg" class="text-center alert alert-danger"></p>
    <hr>
    <p class="noComment alert alert-warning text-center">no comments yet.</p>
    <div class="row" id="comments"></div>
<?php else: ?>
    <p class="alert alert-danger">Sorry, no article found!</p>
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function () {

        $.ajax({
            url: '<?php echo BASE_URL; ?>page/getAllComment/<?php echo $this->getSingle['id']; ?>',
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            if (data.length !== 0) {
                                $('.noComment').remove();
                            }
                            $.each(data, function (key, value) {
                                $('#comments').append("<div class='col-xs-offset-1 col-xs-10 showComment'>                                                                                   <img src='<?php echo BASE_URL; ?>" + value.img + "'>                                                                             <h4>" + value.username + "</h4>                                                                                                  <small><i class='far fa-calendar-alt'></i>" + value.date + "</small>                                                             <p>" + value.content + "</p>");
                            });
                        }
                    });

                    $('#commentForm').submit(function (e) {
                        e.preventDefault();
                        var url = $(this).attr('action');
                        var data = $(this).serialize();

                        $.ajax({
                            url: url,
                            data: data,
                            method: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.hasOwnProperty('content')) {
                                    $('#commentMsg').fadeOut();
                                    if (data.length !== 0) {
                                        $('.noComment').remove();
                                    }
                                    $('#comments').prepend("<div class='col-xs-offset-1 col-xs-10 showComment'>                                                                                 <img src='<?php echo BASE_URL; ?>" + data.img + "'>                                                                              <h4>" + data.username + "</h4>                                                                                                   <small><i class='far fa-calendar-alt'></i>" + data.date + "</small>                                                              <p>" + data.content + "</p>");
                                    $('#comments div').first().hide().show("pulsate", {times: 1}, 500);
                                } else {
                                    $.each(data, function (key, value) {
                                        if (key === 'checkLogin' || key === 'empty') {
                                            $('#commentMsg').text(value).fadeIn();
                                        }
                                    });
                                }
                            }
                        });
                    });
                });
</script>
