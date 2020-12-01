<?php
    require_once "publicfunc.php";

    if(isset($_POST['id']) && !empty($_POST['id']))
    {
        $id = (int)$_POST['id'];
        $query = "delete from xssblind where id = $id";
        $conn -> query($query);
        $query = "update xssblind set id = id - 1 where id > $id";
        $conn -> query($query);
        Free($_POST['id'], $id);
    }

    if (isset($_POST['query']) && $_POST['query'] === "1")
    {
        $sql = "select * from xssblind";
        $result = mysqli_query($conn, $sql);
        echo "<table><tr><th>id</th>";
        echo "<th>time</th>";
        echo "<th>content</th>";
        echo "<th>name</th>";
        echo "<th>operate</th></tr>"; 
        if ($result->num_rows > 0) 
        {          
            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>$row[id]</td>";
                echo "<td>$row[time]</td>";
                echo "<td>$row[content]</td>";
                echo "<td>$row[name]</td>";
                echo "<td><a onclick = Delete($row[id])>删除</a></td></tr>";
                Free($row);
            }
        }
        echo "</table>";
        $result->free();
        $conn->close();
        Free($_POST['query'], $sql, $result, $conn);
        die();
    }
?>