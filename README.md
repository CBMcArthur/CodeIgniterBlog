Kirkman's Blog
===============

A company who is possibly interested in offering me a job wants me to demonstrate my PHP skills.  They requested that I:
	write with any PHP framework a basic blog with login system, 2 users, where a user post a blog post and the other user add a comment. BASIC HTML needed.
	
This GitHub project is a quick and dirty implementation of the requested blog system.  It is far from perfect as explained further down in this document.

Installation
------------
Details on how to install and configure your server for this project is beyond the current scope of the project.  However, this section will provide a quick overview and assumes you are knowledgeable about web servers, PHP and SQL servers.  This project uses the CodeIgniter PHP framework.  To install the project on a web sever, simply copy the contents of the project into your web server's document path and be sure that your web server supports PHP files.  The blog system utilizes a simple database structure.  An SQL dump of that database is found in the repository with the name: KirkmanBlog.sql.  You can import this SQL dump into your SQL server and modify the project's database configuration (/application/config/database.php) to connect to that database.  

User Accounts
-------------
This system comes with two user accounts already created in the database to test the system with.  The user account credentials are:
* Username: "christian", Password: "chrisp4$$", Permissions: "Create blog postings"
* Username: "kirkman", Password: "kirkmanp4$$", Permissions: "Comment on blog postings"

Deficiencies
------------
1. Lack of Security: In the interest of time, the passwords are stored in the database in plain text.  The passwords should be hashed and salted in a real blog system.
2. HTML Theme: Specifically there isn't one.  The HTML is bare-bones and lacks CSS and an encompassing theme.  The idea would be the back-end framework that I've built here would be integrated into a pre-existing theme created by a HTML designer or graphics designer.