<!doctype html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="description" content="A quick overview of the Esendex API">
	<meta name="author" content="Adam Strawson - @adamstrawson">

	<link rel="stylesheet" href="static/style.css">

	<title>Esendex Demo - listMessages</title>
</head>
<body>
	<?
	
	//Lets load the Esendex Inbox Service Class
	include_once ('inc/EsendexInboxService.php');

	$username = '';	//Your Esendex Email Address
	$password = '';	//Your Esendex Password
	$accountReference = '';	//Your Esendex Account Number

	//Pass the above account details to the Esendex Class
	$inboxService = new EsendexInboxService($username, $password, $accountReference);

	//Get the messages from the inboxService function
	$result = $inboxService -> GetMessages();
	$messages = $result['Messages'];

	//If there are NO messages, display a message
	if(is_null($messages)) {
		echo "<p>Sorry, no messages found.</p>";
	}

	//If there ARE messages, lets list them
	if(!is_null($messages)) {
		echo "<table>
				<caption>
					<h1>listMessages</h1>
				</caption>
				<thead>
					<tr>
						<th>ID</th>
						<th>Originator</th>
						<th>Recipient</th>
						<th>Body</th>
						<th>Received At</th>
						<th>Type</th>
						<th>IndexID</th>
					</tr>
				</thead>
				<tbody>";

		foreach($messages as $message) {

			echo "<tr>
			<td>" . $message['ID'] . "</td>
			<td>" . $message['Originator'] . "</td>
			<td>" . $message['Recipient'] . "</td>
			<td>" . $message['Body'] . "</td>
			<td>" . $message['ReceivedAt'] . "</td>
			<td>" . $message['Type'] . "</td>
			<td>" . $message['IndexID'] . "</td>
		</tr>";

		}
		echo "</tbody>";
		print "</table>";
	}
?>
</body>
</html>