<!--CSCI 2441 Team 14: Rian Shambaugh and Melanie Gold Final project
    mainPage.html-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Log In</title>
</head>

<body>

	<form method="post" action="">
		<h1>Log In</h1>
		User Type: <select name="UserType">
			    <option value="">Select...</option>
			    <option value="App">Applicant</option>
			    <option value="Graduate Secretary">Graduate Secretary</option>
			    <option value="Chief Reviewer">Chief Reviewer</option>
			    <option value="Reviewer">Reviewer</option>
			    </select>
		</br></br>
		Username: <input type="text" name="ID" />
		</br></br>
		Password: <input type="text" name="password" />
		</br></br>
		<input type="submit" value="Submit" name="submit" />
	</form>

	<form method="post" action="">
		<h1>Create New Application</h1>
		<p>Enter your email address in the box below.  Your username and password will be emailed to you.</p>
		Email: <input type="email" name="newEmail" />
	</form>

	<?php
		$userType = $_POST['UserType'];
		$ID = $_POST['ID'];
		$password = $_POST['password'];

		//connect to database
		$dbc = mysql_connect("localhost", "rolivia", "s3cr3t201e")
			or die('Error connecting to MySQL server.');

		mysql_select_db("rolivia", $dbc);

		switch($userType){
			case "App":
				//Check credentials
				$correctPass = mysql_query("SELECT pass FROM Applicant WHERE id='$ID'")
					or die('Error querying database');
				if ($correctPass == $password){
					$AppStatus = mysql_query("SELECT status FROM Applicant WHERE id='$ID'")
						or die('Error querying database');

					//Check status of application and go to appropriate page
					if($status == 'Not Completed'){
						//Go to Applicant page 1
						header("Location: http://student.seas.gwu.edu/~rolivia/applicant1.php");
					}
					else {
						//Go to Applicant page 2
						//header("Location: http://APPLICANT PAGE2 URL");
					}
				}
				else {
					//DISPLAY ERROR MESSAGE
					echo "Incorrect Applicant Credentials";
				}
				break;
			case "Graduate Secretary":
				//Get correct password from database
				$result = mysql_query("SELECT pass FROM Administrator WHERE id='$ID'")
					or die('Error querying database');
				$row = mysql_fetch_array($result);
				$correctPass = $row['pass'];

				//Get correct position from database
				$result = mysql_query("SELECT Ad_position FROM Administrator WHERE id='$ID'")
					or die('Error querying database');
				$row = mysql_fetch_array($result);
				$correctPos = $row['Ad_position'];

				//check credentials
				if ($correctPass == $password && $correctPos == $userType){
					//Go to GS page 1
					header("Location: http://student.seas.gwu.edu/~melgold/GS.php");
				}
				else {
					//DISPLAY ERROR MESSAGE
					echo "Incorrect Graduate Secretary Credentials";
				}
				break;
			case "Chief Reviewer":
				//Get correct password from database
				$result = mysql_query("SELECT pass FROM Administrator WHERE id='$ID'")
					or die('Error querying database');
				$row = mysql_fetch_array($result);
				$correctPass = $row['pass'];

				//Get correct position from database
				$result = mysql_query("SELECT Ad_position FROM Administrator WHERE id='$ID'")
					or die('Error querying database');
				$row = mysql_fetch_array($result);
				$correctPos = $row['Ad_position'];

				//check credentials
				if ($correctPass == $password && $correctPos == $userType){
					//Go to Chief page 1
					//header("Location: http://CHIEF PAGE1 URL");
				}
				else {
					//DISPLAY ERROR MESSAGE
					echo "Incorrect Chief Reviewer Credentials";
				}
				break;
			case "Reviewer":
				//Get correct password from database
				$result = mysql_query("SELECT pass FROM Administrator WHERE id='$ID'")
					or die('Error querying database');
				$row = mysql_fetch_array($result);
				$correctPass = $row['pass'];

				//Get correct position from database
				$result = mysql_query("SELECT Ad_position FROM Administrator WHERE id='$ID'")
					or die('Error querying database');
				$row = mysql_fetch_array($result);
				$correctPos = $row['Ad_position'];

				//check credentials
				if ($correctPass == $password && $correctPos == $userType){
					//Go to Reviewer page 1
					//header("Location: http://REVIEWER PAGE1 URL");
				}
				else {
					//DISPLAY ERROR MESSAGE
					echo "Incorrect Reviewer Credentials";
				}
				break;
		}

		mysql_close($dbc);
	?>

</body>

</html>

