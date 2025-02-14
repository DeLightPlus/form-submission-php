# Form Submission with PHP and MySQL

This project provides a simple web application where users can submit their name and email address through a form. The submitted data is stored in a MySQL database, and the submitted entries are displayed on the same page.

## Features
- **Form Submission**: Users can submit their name and email.
- **Database Storage**: Submitted data is stored in a MySQL database.
- **Display Submissions**: All submitted entries are displayed in a table below the form.
- **Responsive Design**: The form and table layout are responsive to different screen sizes.

## Technologies Used
- PHP
- MySQL
- HTML
- CSS

## Prerequisites
To run this project on your local machine, you need to have the following installed:
- PHP (version 7.0 or higher)
- MySQL
- A web server such as Apache or Nginx (recommended: XAMPP or WAMP for local development)

## Setup Instructions

### Step 1: Clone the repository
If you haven't already, clone the repository to your local machine:

```bash
git clone https://github.com/DeLightPlus/form-submission-php.git
cd form-submission-php
```

### Step 2: Set up the MySQL database
1. Create a new database: Open MySQL and create a database named test_db.

```sql
CREATE DATABASE test_db;
```
2. Create the submissions table: After creating the database, use the following SQL command to create the submissions table:

```sql
USE test_db;
CREATE TABLE submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);
```
### Step 3: Configure the Database Connection
 In the project folder, locate the connect.php file. Update the database connection settings to match your local MySQL setup.
 ```php
 <?php
$servername = "localhost";  // MySQL server (localhost for local development)
$username = "root";         // MySQL username (usually "root")
$password = "";             // MySQL password (default is empty for local servers)
$dbname = "test_db";        // The name of your database

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```

### Step 4: Place the files in the server's document root
If you are using XAMPP or WAMP, place the project files in the htdocs folder (for XAMPP) or the www folder (for WAMP).
For example:
* index.php
* style.css
* connect.php

### Step 5: Open the project in a browser
Open your browser and go to http://localhost/submit/index.php. You should see the form that allows you to submit your name and email address.
