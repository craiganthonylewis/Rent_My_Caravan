<h1>Assessment brief</h1><br>
<b>RentMyCaravan.io</b> is a platform for local residents and businesses to advertise their caravans that need
to be rented. The whole project is broken down into multiple phases, and you have been asked to assist
the design and development activities in phase 1.<br>
The goal of the phase 1 of the web application is to design and develop an attractive and functional user
interface for basic activities (listed below) and implement the relevant server-side components. In this
phase, you are to assume that the system caters for only to a single user type, in this case ‘caravan
owners’).<br><br>

<b>The functions of the user type ‘caravan owners’ are given below:</b>
<br><ul><li>A user should be able to register with the system by filling up a registration form.</li>
<br><li>A user should be able to login to the system by providing a combination of username and password,
which was setup by the user during registration.</li>
<br><li>Once logged in a user should land to welcome page and be able to;
<ul><li>Add details of a caravan to the system by completing an add caravan details form.</li>
<li>Delete a caravan from the system.</li>
<li>View the list caravans added by the user to the system.</li>
<li>Edit the details of a particular caravan.</li></ul></li></ul><br><br>


<h3>Client side of the web application:</h3>
<b>The client side should contain:</b>
<br><br><ol><li>A welcome page with the option to login to the system for registered users, and a link to a
registration page to allow new user registration.
<br><ul><li>You may design this to display the latest caravans posted by the users to make the
welcome page attractive.</li></ul></li>
<br><li>A registration page to register new users (caravan owners). The registration page should
consist of a range of HTML form elements, matching the different input fields.
The registration form should contain appropriate client-side validations using JavaScript. Refer
to the structure of the ‘users’ table given below to extract the details required for the user
registration form.</li>
<br><li>Add caravan page; The caravan owners should be able to add the details of a caravan to the
system. You should refer to the structure of the ‘caravan_details’ table given below to identify the
details required for the caravan details form. The caravan details must include images and may
contain any other multimedia elements such as video clips etc.</li>
<br><li>Caravan list view page; to view all previously uploaded caravans.</li>
<br><li>Caravan summary page: Users should be able to select a particular caravan (from the caravan
list view) and get detailed descriptions, images or videos available for the caravan.</li>
<br><li>Caravan edit page: Users should be able to edit the details of a caravan uploaded by that user.</li>
<br><li>Delete caravan function: The users should be able to delete a caravan added by that user.</li>
<br><li>About page. About page should give a description of the website, and a description of the
developer</li></ol>


<br><br><h3>Server side of the web application:</h3>
The server side should be implemented using PHP as the programming language, Apache web server,
and MySQL as the database.
<br><br>
<b>The server-side implementation should include:</b>
<ol>
<br><li>Functionality to perform user registration. The information gathered from the registration page
should be verified, checked for errors and saved in the “users” table in the MySQL database.</li>
<br><li>Functionality to insert caravan details. The information gathered from the caravan details page
should be verified, checked for errors and saved in the “vehicle_detail” table in the MySQL
database.</li>
<br><li>Functionality to perform user login. User login details submitted through the login form should
be verified with the “users” Table. A PHP user session should be initiated and maintained until
the user logs out from the system. The current session should be visible across all pages with
the option to logout from the session.</li>
<br><li>Log out functionality to clear the current session, enabling a new user to login to the system.</li>
<br><li>Server-side functions to retrieve a list of caravans uploaded by logged in user. This function
should support the caravan list view page, and caravan summary page.</li>
<br><li>Server-side functions to edit and delete the details of a caravan uploaded by a particular logged
in user.</li></ol>
