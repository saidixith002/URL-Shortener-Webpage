# URL-Shortener-Webpage

## Overview
This simple PHP-based service converts URLs into short, redirected links on a custom top-level domain. It features an in-page alert system to notify the user upon a successful (or unsuccessful) URL shortening along with that how many clicks it has received after creation.

### Features
  - Can shorten unique URLs in 5 characters
  - Customised short url characters
  - Number of clicks on the short url is recorded
  - Total number of links generated are counted
  - Feature to delete the link from the database
  - Extremely fast: uses very little server resource
  - Minimalist front end: make it your own
  - Only uses alphanumeric characters so all browsers can interpret the URL
  
  
## Getting Started
  - Install the latest version of XAMPP from apachi foundation softwares (https://www.apachefriends.org/index.html).


### Creating a Database
  - Create a databse with any preferred name and update the databse details in [PHPScripts/config.php](https://github.com/saidixith002/URL-Shortener-Webpage/blob/main/PHPScripts/config.php)
  - Import the [url.sql](https://github.com/saidixith002/URL-Shortener-Webpage/blob/main/url.sql) file into that  database which creates the table url with all the required files and constraints.
 
### Working with the web app
  - Start the Apache and MySql services from XAMPP control.
  - Copy all the files from this repo to local machine ( XAMPP/php/htdocs/url ).
  - Open any browser and goto localhost/url then you can see the webapp running.

## Author 
  - Sai Dixith Chetelli
  - Mail: saidixith002@gmail.com
