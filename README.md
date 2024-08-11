# Laravel E commerce

This is a Laravel application for an e commerce.

## Prerequisites

Before you begin, ensure you have met the following requirements:
- PHP >= 8.2
- Node.js >= 20
- Composer >= 2.6
- MySQL

## Installation

Follow these steps to set up and run the application:

1. **Clone the repository**

   ```bash
   git clone https://github.com/muhammedjafer/laravel-vue.git
   cd laravel-vue
2. **Update composer**

   ```bash 
   composer update
3. **Generate app key**

   ```bash 
   php artisan key:generate
4. **Create the env file**
    ```bash
    cp .env.example .env
5. **Configure the env file for the database in env**

6. **Run the migration**
    ```bash
    php artisan migrate
7. **Seed the database**
    ```bash
    php artisan db:seed
8. **Install node modules**
    ```bash
    npm install
9. **Start the vite server**
    ```bash
    npm run dev
10. **Start the app**
    ```bash
    php artisan serve
## Default user
1. Admin\
    email: test@example.com\
    password: testinglaravelui
