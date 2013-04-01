<!--CSCI 2441 Team 14: Rian Shambaugh and Melanie Gold Final project
    applicant1.php-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Application</title>
</head>

<body>
	<h1>Application</h1>

	<!Application form>
	<form method="post" action="applicant1.php">
	       <h2>Personal Information</h2>
		First Name: <input type="text" name="fname" />
		Last Name: <input type="text" name="lname" />
		Social Security Number: <input type="int" name="SSN" />
		</br></br>
		Gender: <select name="Gender">
			 <option value="Female">Female</option>
			 <option value="Male">Male</option>
			 </select>
		</br></br>
		Race: <input type="text" name="Race" />
		</br></br>
		Street Address: <input type="text" name="Address" />
		City: <input type="text" name="City" />
		State: <input type="text" name="A_State" />
		Country: <input type="text" name="Country" />
		Zip: <input type="text" name="Zip" /> 
		</br></br>
		Phone Number: <input type="int" name="Phone" />

		<h2>Academic Information</h2>
		Degree Sought: <input type="text" name="DegreeSought" />
		Admission Date: <input type="text" name="AdmitDate" />
		Area of Interest: <input type="text" name="AreaInterest" />

		<h3>Education</h3>
		Degree Type: <select name="DegType">
				<option value="BS">BS</option>
				<option value="BA">BA</option>
				<option value="MS">MS</option>
				<option value="MA">MA</option>
				</select>
		Year: <input type="int" name="D_Year" />
		School: <input type="text" name="School" />
		GPA: <input type="double" name="GPA" />

		<h3>GRE Scores</h3>
		Total Score: <input type="int" name="Total" />
		Verbal Score: <input type="int" name="Verbal" />
		Analytical Score: <input type="int" name="Analytical" />
		Quantitative Score: <input type="int" name="Quantitative" />

		<h4>GRE Subject Scores</h4>
		Subject: <input type="text" name="Subject1" />
		Score: <input type="int" name="Score1" />
		</br>
		Subject: <input type="text" name="Subject2" />
		Score: <input type="int" name="Score2" />

		<h3>Work Experience</h3>
		<input type="textarea" rows="10" cols="30" name="Work" />

		<h2>Letters of Recommendation</h2>
		Name of Recommender: <input type="text" name="RName" /></br>
		Email: <input type="email" name="Email" /></br>
		Title: <input type="text" name="Title" /></br>
		Affiliation: <input type="text" name="Affiliation" />		
		</br></br>
		<input type="submit" value="Submit" name="submit" />
	</form>

	</br>
	
	<?php
		//APPLICANT ID
//		$applicantid = ________________
//		$currentDate = ________________

		//variables for queries
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$SSN = $_POST['SSN'];
		$Address = $_POST['Address'];
		$City = $_POST['City'];
		$A_State = $_POST['A_State'];
		$Zip = $_POST['Zip'];
		$Country = $_POST['Country'];
		$Gender = $_POST['Gender'];
		$Race = $_POST['Race'];
		$Phone = $_POST['Phone'];
		$DegreeSought = $_POST['DegreeSought'];
		$Work = $_POST['Work'];
		$AdmitDate = $_POST['AdmitDate'];
		$AreaInterest = $_POST['AreaInterest'];
		$Deg_Type = $_POST['Deg_Type'];
		$D_Year = $_POST['D_Year'];
		$GPA = $_POST['GPA'];
		$School = $_POST['School'];
		$Verbal = $_POST['Verbal'];
		$Analytical = $_POST['Analytical'];
		$Quantitative = $_POST['Quantitative'];
		$Total = $_POST['Total'];
		$Subject1 = $_POST['Subject1'];
		$Score1 = $_POST['Score1'];
		$Subject2 = $_POST['Subject2'];
		$Score2 = $_POST['Score2'];
		$RName = $_POST['RName'];
		$Email = $_POST['Email'];
		$Title = $_POST['Title'];
		$Affiliation = $_POST['Affiliation'];

		//Connect to database with credentials
		$dbc = mysql_connect("localhost", "rolivia", "s3cr3t201e")
			or die('Error connecting to MySQL server.');

		//Select database
  		mysql_select_db("rolivia", $dbc);

		//add Applicant information to the database
		mysql_query("INSERT INTO PInfo VALUES('$applicantid','$fname','$lname','$SSN',
			'$Address','$City','$A_State','$Zip','$Country','$Gender','$Race','$Phone'")
			or die('Error entering Personal Info');
		mysql_query("INSERT INTO AInfo VALUES('$applicantid','$DegreeSought','$Work','$AdmitDate',
			'$currentDate','$AreaInterest','Not Recieved')")
			or die('Error entering Academic Info');
		mysql_query("INSERT INTO PriorDegrees VALUES('$applicantid','$Deg_Type','$D_Year','$GPA',
			'$School'")
			or die('Error entering PriorDegrees');
		mysql_query("INSERT INTO GRE VALUES('$applicantid','$Verbal','$Analytical','$Quantitative',
			'Total')")
			or die('Error entering GRE scores');
		mysql_query("INSERT INTO GRESubj VALUES('$applicantid','$Subject1','$Score1')")
			or die('Error entering GRE Subject scores');
		mysql_query("INSERT INTO GRESubj VALUES('$applicantid','$Subject2','$Score2')")
			or die('Error enterinng GRE Subject scores');
		mysql_query("INSERT INTO Recommender VALUES('$applicantid','$RName','$Email',$Title',
			'Affiliation')")
			or die('Error entering Recommendation Info');

		//close database
		$mysql_close($dbc);
	?>
</body>

</html>

