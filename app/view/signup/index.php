<div>
    <div class="pageTitle">
        <h2><strong>Sign up</strong></h2>
    </div>
    <p style="display: none" class="msg alert alert-success"></p>
    <div class="col-md-offset-4 login">
        <form action="<?php echo BASE_URL; ?>signup/create" method="post" enctype="multipart/form-data" id="signupForm">
            <div class="form-group row">
                <label for="name" class="col-xs-2 col-form-label">Username</label>
                <div class="col-xs-8">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <span id="username" class="error"><small></small></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-xs-2 col-form-label">Email</label>
                <div class="col-xs-8">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <span id="email" class="error"><small></small></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="Password" class="col-xs-2 col-form-label">Password</label>
                <div class="col-xs-8">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span id="password" class="error"><small></small></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="img" class="col-xs-2 col-form-label">Picture</label>
                <div class="col-xs-8">
                    <input type="file" name="img" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="submit" value="submit" class="btn btn-info pull-right">
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("form").submit(function (e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var formData = new FormData(this);
            $.ajax({
                url: url,
                data: formData,
                method: 'POST',
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    $.each(data, function (key, value) {
                        if (key === 'msg') {
                            $('.login').hide();
                            $('.msg').text(value).fadeIn();
                        } else {
                            $("[name = "+ key +"").focus(function(){
                                $('#' + key).fadeOut();
                            });
                            $('#' + key).text(value).fadeIn();
                        }
                    });
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });
</script>