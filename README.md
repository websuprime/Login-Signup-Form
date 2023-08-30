#Gmail Login, Signup, Email Verification, and Password Reset in PHP
This project demonstrates how to create a web application that enables users to sign up and log in using their Gmail accounts. It includes features for email verification and password reset using PHP and PHPMailer.

Prerequisites
PHP installed on your server
PHPMailer library (Download from: https://github.com/PHPMailer/PHPMailer)
Gmail API credentials (OAuth 2.0)
Setup
Clone the repository to your web server directory.

Install the PHPMailer library by placing its files in a directory within your project.

Configure Gmail API:

Create a project in the Google Developers Console (https://console.developers.google.com/).
Enable the Gmail API for your project.
Create OAuth 2.0 credentials and download the JSON file.
Place the JSON file in a secure location on your server.
Configure the project:

Open config.php and fill in your Gmail API credentials and other configuration details.
Features
1. Login and Signup Using Gmail
Users can sign up and log in using their Gmail accounts.
OAuth 2.0 authentication is used for secure Gmail login.
2. Email Verification
After signing up, users receive an email with a verification link.
Clicking the link verifies the user's email address.
3. Password Reset via Email
Users who forget their password can initiate a password reset.
An email with a password reset link is sent to the user's email.
Clicking the link allows the user to reset their password.
Implementation
Login and Signup:

Use the Gmail API and OAuth 2.0 for secure login with Gmail accounts.
Implement a signup form that stores user details in the database.
Email Verification:

Generate a verification token for each user during signup.
Send a verification email using PHPMailer with a link containing the token.
Verify the token when the user clicks the link.
Password Reset:

Implement a "Forgot Password" feature.
Generate a reset token for the user.
Send a reset email using PHPMailer with a link containing the token.
Verify the token and allow the user to reset their password.
Usage
Sign up and log in using your Gmail account.
Check your Gmail inbox for a verification email after signing up.
Click the verification link to verify your email address.
If you forget your password, use the "Forgot Password" link on the login page.
Follow the link in the password reset email to reset your password.
Disclaimer
This project provides a basic demonstration of the mentioned functionalities. Security aspects such as input validation, token validation, and secure storage of sensitive information should be thoroughly addressed before deploying in a production environment.

Credits
PHPMailer: https://github.com/PHPMailer/PHPMailer
License
This project is licensed under the MIT License.
