<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php
    $id = $_POST['id_input'];
    $pdo=new PDO($connect, USER, PASS);

    $sql=$pdo->query('select * from Category');

    $sql2=$pdo->prepare('select * from Journey where journey_id= ?');
    $sql2->execute([$id]);
    $data = $sql2->fetch();    
?>
    <form action="index.php" method="post">
        <table>
            <tr>
                <th>出発日</th>
                <td><input type="date" name="departure_input" required value="<?= $data['departure_date'] ?>"></td>
            </tr>
            <tr>
                <th>帰着日</th>
                <td><input type="date" name="return_input" required value="<?= $data['return_date'] ?>"></td>
            </tr>
            <tr>
                <th>旅行先</th>
                <td><input type="text" name="destination_input" required value="<?= $data['destination'] ?>"></td>
            </tr>
            <tr>
                <th>カテゴリー</th>
                <td>
                    <?php
                        echo '<select name="category_input" required>';
                        foreach($sql as $row){
                            $select = "";
                            if($data['category_id'] == $row['category_id']){
                                $select = "selected";
                            }
                            echo '<option value="', $row['category_id'], '"', $select, '>', $row['category_name'], '</option>';
                        }
                        echo '</select>';
                    ?>
                </td>
            </tr>
        </table>
        <input type="hidden" name="id_confirm" value="<?= $id ?>">
        <input type="submit" value="更新" name="edit">
    </form>
<?php require 'footer.php'; ?>