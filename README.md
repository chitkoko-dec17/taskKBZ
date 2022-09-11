# taskprojectKBZ
Assignment project from KBZ Interview 

## Installation

### Dependencies:

#### Server Side
* [PHP 7.2.33]
* [Laravel 7.2+]
* ["barryvdh/laravel-dompdf": "^2.0"]
* ["maatwebsite/excel": "^3.1"]

#### Frontend Side
* [FullCalendar v5.11.3]


### To run locally

- Git clone this repository
- Change directory into root of cloned folder
- Enter `composer install` (assuming you have `composer` and its related packages installed and or configured)
- Rename `.env.example`  to `.env` (This contains the app configs and databases settings)
- Enter `php artisan migrate` to run migration  
- Enter `php artisan db:seed` for test data
- Enter `php artisan serve` to start application
- Open http://localhost:8000 or http://127.0.0.1:8000 to access frontend vue ui
