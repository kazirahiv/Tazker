<?php
    require_once '../Model/database.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		if(!empty($_POST['orgadd']))
		{
            add($_POST['orgadd']);
		}
    }




    function add($info)
    {
        addOrganization($info['orgName']);
        addUser($info['name'],$info['email'],$info['password'],'enabled','orgmaster');
        echo "success";
    }


    function addUser($username, $email, $password, $status, $userType)
	{
		$query= "INSERT INTO `users` (`UserId`, `Name`, `Email`, `Password`, `Avatar`, `Status`, `UserType`) VALUES (NULL, '$username', '$email', '$password', '', '$status', '$userType');";
		execute($query);
		return true;
    }
    
    function addOrganization($orgname)
    {
        $query="INSERT INTO `organization` (`Name`, `TotalProjects`, `TotalMembers`, `Progress`, `OrgId`) VALUES ('$orgname', 0, 0, 0, '1')";
        execute($query);
        return true;
    }

?>