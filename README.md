<h1>Installation Guide</h1><br>
<b>Please follow the setup guide at the end of the main documentation.</b>
<br><br>
<h1>Simple Bug Fixes</h1><br>
First, please note that certain functions <b>do not work on unix-based devices (mac/ Linux)</b> due to differences in how these operating systems handle files to the binary level.<br>
Thanks to this, input passwords are hashed differently, so you will be <b>unable to login with the premade accounts</b> where the passwords were hashed with windows. Please create an account in the signup page and log in with that one.<br>
Another unfortunate effect is the <b>inability to upload images to the database</b>. This includes the profile picture and images uploaded to caravan listings. The default images will be displayed in case of 
upload failure, but other than that, caravan addition and editing should function normally.<br><br>
<h3>Finding PHPMyAdmin</h3>
Once XAMPP is set up and both the <b>Apache and MySQL</b> servers are on, open your browser and go to localhost/phpmyadmin/
<h3>Finding the RMC site</3>
In your browser, go to localhost/rent_my_caravan/index.php<br>
The /rent_my_caravan/ portion is whatever you have the file in XAMPP stored as. If it does not open, please check the folder is correctly copied into XAMPP/htdocs/ and that you use the correct uppercase/lowercase letters. 
<br><br>
<h3>Database errors</h3><br>
<b>Please ensure you create a blank database with the name 'rentmycaravan_db' before importing the SQL and CSVs</b>. This name needs to be exact because that is how it is referred to in the code when connecting.<br>
Once the blank database has been made, please first click on the blank database and import the SQL code using the 'import' option at the top of the page. This creates two tables and establishes the relationship between them. Next, click on each blank table and import the CSVs. Ensure that 'Allow the interruptions of an import...' and 'Enable foreign key checks' as shown in the documentation are <b>off</b>, else they will not import correctly. 
<br><br>
<h3>Geolocator errors</h3><br>
Please ensure that <b>JavaScript</b> is not blocked, and that you give the RMC site access to your location. 
<br><br>
<h3>Premade account details</h3>
<ul><li>patricianewman@gmail.com Password2</li>
<li>simonsemail@yahoo.co.uk C4RAvans</li>
<li>caravanuploader@gmail.com SALTYprune89</li></ul>