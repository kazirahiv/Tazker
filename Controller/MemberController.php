<?php
    require_once '../Model/database.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		if(!empty($_POST['memberAdd']))
		{
            add($_POST['memberAdd']);
		}
    }

    if($_SERVER['REQUEST_METHOD'] === 'GET')
	{
        if(!empty($_GET['getMembers']))
		{
            getMembers();
		}
        
        if(!empty($_GET['selectMember']))
		{
            getMemberSelect();
		}
        if(!empty($_GET['leadselect']))
		{
            getLeadsSelect();
        }
        if(!empty($_GET['deleteMember']))
		{
            deleteMember($_GET['deleteMember']);
		}
		
    }



    function getMembers()
    {
        $parsed = array();
        $query= 'SELECT * FROM `users` WHERE UserType != "orgmaster"';
        $users = get($query);

        foreach($users as $user)
        {

            $userId = $user["UserId"];
            $member = get("SELECT * FROM `members` WHERE UserId = '$userId'");
            $user += array("Skills"=> $member[0]["Skills"], "Education"=> $member[0]["Education"]);                 
            array_push($parsed, $user);
        }
        echo  json_encode( array( "data" => $parsed));
    }




    function getMemberSelect()
    {
        $query= 'SELECT * FROM `users` WHERE UserType != "orgmaster" && UserType != "lead"';
        $members =  get($query);
        $parsed = array(); 

        foreach($members as $member)
        {
            array_push($parsed,array('id' => $member["UserId"], 'text' => $member["Name"]));
        }

        $result = array( "results" => $parsed);

		echo json_encode($parsed);
    }



    function deleteMember($userId)
    {
        $query = "DELETE FROM `users` WHERE UserId = '$userId'";
        execute($query);
        echo "success";
    }


    function getLeadsSelect()
    {
        $query= 'SELECT * FROM `users` WHERE UserType = "lead"';
        $members =  get($query);
        $parsed = array(); 

        foreach($members as $member)
        {
            array_push($parsed,array('id' => $member["UserId"], 'text' => $member["Name"]));
        }

        $result = array( "results" => $parsed);

		echo json_encode($parsed);
    }



    function add($info)
    {
        $lastInsertedId = addUser($info['name'],$info['email'],$info['password'],$info['avatar'],'enabled',$info['role']);
        $mid = addMember($lastInsertedId,$info['skills'], $info['education']);
        //echo $lastInsertedId . $mid;
        echo "success";
    }


    function addUser($username, $email, $password, $avatar, $status, $userType)
	{
		$query= "INSERT INTO `users` (`UserId`, `Name`, `Email`, `Password`, `Avatar`, `Status`, `UserType`) VALUES (NULL, '$username', '$email', '$password', '$avatar', '$status', '$userType');";
		return  execute($query);
    }
    
    function addMember($uid,$skills,$education)
    {

        $query="INSERT INTO `members` (`MemberId`, `UserId`, `Skills`, `Education`) VALUES (NULL, '$uid', '$skills', '$education');";
        return execute($query);
    }

?>