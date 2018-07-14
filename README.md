# About
The mimi php api is a RESTFUL webservice built using the [Slim Framework](https://www.slimframework.com/). The application allows for a user to 
make HTTP request and perform the following CRUD operations.

## Architecture
The main files of the application are **index.php**, which is located in the public folder, **category.php** and **post.php**,
which is located in the api folder. The index.php parses the url, then includes the proper service to handle the request.
The category.php and post.php contain the services to handle all incoming request. There also is **db.php**, located in the root
of the **app folder**, which is a class used for connecting, and making database calls.


## Installation
To run mini-php-api, download XAMPP from [apachefriends.org](https://www.apachefriends.org/download.html). Inside of the htdocs
folder clone or download the mini-php-api repository. Start apache server and mysql database. Import the slimblog.sql located inside
the sql folder. Once you have your database setup you can test the application by using **test.html**, The test.html allows you to 
perform create, update, and delete request on all post, as well as returns links for json endpoint for each post and category.
The test.html is driven by the **app.js** file located in the js folder. 

## Software
- PHP
- MYSQL
- JQuery
- Bootstrap
- [XAMPP](https://www.apachefriends.org/index.html)

## License 
[MIT](https://opensource.org/licenses/MIT)
