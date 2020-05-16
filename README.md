# ToDo

ToDo is a simple to-do list.

<img src="https://i.imgur.com/WqLoi3v.png"/>

## Requirements
- PHP 7.2
- Git
- Composer
- npm
- MySQL
- A Mailgun account / API credentials (domain and key)

## Running the application
- Clone the project into a folder of your choice.
- Visit the folder in the command line.
- Run the following commands, in this order:

npm install

composer install

npm run development

php artisan migrate

php artisan serve

- Visit http://127.0.0.1:8000 in your browser (ideally Chrome)
- You will be prompted to create an account. This account will only be used in your local database.
- Once your account is created, you may log in and create tasks exclusively for yourself.
- Each task can be marked as complete as you do them.

## Troubleshooting
### Cannot connect to database
1. Check that there is a .env file at the root of your project. If there is, ensure that the correct database credentials are at the top. If there is not, copy the .env.example files, and add the appropriate information. Only the DB_ section and the MAILGUN_ sections should need new values.

2. If there are still database connection issues, make sure that you have a 'todo' database. It may be that it requires implementation on your system. If so, you may simply enter your mysql connection via your favourite GUI such as MySQL Workbench, and add a new Schema called 'todo'. You will need to run the 'php artisan migrate' command in the command line again if this failed.

### Cannot send emails
1. You may need to apply the MailGun API Key and domain into the .env file. These go into the MAILGUN_SECRET (api key) and MAILGUN_DOMAIN  (domain) values. 
2. The account you signed up to the ToDo application with will have an email associated with it. Ensure that it is in the Authorized Recipients list of the MailGun account you are using the API details for. Further information on Authorized Recipients can be found here: 
https://help.mailgun.com/hc/en-us/articles/217531258-Authorized-Recipients

## Features coming soon
- Quick-access command line options
- Deleting tasks
- Editing tasks

## Reporting issues
If you have any problems with the application, please let me know or submit a report in the issues section of this GitHub repo.


Thank you for your interest in this repo!
