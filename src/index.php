<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php $pdo=new PDO($connect, USER, PASS); ?>
    <?php
        if(isset($_POST['add'])){
            $sql2=$pdo->prepare('insert into Journey value(null,?,?,?,?)');
            $sql2->execute([$_POST['departure_input'],$_POST['return_input'],$_POST['destination_input'],$_POST['category_input'],]);
        } 
    ?>
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