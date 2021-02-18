<?php
    require_once "publicfunc.php"；
    
    //获取最大ID
    function maxId()
    {
        global $conn;
        $sql = "select * from xssblind group by id having(max(id));";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                $maxID = (int)$row["id"];
            }
        }
        else $maxID = 0;
        $result->free();
        return $maxID;
    }
    
    if(isset($_POST["content"]) && !empty($_POST["content"]) && isset($_POST["name"]) && !empty($_POST["name"]))
    {
        $ID = maxId() + 1; //id自增
        $content = $_POST['content'];
        $name = PurifyData($_POST['name']);
        $time = date('Y-m-d g:i:s');
        $stmt = $conn -> prepare("INSERT INTO xssblind (id,time,content,name) VALUES (?,?,?,?);");
        $stmt -> bind_param('isss',$ID,$time,$content,$name);
        $stmt -> execute();
        $conn -> close();
        Free($_POST["content"], $_POST["name"], $ID, $content, $name, $time, $stmt, $conn);
        die();
    }
?>