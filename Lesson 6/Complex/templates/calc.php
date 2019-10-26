<form action="" method="post">
    <input type="text" id="val1" name="operand1" value="<?=$calcResults['operand1']?>">
    <select name="action_type">
        <option value="add" <?php if($calcResults['action_type']=='add') echo 'selected'?>>+</option>
        <option value="subtract" <?php if($calcResults['action_type']=='subtract') echo 'selected'?>>-</option>
        <option value="multiply" <?php if($calcResults['action_type']=='multiply') echo 'selected'?>>*</option>
        <option value="divide" <?php if($calcResults['action_type']=='divide') echo 'selected'?>>/</option>
    </select>
    <input type="text" id="val2" name="operand2" value="<?=$calcResults['operand2']?>">
    <button class='action' type="submit"> =</button>
    <input type="text" id="val3" value="<?=$calcResults['result']?>"><br>
</form>