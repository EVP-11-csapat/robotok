# Robot

This Laravel project simulates robots and chargers in a warehouse environment. The robots are responsible for moving cargo, while the chargers are responsible for charging the robots.

## Installation

1. Clone the repository: `git clone https://github.com/EVP-11-csapat/robotok.git`
2. Navigate to the project directory: `cd robotok`
3. Install the dependencies: `composer install | npm install`
4. Create a copy of the .env file: `cp .env.example .env`
5. Generate an application key: `php artisan key:generate`
6. Configure the database settings in the .env file
7. Run the database migrations: `php artisan migrate`
8. Seed the database: `php artisan db:seed`

## Usage

To start the application, run the following commands: `npm run dev` `php artisan serve`

Open the website in your browser: `localhost:8000`

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
