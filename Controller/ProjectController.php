<?php
    require_once '../Model/database.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		if(!empty($_POST['projectAdd']))
		{
            $proj = $_POST['projectAdd'];
            addProject($proj['projname'],$proj['projDescription'],$proj['projStatus'],$proj['clientCompany'],$proj['estimatedBudget'],$proj['estimatedProjectDuration'],$proj['team'],$proj['totalAmountSpent']);
		}
    }

    if($_SERVER['REQUEST_METHOD'] === 'GET')
	{
        if(!empty($_GET['teamselect']))
		{
            getTeamSelect();
        }
        
        if(!empty($_GET['getProjects']))
		{
            getProjects();
		}
		
    }


    function getProjects()
    {
        $parsed = array();
        $query= 'SELECT * FROM `projects`';
        $projects = get($query);

        foreach($projects as $proj)
        {
            $proj += array("teamName"=> getTeamName($proj["TeamId"]));            
            $proj += array("leadAvatar"=> getLeadAvatar($proj["TeamId"]));             

            array_push($parsed, $proj);
        }
        echo  json_encode( array( "data" => $parsed));
    }


    function getTeamSelect()
    {
        $query= 'SELECT * FROM `teams`';
        $members =  get($query);
        $parsed = array(); 

        foreach($members as $member)
        {
            array_push($parsed,array('id' => $member["TeamId"], 'text' => $member["TeamName"]));
        }

        $result = array( "results" => $parsed);

		echo json_encode($parsed);
    }



    function getTeamName($teamId)
    {
        $team = getTeam($teamId);
        return $team[0]["TeamName"];
    }


    function getLeadAvatar($teamId)
    {
        $team = getTeam($teamId);

        $user = getUser($team[0]["LeadUserId"]);
        return $user[0]["Avatar"];
    }

    function getUser($userId)
    {
        $query= "SELECT * FROM `users` where UserId = '$userId'";
        return get($query);
    }

    function getTeam($teamId)
    {
        $query= "SELECT * FROM `teams` where TeamId = '$teamId'";
        return get($query);
    }

    function addProject($name, $Description, $Status, $Client, $Budget, $EstimatedDuration, $TeamId, $AmountSpent)
	{
		$query= "INSERT INTO `projects` (`projectId`, `Name`, `Description`, `Status`, `Client`, `Budget`, `EstimatedDuration`, `TeamId`, `AmountSpent`) VALUES (NULL, '$name', '$Description', '$Status', '$Client', '$Budget', '$EstimatedDuration', '$TeamId', '$AmountSpent');";
        execute($query);
        echo "success";
    }
    


?>