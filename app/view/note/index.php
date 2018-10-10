<h1>note</h1>

<form action="<?php echo BASE_URL; ?>note/create" method="post">
    <div class="form-group">
        <input class="form-control" type="text" name="title" placeholder="title">
    </div>
    <div class="form-group">
        <textarea class="form-control" name="content"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="submit" class="btn btn-primary">
    </div>
</form>
<hr>
<table class="table">
    <?php
    foreach ($this->noteList as $v) {
        echo '<tr>';
        echo '<td>' . $v['title'] . '</td>';
        echo '<td>' . $v['date_added'] . '</td>';
        echo '<td>'
                . '<a href="' . BASE_URL . 'note/edit/' . $v['noteid'] . '">edit</a> | '
                . '<a href="' . BASE_URL . 'note/delete/' . $v['noteid'] . '">delete</a>'
            . '</td>';
        echo '</tr>';
    }
    ?>
</table>

