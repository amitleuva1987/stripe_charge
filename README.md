## How to Install

-   Clone the repository in your local machine using `git clone https://github.com/amitleuva1987/stripe_charge.git`
-   Copy .env.example from the root and create .env file
-   Create a database and enter database details in .env file
-   Run `composer install` to install all the dependencies
-   Run `npm install && npm run dev`
-   Run `php artisan migrate` and `php artisan db:seed` to insert the fake data
-   Add below stripe details in your .env file

STRIPE_KEY=pk_test**\*\*\*\***\***\*\*\*\***\*\*\*\***\*\***\*\*\*\***\*\***

STRIPE_SECRET=sk_test**\*\***\*\*\*\***\*\***\***\*\***\*\*\*\***\*\***

CASHIER_CURRENCY=inr

CASHIER_CURRENCY_LOCALE=INR

-   Run `php artisan serve` to start the application.
-   Use `4000003560000008` (credit card) to test transaction. enter any future date as card expire date, use any 3 digit number as CVV
