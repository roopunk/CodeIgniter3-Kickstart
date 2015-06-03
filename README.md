# CodeIgniter3-Kickstart

So I've created this kickstart codeigniter module to kickstart my own projects and minimize development time and effort.

A CMS would have been an overkill with too many features and writing an app from scratch would have been reinventing the wheel. This is where this module will come in handy.

updated to  **CODEIGNITER 3.0.0**

### Features
  - Codeigniter 3.0.0 out of the box
  - Basic Login and Register functions
  - Bcrypt password encryption
  - Bootstrap 3.3.4

### Controllers
The following cotrollers are included in the base package : 
  - App.php - for loggedin users
  - Pages.php - for static pages and for guest users
  - User.php - for login and register functions

### To Set it up:
  - Copy the files into a web directory
  - Modify your application/config/config.php file and change your base_url
  - Modify your application/config/database.php file with your database settings
  - Create a database and import the sql file kickstart.sql to it. It will create two tables 'user' and 'ci_sessions'

Thats it. 
Kickstart your next codeigniter based web project!!