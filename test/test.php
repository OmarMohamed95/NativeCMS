<?php
require '../libs/form.php';

if (isset($_REQUEST['run'])) {
    
    try {
        $form = new form();
        $form->post('name')
                ->validate('minLength', 2)
                ->validate('string')
                ->post('age')
                ->validate('integer')
                ->validate('maxLength',3)
                ->post('gender');

        $form->submit();
        echo 'form passed!';
        $data = $form->get();
        
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }
}
?>
<form action="?run" method="post">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="age" placeholder="age">
    <select name="gender">
        <option value="m">male</option>
        <option value="f">female</option>
    </select>
    <input type="submit" value="submit">
</form>