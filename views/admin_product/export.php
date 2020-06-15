<?php

$db = mysqli_connect("squillgame.com", "root", "", "squillgame");
        $output = '';
        if(isset($_POST["export"]))
        {
        $query = "SELECT * FROM product";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) > 0)
        {
        $output .= '
        <meta charset="utf-8">
        <table class="table" bordered="1">  
        <tr>  
        <th>Название</th> 
        <th>Артикул</th> 
        <th>Цена, р</th>  
        <th>Разработчик</th>  
        <th>Издатель</th>
        </tr>
        ';
        while($row = mysqli_fetch_array($result))
        {
        $output .= '
        <tr>  
        <td>'.$row["name"].'</td>  
        <td>'.$row["code"].'</td> 
        <td>'.$row["price"].'</td> 
        <td>'.$row["developer"].'</td>  
        <td>'.$row["publisher"].'</td>  
        </tr>
        ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=games.xls');
        echo $output;
        }
        }