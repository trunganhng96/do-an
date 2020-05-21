<form  method="POST">
    <table>
        <tr><h3>Thong Tin User</h3></tr>
        
        <tr>
            <td>Username</td>
            <td><input type="text" id="username" name="username" style="width:130px"></td>
        </tr>
        
        <tr>
            <td>Age</td>
            <td>
                <input type="radio" id="age" name="age" value="0-20">0 - 20
                <br>
                <input type="radio" id="age" name="age" value="21-50">21 - 50
                <br>
                <input type="radio" id="age" name="age" value="51 tro len">51 tro len
            </td>
        </tr>
        <br>
        <tr>
            <td>The loai ban muon doc hom nay</td>
            <td>
                <?php foreach($list_categories as $key => $list_category){?>
                    <input type="radio" id="category" name="category" value="<?php echo $list_category[0] ?>"><?php echo $list_category[1] ?><br>
                <?php }?>
            </td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" id="confirm" name="confirm" value="Xac Nhan"></td>
        </tr>
    </table>
</form>
