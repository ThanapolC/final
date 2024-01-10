<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
    <table>
        <thead>
            <tr>
                <th>出発日</th>
                <th>帰着日</th>
                <th>旅行先</th>
                <th>カテゴリー</th>
            </tr>
        </thead>
        <tbody>       
            <?php
                $pdo=new PDO($connect, USER, PASS);

                $sql=$pdo->query('select departure_date, return_date, destination, category_name from Journey inner join Category on Journey.category_id = Category.category_id order by departure_date');
                foreach ($sql as $row){
                    echo '<tr>';
                    echo '<td>', $row['departure_date'], '</td>';
                    echo '<td>', $row['return_date'], '</td>';
                    echo '<td>', $row['destination'], '</td>';
                    echo '<td>', $row['category_name'], '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody> 
    </table>
<?php require 'footer.php'; ?>