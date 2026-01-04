# TechLaptops - E-commerce Website

A simple e-commerce website for a fictional laptop store named "TechLaptops". This project includes fundamental features like user registration, login, session management, and a basic structure for product display. It is built with a classic PHP and MySQL backend, with a plain HTML, CSS, and JavaScript frontend.

## Features

*   **User Authentication:** Users can register for a new account and log in.
*   **Session Management:** User sessions are maintained to keep them logged in across pages.
*   **Product Display:** A folder structure is set up for showcasing different laptop models.
*   **Database Integration:** User data is stored in a MySQL database using prepared statements to prevent SQL injection.

## Tech Stack

*   **Backend:** PHP
*   **Database:** MySQL
*   **Frontend:** HTML, CSS, JavaScript
*   **Server:** Apache (typically via XAMPP, WAMP, or MAMP)

## Local Setup and Installation

To run this project on your local machine, follow these steps:

1.  **Prerequisites:**
    *   Make sure you have a local server environment like [XAMPP](https://www.apachefriends.org/index.html) installed and running. This provides Apache, PHP, and MySQL.

2.  **Project Location:**
    *   Place the project folder inside the `htdocs` directory of your XAMPP installation (e.g., `c:\xampp\htdocs\WEB_WORK\web-v1`).

3.  **Database Setup:**
    *   Open phpMyAdmin from your XAMPP control panel (navigate to `http://localhost/phpmyadmin`).
    *   Create a new database named `userdb`.
    *   Select the `userdb` database and go to the **Import** tab.
    *   Click "Choose File" and select the `users.sql` file from the project directory.
    *   Click "Go" at the bottom of the page to import the `users` table structure.

4.  **Run the Application:**
    *   Open your web browser and navigate to `http://localhost/WEB_WORK/web-v1/`.
    *   The website should now be running.

## File Structure

```
.
├── index.html       # Main landing page
├── login.php        # Handles user login logic
├── regiter.php      # Handles user registration logic
├── db.php           # Database connection setup
├── users.sql        # SQL dump for the users table
├── style.css        # Main stylesheet
├── main.js          # Main JavaScript file
├── cart.html        # Shopping cart page
└── assets/          # Contains all product images
```
