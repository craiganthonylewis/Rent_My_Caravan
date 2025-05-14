<h1>Installation Guide</h1><br>
<b>Please follow the setup guide at the end of the main documentation.</b><br>

<h1>Simple Bug Fixes</h1><br>
First, please note that certain functions <b>do not work on unix-based devices (mac/ Linux)</b> due to differences in how these operating systems handle files to the binary level.<br>
Thanks to this, input passwords are hashed differently, so you will be <b>unable to login with the premade accounts</b> where the passwords were hashed with windows. Please create an account in the signup page and log in with that one.<br>
Another unfortunate effect is the <b>inability to upload images to the database</b>. This includes the profile picture and images uploaded to caravan listings. The default images will be displayed in case of 
upload failure, but other than that, caravan addition and editing should function normally.<br><br>
<h3>Database errors</h3><br>
<b>Please ensure you create a blank database with the name 'rentmycaravan_db' before importing the SQL and CSVs</b>. 