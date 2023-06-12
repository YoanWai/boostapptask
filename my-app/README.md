**#Project Initializing Guide**

Required: MySQL Running.

\*Download the zipped project folder and place it in "C:\xampp\htdocs"

\*Copy .env.example into .env

\*Open the terminal and paste the following commands:

//Install dependencies:
"npm i"

// Seed your empty MySQL Database:
"php artisan migrate:refresh --seed"

// Run the project:
php artisan serve

And now you’ll be able to access the website through the url shown after serving, usually http://127.0.0.1:8000
