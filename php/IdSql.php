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
		$id = (!isset($_GET["id"]))?1:$_GET["id"] ;
		Free($_GET["id"]);
        $sql = "select * from news where id = $id";
        $result = mysqli_query($conn, $sql);
        echo "<table><tr><th>id</th>";
        echo "<th>username</th></tr>";
		if($result === FALSE)
		{ 
			die();
		}
        if ($result->num_rows > 0) 
        {
			$row = null;
            while($row = $result->fetch_assoc())
            {
                echo "<tr><td> $row[id]</td>";
                echo "<td> $row[username]</td></tr>";
            }
        }
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($conn);
        @Free($row, $id);
        die();
    }
?>