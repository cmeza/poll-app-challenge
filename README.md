# Poll Coding Challenge

#### NOTE
- Other than the `/dashboard`, `/register`, `/login` routes, none of the UI is complete as of Nov 11 9am. The only functionality is the API.

## Project Setup
- Copy the `.env.example`, paste as `.env`, there are TWO env files
    - `./.env` (Docker specific config)
    - `./laravel/.env` (Laravel specific config)
- Edit the `.env` with your values
- Install the PHP requirements: `composer install`
- Install the JS requirements: `npm install`
- Install the Laravel application key: `php artisan key:generate --ansi`
- Run the migrations: `php artisan migrate`
- Setup the initial data: `php artisan db:seed`
- Edit your `hosts` file to include:  
  ```127.0.0.1    pollapp.test```

## Tinker with the App  
- Register in the app: http://pollapp.test/register
- Login: http://pollapp.test/login
- Click your name to access profile, click API Tokens. Create 2 tokens, 1 with just `read` checked, another with all roles checked.
- Copy/paste those tokens into the Postman variables for `read` only in `pollTokenRead`, the other in `pollTokenFull`

### Wep/API Routes
- View the existing routes: `php artisan route:list`
    - The API Routes not behind authentication:
        - GET /api/polls
        - GET /api/polls/{poll}
        - GET /api/questions
        - GET /api/questions/{question}
        - GET /api/results
        - GET /api/results/{result}
- Load the Postman environment/collection from the project root & make calls.
    - The `read` only token should not be able to create/update/delete any resources
    - The other token should be able to do all resource actions
    - To test authorization on a specific route in Postman: 
        1. Click the Authorization tab
        1. Change the `TYPE` from `Inherit auth from parent` to `Bearer Token`
        1. Set Token to `{{pollTokenRead}}`
        1. When you're done testing the read only, switch the `TYPE` back to `Inherit auth from parent`
        1. This `{{pollTokenRead}}` should be there each time you change the setting on any other routes now too!  
        ![Postman per tab Authorization](https://i.imgur.com/K0qjTwj.png) 
