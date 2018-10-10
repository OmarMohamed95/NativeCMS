<form action="<?php echo ADMIN_URL; ?>user/delete" method="POST">
    <div class="pageCon">
        <div class="alert alert-info pageH">
            <h1>Admins</h1>
            <a class="btn btn-primary col-xs-offset-10" href="<?php echo ADMIN_URL; ?>user/create">Create</a>
            <input type="submit" value="Delete" class="btn btn-danger">
        </div>
        <table class="table table-hover">
            <tr>
                <th><input id="allCheckbox" type="checkbox" value=""></th>
                <th>ID</th>
                <th>Usesname</th>
                <th>Role</th>
                <th><small>edit | delete</small></th>
            </tr>
            <?php
            foreach ($this->userList as $v) {
                ?>
                <tr>
                    <th><input class="singleCB" type="checkbox" name="userid[]" value="<?php echo $v['userid']; ?>"></th>
                    <td><?php echo $v['userid']; ?></td>
                    <td><?php echo $v['username']; ?></td>
                    <td><?php echo $v['role']; ?></td>
                    <td>
                        <a href="<?php echo ADMIN_URL; ?>user/edit/<?php echo $v['userid']; ?>"><i class="fas fa-edit fa-lg editIcon"></i></a>
                        <a href="<?php echo ADMIN_URL; ?>user/delete/<?php echo $v['userid']; ?>"><i class="far fa-trash-alt fa-lg deleteIcon"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function () {
        $('#allCheckbox').on('click', function () {
            $('.singleCB').click();
        });
    });
</script>


