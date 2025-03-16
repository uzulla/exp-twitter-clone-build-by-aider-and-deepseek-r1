# Twitter Clone Project (Laravel)

A simple Twitter-like social media platform built with Laravel for educational purposes.

## screen shot

![image](https://github.com/user-attachments/assets/21d66823-f6bf-474d-bd5d-23411e03d3c9)

![image](https://github.com/user-attachments/assets/a64bdedb-fbf3-494a-b5b5-10667d3ce1b5)

![image](https://github.com/user-attachments/assets/444b38d6-a6d5-4257-8942-dbfe347a90d5)


## Features

- User Authentication (Registration/Login/Logout)
- Create and View Tweets (280 characters limit)
- Timeline showing all users' tweets
- User mentions in tweets (@username)
- Responsive UI with Bootstrap
- User profiles with tweet history

## Prerequisites

- PHP 8.0+
- Composer
- Node.js 14+
- MySQL/PostgreSQL/SQLite

## Installation

```bash
git clone [repository-url]
cd twitter-clone
composer install
npm install
cp .env.example .env
php artisan key:generate

# Configure database in .env
php artisan migrate
php artisan db:seed
```

## Running the Application

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Access the application at `http://localhost:8000`

## Testing Credentials

Test user (pre-registered):
- Email: test@example.com
- Password: password

Create new users:
```bash
php artisan tinker
\App\Models\User::factory()->create(['email' => 'your@email.com'])
```

## Development Notes

- All passwords are hashed except test users (fixed to 'password')
- Authentication implemented with manual routes (no laravel/ui)
- Blade templates with Bootstrap 5 styling
- Uses database migrations and model factories

## License

MIT License
