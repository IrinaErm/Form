<?php
    require_once 'connection.php';

    function countUsers() {
        global $conn;
        try {
            $stmt = $conn->prepare("SELECT COUNT(*) FROM users_info;");
            $stmt->execute();
            $count = $stmt->fetch();
            return (int) $count[0];
        }
        catch (PDOException $ex) {
            echo "Error - ".$ex->getMessage();
        }
    }
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        global $conn;
        $offset = $_REQUEST['offset'];
        $limit = $_REQUEST['limit'];

        try {
            $stmt = $conn->prepare("SELECT * FROM users_info LIMIT :limit OFFSET :offset;");
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $ex) {
            echo "Error - ".$ex->getMessage();
        }  
        
        $html = "<table class='table table-hover'>
            <tr class='table-success text-center'>
            <th> Фамилия </th><th> Имя </th><th> Отчество </th> <th> Пол </th>
            <th> Почта </th><th> Опыт </th><th> Город </th> <th> Резюме </th> <th> Доп. инфо </th>
            </tr>";
            foreach($result as $user) {
                $html .= "<tr>";
                $html .= "<td>" . $user["first_name"] . "</td>";
                $html .= "<td>" . $user["name"] . "</td>";
                $html .= "<td>" . $user["last_name"] . "</td>";
                $html .= "<td>" . $user["gender"] . "</td>";
                $html .= "<td>" . $user["email"] . "</td>";
                $html .= "<td>" . $user["experience"] . "</td>";
                $html .= "<td>" . $user["branch_city"] . "</td>";
                $html .= "<td>" . "<a href='php/download.php?file=".$user["file_path"]."&name=".$user["file_name"]."'>".$user["file_name"]."</a><br>" . "</td>";
                $html .= "<td>" . $user["info"] . "</td>";
                $html .= "</tr>";
            }
        $html .= "</table>";

        echo $html;
    }
    
    