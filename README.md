

# WEBAPP Bravi

Exercises submitted to the Bravi Interview.

## Versions

* PHP 5.6.31
* MySQL 5.7.19
* Apache 2.4.27

I used Wampserver Version 3.1.0 - 64bit for Windows to setup the environment.

## Getting the Project

* Clone the project using GitHub

    ``git clone https://github.com/KenjiHasegawa/webapp-bravi.git``

## Getting Started

The files of the project should go to:

    /path/to/your/www/webapp-bravi/


Since I'm using Wampserver on Windows, my default installation path is:

    C:/wamp64/www/webapp-bravi/

## Database Connection

After you set up your database with MySQL and if you chose to have a different username from 'root' and a password, 
you can change the database connection variables inside:

    webapp-bravi/config/database_class.php
    
Once there, you should be able to change these however you want:

    private $host       = "localhost";
    private $database   = "contacts";
    private $username   = "root";
    private $password   = "";

## Having Fun

Once everything is correctly installed and ready to go you can access and play with it:

    http://localhost/webapp-bravi/
    
The Menu is divided between:
   * Balanced Brackets: You can input your strings with brackets and check if they are balanced! You can even input some 
   programming code if you want.
   
   * REST API: Just a simple framework to use the recently new developed API just for this Interview! In this API you can
   manage your own contacts with functions such as: create, update, delete, get all or one person.

   * Current Weather: Worried about someone far away, or even yourself, you can check the current weather anywhere in the
   world! (as long as the city is addded in the used [API](http://openweathermap.org/api))
   
Any questions can be sent to the email down below.

## Author
[Eduardo Kenji Hasegawa de Freitas](https://github.com/KenjiHasegawa/) (kenjihasegawa@live.com)