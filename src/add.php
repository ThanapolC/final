<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php $pdo=new PDO($connect, USER, PASS); ?>
    <form action="index.php" method="post">
        <div class="columns is-centered has-text-left">
            <table class="table">
                <tr>
                    <th class="thead is-size-5 has-text-weight-semibold">出発日</th>
                    <td><input class="input is-small" type="date" name="departure_input" required></td>
                </tr>
                <tr>
                    <th class="thead is-size-5 has-text-weight-semibold">帰着日</th>
                    <td><input class="input is-small" type="date" name="return_input" required></td>
                </tr>
                <tr>
                    <th class="thead is-size-5 has-text-weight-semibold">旅行先</th>
                    <td>
                        <div class="field">
                            <p class="control has-icons-left">
                                <input class="input is-small" type="text" name="destination_input" required>
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
                                    $sql=$pdo->query('select * from Category');
                                    echo '<select name="category_input" required>';
                                    foreach($sql as $row){
                                        echo '<option value="',$row['category_id'],'">', $row['category_name'], '</option>';
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
        <div class="btn has-text-centered">
            <input class="button is-warning is-normal is-rounded" type="submit" value="登録" name="add">
        </div>    
    </form>
<?php require 'footer.php'; ?>