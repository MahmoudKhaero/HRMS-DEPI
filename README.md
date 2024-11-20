# Human Resource Management System

HRMS is a web-based system that simplifies HR tasks like recruitment, employee management, and attendance tracking. Job seekers can apply for positions without needing an account, while admins can manage employees, departments, and track attendance efficiently. the website offers a secure, user-friendly solution for streamlining HR operations in small to medium-sized companies.

## Steps to run this application:

1. Click on `<> Code` button
2. Copy the HTTPS/SSH repository link
3. Run `git clone` command on your terminal.
4. Install the necessary dependencies by running `composer install`
5. Creating .env file by `cp .env.example .env` and fill in the necessary fields, e.g.: database connection, etc.
6. Generate the application key by running `php artisan key:generate`
7. Next, run the database migration with this `php artisan migrate` command.
8. You can seed the database with `php artisan db:seed` command.
9. Lastly, serve the application with this `php artisan serve` command.
10. The HRMS application should accessible on your browser on "http://localhost:8000"

### Login Credentials

You can log into the application with this credentials (if you did the database seeding).

-   Username: `admin@gmail.com`
-   Password: `admin1234`

## Screenshots

**Home Screen**
![Home Screen](./documentation-images/HomePage(1).png)

![Dashboard Screen](./documentation-images/HomePage(2).png)
"# HRMS-DEPI" 
