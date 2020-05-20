<?php 
    require_once '../Model/database.php';
    session_start();
    if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		if(!empty($_POST['login']))
		{
            logInUser($_POST['login']);
		}
    }


    if($_SERVER['REQUEST_METHOD'] === 'GET')
	{
		if(!empty($_GET['logout']))
		{
            logOutUser();
		}
    }
    

    function logOutUser()
    {
        if(isset($_SESSION["user"]))
        {
            unset ($_SESSION["user"]);
            header("Location: ../View/LogIn.php");
        }
    }


    function logInUser($login)
	{

        $email = $login['email'];
        $password = $login['password'];
        $query = "SELECT * FROM `users` WHERE Email='$email' AND Password='$password';";
        $result = get($query);
        
        if(count($result)>0)
        {
            $user = $result[0];
            $_SESSION['user']= $user["Name"];
            $_SESSION['usertype']= $user["UserType"];
            echo "success";
        }else
        {
            echo "error";
        }
    }
    




    function addUser($username, $email, $password, $status, $userType)
	{
		$query= "INSERT INTO `users` (`UserId`, `Name`, `Email`, `Password`, `Avatar`, `Status`, `UserType`) VALUES (NULL, '$username', '$email', '$password', '', '$status', '$userType');";
		execute($query);
		return true;
    }


?>