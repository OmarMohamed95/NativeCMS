<p>site content</p> 

<form id="siteForm" action="<?php echo BASE_URL; ?>site/ajaxInsert" method="post">
    <input type="text" name="siteInput">
    <input type="submit">
</form>

<div id="siteGet"></div>

<script type="text/javascript">
    $(document).ready(function () {

        $.get("<?php echo BASE_URL;?>site/ajaxGet", function (e) {

            for (var i = 0; i < e.length; i++) {
                $('#siteGet').append('<div>' + e[i].text + '<a class="del" href="#" rel="' + e[i].dataid + '">X</a></div>');
            }

            $('.del').on('click', function (e) {
                e.preventDefault();
                var id = $(this).attr('rel'),
                        delItem = $(this);

                $.ajax({
                    url: "<?php echo BASE_URL;?>site/ajaxDel",
                    data: {'dataid': id},
                    type: 'post',
                    success: function () {
                        delItem.parent().remove();
                    }
                });
            });

        }, 'json');

        $('#siteForm').submit(function () {
            var url = $(this).attr('action');
            var data = $(this).serialize();

            $.post(url, data, function (e) {
                $('#siteGet').append('<div>' + e.text + '<a class="del" href="#" rel="' + e.dataid + '">X</a></div>');
            }, 'json');

            return false;
        });
    });
</script>