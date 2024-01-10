<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
    <form action="index.php" method="post">
        <table>
            <tr>
                <th>出発日</th>
                <td><input type="date" name="departure_date_input" required></td>
            </tr>
            <tr>
                <th>帰着日</th>
                <td><input type="date" name="return_date_input" required></td>
            </tr>
            <tr>
                <th>旅行先</th>
                <td><input type="text" name="destination_input" required></td>
            </tr>
            <tr>
                <th>カテゴリー</th>
                <td>
                    <?php
                        $pdo=new PDO($connect,USER,PASS);

                        $sql=$pdo->query('select * from Category');
                        echo '<select name="category_id_input" required>';
                        foreach($sql as $row){
                            echo '<option value="',$row['category_id'],'">', $row['category_name'], '</option>';
                        }
                        echo '</select>';
                    ?>
                </td>
            </tr>
        </table>
        <input type="submit" value="登録" name="add">
    </form>
<?php require 'footer.php'; ?>