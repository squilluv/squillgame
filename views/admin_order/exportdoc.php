<?php

$db = mysqli_connect("squillgame.com", "root", "", "squillgame");
        $output = '';
        if(isset($_POST["exportdoc"]))
        {
        $query = "SELECT * FROM products_order";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) > 0)
        {
        $output .= '
        <meta charset="UTF-8">
        <table class="table" bordered="1">  
        <tr>  
        <th>Имя</th> 
        <th>Телефон</th> 
        <th>Дата оформления</th>  
        <th>Продукты в заказе</th>
        </tr>
        ';
        while($row = mysqli_fetch_array($result))
        {
        $output .= '
        <tr>  
        <td>'.$row["user_name"].'</td>  
        <td>'.$row["user_phone"].'</td> 
        <td>'.$row["date"].'</td> 
        <td>'.$row["products"].'</td>
        </tr>
        ';
        }
        $output .= '</table>';
        header('Content-Type: application/doc');
        header('Content-Disposition: attachment; filename=orders.doc');
        echo $output;
        }
        }