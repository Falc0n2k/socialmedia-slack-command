<?php
use Maknz\Slack\Client;

// Team IDs
// XXXXXXXXX = Workspace 1
// YYYYYYYYY = Workspace 2

// /SOCIALMEDIA

if($_POST['command'] == '[/socialmedia]'){
	if($_POST['team_id'] == '[TEAM_ID#1_GOES_HERE]'){
		if(!$_POST['token'] == '[SLASH_COMMAND_TOKEN_GOES_HERE]'){
			error_log("Bad Token");
			exit();
		}
	}
	// DUPLICATE THIS BLOCK FOR MULTIPLE TEAM ID'S IN YOUR SLACK ENTERPRISE INSTANCE
	if($_POST['team_id'] == '[TEAM_ID#1_GOES_HERE]'){
		if(!$_POST['token'] == '[SLASH_COMMAND_TOKEN_GOES_HERE]'){
			error_log("Bad Token");
			exit();
		}
	}
	$channel = $_POST['channel_id'];
	$text = $_POST['text'];
	$team = $_POST['team_id'];
	fireSocialMediaLink($channel,$text,$team);
}

// SLASH COMMAND FUNCTIONS

function fireSocialMediaLink($channel,$text,$team)
{
	$defaults = [
	  'username' => '[USERNAME_OF_THE_ACCOUNT_THAT_APPEARS_IN_SLACK]', // THIS IS THE ACCOUNT THAT, WHEN CALLED, THE COMMAND WILL POST BACK AS IN SLACK
	  'icon' => ':ICON_NAME:',
	  'allow_markdown' => true
	];

	if($team == '[TEAM ID #1]'){
		//WORKSPACE #1 NAME
		$client = new Client('[WEBHOOK_ENDPOINT_FOR_WORKSPACE_#1]', $defaults);
	}

	if($team == '[TEAM ID #1]'){
		//WORKSPACE #2 NAME
		$client = new Client('[WEBHOOK_ENDPOINT_FOR_WORKSPACE_#2]', $defaults);
	}

	$client->to($channel)->attach([
    'color' => '#2B9CD8',
    'fields' => [
        [
					'title' => 'Twitter', // YOU CAN USE THE :ICON: SYNTAX IF YOU'D LIKE TO ADD EMOJIS TO THE TITLE
					'value' => '[URL]', // TO SHARE MORE THAN ONE URL, SEPARATE WITH '\n' IN BETWEEN LINKS, I.E., "[LINK 1] \n [LINK 2]"
					'short' => true
				],[
					'title' => 'Facebook',
					'value' => "[URL]",
					'short' => true
				],[
					'title' => 'Reddit',
					'value' => '[URL]',
					'short' => true
				],
    ],
])->send('Here\'s where our customer can reach us on social media'); // THIS MESSAGE APPEARS BEFORE THE RESPONSE BLOCK ABOVE IS SENT

}
