<?php
    require_once "publicfunc.php";

    $username = $password = "";$flag = 0;

    function PurifyData2($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_COMPAT);	
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
        if (!$result)
        {
            printf("Error: %s\n", mysqli_error($conn));
        }
        $row = mysqli_fetch_array($result,MYSQLI_NUM);
        if (!empty($row[0]))
        {
            echo "Welcome $row[1]！Your password is $row[2]";
            if ($row[0] == "1")
            {
                FlagShow();
            }
        }
        else echo "Username or Password error！";
        $result -> free();
        $conn -> close();
        Free($row, $result, $conn, $username, $password);
        die();
    }
?>
