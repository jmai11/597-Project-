# 597-Project-Community CMS 
Welcome to Community CMS

Installation Instructions:

<b>Downloading the Source Code</b></br>
•	Retrieve source code from https://github.com/jmai11/597-Project- </br>
•	A github account will need to be created in order to be able to download the source code. </br>
•	Download the source code and save it into the htdocs folder of the Xampp application. (see Xampp installation)</br>

<b>Downloading Xampp</b>
•	Go to: https://www.apachefriends.org/index.html
•	Download the version specific for the platform that you are using. 
•	Follow its installation guidelines. 
•	Make sure that Apache Web Server and MySQL database are running. 

<b>Retrieving and Importing Data into Database</b>
•	In a web browser go to localhost/phpMyAdmin 
•	Create a new database 
•	Retrieve file: cms_community.sql from the SQL folder in the source code 
•	Import this file into the database.

<b>Database Configuration</b>
•	In the source files, navigate to the database.php file. 
•	There should be two files one in the main source file and one in the profile folder. 
•	Change the variables to the parameters that you have for your database. 
o	$server= 'localhost';
o	$username='the username you have set up';
o	$password='the password you have set up';
o	$db= 'name of your database';

<b>Running Community: CMS web application</b> 
•	Open the Xampp control panel and start both Apache server and MySQL database. 
•	In a web browser, type: localhost/name of the folder you cloned from the source code and saved in htdocs of Xampp.
•	A welcome to community page should display like in figure 19 below. You can now start exploring by either creating an account or visiting as a guest. 

