<?php
    require_once "publicfunc.php";

    if(isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"]))
    {
        $username = PurifyData($_POST["username"]);
        $password = PurifyData($_POST["password"]);
        if($username === "admin" && $password === "p@ssw0rd")
        {
            Free($username, $password);
            FlagShow();
        }
        else echo "Username or Password error！";
        Free($username, $password);
        die();
    }

    if (!isset($_POST["username"]) && !isset($_POST["password"]))
    {   
        if(isset($_GET["id"]))
        {
            $id = (int)PurifyData($_GET["id"]);
            Free($_GET["id"]);
        }
        else $id = 1;
        $sql = "select * from news where id = $id";
        $result = mysqli_query($conn, $sql);
        echo "<table><tr><th>id</th>";
        echo "<th>username</th></tr>";
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                echo "<tr><td> $row[id]</td>";
                echo "<td> $row[username]</td></tr>";
            }
        }
        echo "</table>";
        $result -> free();
        $conn -> close();
        Free($row, $id);
        die();
    }
?>