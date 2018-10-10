<div>
    <div class="pageTitle">
        <h2><strong>Login</strong></h2>
    </div>
    <p style="display: none" class="msg alert alert-danger">testassasa</p>
    <div class="col-md-offset-4 login">
        <form id="loginForm" action="<?php echo BASE_URL; ?>login/submit" method="post">
            <div class="form-group row">
                <label for="name" class="col-xs-2 col-form-label">Username</label>
                <div class="col-xs-8">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-xs-2 col-form-label">Password</label>
                <div class="col-xs-8">
                    <input type="password" name="password" class="form-control" placeholder="Password">
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
        $('#loginForm').submit(function (e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var data = $(this).serialize();
            $.ajax({
                url: url,
                data: data,
                method: 'POST',
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    $.each(data, function (key, value) {
                        if (key === 'loggedIn' && value === 'loggedIn') {
                            window.location.replace("<?php echo BASE_URL;?>index");
                        } else {
                            $('.msg').text(value).fadeIn();
                        }
                    });
                }
            });
        });
    });
</script>
