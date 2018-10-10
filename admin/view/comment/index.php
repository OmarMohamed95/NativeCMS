<form action="<?php echo ADMIN_URL; ?>comment/delete" method="POST">
    <div class="pageCon">
        <div class="alert alert-info pageH">
            <h1>Comments</h1>
            <input type="submit" value="Delete" class="btn btn-danger">
        </div>
        <table class="table table-hover">
            <tr>
                <th><input id="allCheckbox" type="checkbox" value=""></th>
                <th>ID</th>
                <th>PageID</th>
                <th>Username</th>
                <th>Comment</th>
                <th>Date</th>
                <th><small>Delete</small></th>
                <th><small>Details</small></th>
            </tr>
            <?php
            foreach ($this->getAll as $v) {
                ?>
                <tr>
                    <th><input class="singleCB" type="checkbox" name="id[]" value="<?php echo $v['id']; ?>"></th>
                    <td><?php echo $v['id']; ?></td>
                    <td><?php echo $v['pageID']; ?></td>
                    <td><?php echo $v['username']; ?></td>
                    <td><?php echo $v['content']; ?></td>
                    <td><?php echo $v['date']; ?></td>
                    <td>
                        <a href="<?php echo ADMIN_URL; ?>comment/delete/<?php echo $v['id']; ?>"><i class="far fa-trash-alt fa-lg deleteIcon"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-success" href="<?php echo ADMIN_URL; ?>comment/details/<?php echo $v['id']; ?>">Preview</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#allCheckbox').on('click', function(){
            $('.singleCB').click();
        });
    });
</script>
    