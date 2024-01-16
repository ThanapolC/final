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
        <div class="columns is-centered has-text-left">
            <table class="table">
                <tr>
                <th class="thead is-size-5 has-text-weight-semibold">出発日</th>
                    <td><input class="input is-small" type="date" name="departure_input" required value="<?= $data['departure_date'] ?>"></td>
                </tr>
                <tr>
                    <th class="thead is-size-5 has-text-weight-semibold">帰着日</th>
                    <td><input class="input is-small" type="date" name="return_input" required value="<?= $data['return_date'] ?>"></td>
                </tr>
                <tr>
                    <th class="thead is-size-5 has-text-weight-semibold">旅行先</th>
                    <td>
                        <div class="field">
                            <p class="control has-icons-left">
                                <input class="input is-small" type="text" name="destination_input" required value="<?= $data['destination'] ?>">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-city"></i>
                                </span>
                            </p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="thead is-size-5 has-text-weight-semibold">カテゴリー</th>
                    <td>
                        <div class="control has-icons-left">
                            <div class="select is-small">
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
                            </div>
                            <span class="icon is-left">
                                <i class="fas fa-globe"></i>
                            </span>
                        </div>    
                    </td>
                </tr>
            </table>
        </div>    
        <input type="hidden" name="id_confirm" value="<?= $id ?>">
        <div class="btn has-text-centered">
            <input class="button is-warning is-normal is-rounded" type="submit" value="更新" name="edit">
        </div>    
    </form>
<?php require 'footer.php'; ?>