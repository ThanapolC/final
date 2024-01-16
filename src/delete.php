<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php $pdo=new PDO($connect, USER, PASS); ?>
    <div class="columns is-centered has-text-centered">
        <table class="table is-hoverable is-striped">
            <thead class="thead is-size-4">
                <tr>
                    <th>出発日</th>
                    <th>帰着日</th>
                    <th>旅行先</th>
                    <th>カテゴリー</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>       
                <?php
                    $sql=$pdo->query('select journey_id, departure_date, return_date, destination, category_name from Journey inner join Category on Journey.category_id = Category.category_id order by departure_date');
                    foreach ($sql as $row){
                        echo '<tr>';
                        echo '<td>', $row['departure_date'], '</td>';
                        echo '<td>', $row['return_date'], '</td>';
                        echo '<td>', $row['destination'], '</td>';
                        echo '<td>', $row['category_name'], '</td>';
                        echo '<td>';
                            echo '<form action="index.php" method="post">';
                                echo '<input type="hidden" name="id_input" value="',$row['journey_id'],'">';
                                echo '<input class="button is-danger is-small is-outlined" type="submit" value="削除" name="delete">';
                            echo '</form>';
                        echo '</td>';    
                        echo '</tr>';
                    }
                ?>
            </tbody> 
        </table>
    </div>    
<?php require 'footer.php'; ?>