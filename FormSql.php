<?php
    require_once "publicfunc.php";

    $username = $password = "";$flag = 0;

    function PurifyData2($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);	
        return strip_tags($data);
    }

    if (isset($_POST["username"]) && isset($_POST["password"]))
    {		
        $username = PurifyData2($_POST["username"]);
        $password = PurifyData2($_POST["password"]);
        Free($_POST["username"], $_POST["password"]);
    }

    if(!empty($username) &&  !empty($password))
    {
        $sql = "select * from users where username = '$username' and password = '$password'";
        $result = mysqli_query($conn, $sql);
		if($result === FALSE)
		{ 
			die();
		}
        if ($result->num_rows > 0) 
        {
			$row = null;
            while($row = $result->fetch_assoc())
            {
                echo "Welcome $row[username]！Your password is $row[password]";
				if ($row["id"] == "1")
				{
					FlagShow();
					break;
				}
            }
        }
		else echo "Username or Password error！";
        mysqli_free_result($result);
        mysqli_close($conn);
        @Free($row, $result, $conn, $username, $password);
        die();
    }
?>