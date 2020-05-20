<?php
    require_once '../Model/database.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		if(!empty($_POST['teamAdd']))
		{
            add($_POST['teamAdd']);
		}
    }

    if($_SERVER['REQUEST_METHOD'] === 'GET')
	{
        if(!empty($_GET['getTeams']))
		{
            getTeams();
		}
        
        if(!empty($_GET['selectMember']))
		{
            getMemberSelect();
		}
        if(!empty($_GET['leadselect']))
		{
            getLeadsSelect();
		}
		
    }


    function getTeams()
    {
        $parsed = array();
        $query= 'SELECT * FROM `teams`';
        $teams = get($query);

        foreach($teams as $team)
        {
            $team += array("members"=> getTeamMembers($team["TeamId"]));            
            $team += array("leadAvatar"=> getLeadAvatar($team["LeadUserId"]));            

            array_push($parsed, $team);
        }
        echo  json_encode( array( "data" => $parsed));
    }

    function getLeadAvatar($userId)
    {
        $user = getUser($userId);
        return $user[0]["Avatar"];
    }


    function getTeamMembers($teamId)
    {
        $parsed = array();
        $query= "SELECT * FROM `team_members` where TeamId = '$teamId'";
        $members = get($query); 
        foreach($members as $member)
        {
            $user = getUser(intval($member["MemberId"]));
            
            $member += array("userName"=> $user[0]["Name"], "userAvatar"=> $user[0]["Avatar"]);
            array_push($parsed, $member);
        }

        return $parsed;
    }


    function getUser($userId)
    {
        $query= "SELECT * FROM `users` where UserId = '$userId'";
        return get($query);
    }



    function add($info)
    {
        $lastInsertedId = addTeam($info['name'],$info['avatar'],$info['lead']);
        
        foreach ($info["members"] as $member) {
            addMember($lastInsertedId,$member);
          }
        echo "success";
    }


    function addTeam($name, $avatar, $lead)
	{
		$query= "INSERT INTO `teams` (`TeamId`, `TeamName`, `LeadUserId`, `TeamAvatar`) VALUES (NULL, '$name','$lead','$avatar');";
		return  execute($query);
    }
    
    function addMember($leadId, $memberId)
    {
        $query="INSERT INTO `team_members` (`Id`, `TeamId`, `MemberId`) VALUES (NULL, '$leadId', '$memberId');";
        return execute($query);
    }

?>