# Poll Coding Challenge

#### NOTE
- Other than the `/dashboard`, `/register`, `/login` routes, none of the UI is complete as of Nov 11 9am. The only functionality is the API.

## Project Setup
- Clone this repo: `git clone git@github.com:cmeza/poll-app-challenge.git`
- Copy the `.env.example`, paste as `.env`, there are TWO env files
    - `./.env` (Docker specific config)
    - `./laravel/.env` (Laravel specific config)
- Edit the `.env` with your values
- Install the PHP dependencies: `composer install`
- Install the JS dependencies: `npm install`
- Install the Laravel application key: `php artisan key:generate --ansi`
- Run the migrations: `php artisan migrate`
- Setup the initial data: `php artisan db:seed`
- Edit your `hosts` file to include: `127.0.0.1 pollapp.test`
- Generate API tokens with in the Poll App UI

## Tinker with the App  
You will need to register to do anything with the app.
- Register in the app: http://pollapp.test/register
- Login: http://pollapp.test/login

### Wep/API Routes
You can view the following routes without any authentication and from the browser.

PRO TIP: install the [JSONViewer](https://chrome.google.com/webstore/detail/jsonview/chklaanhfefbnpoihckbnefhakgolnmc)
browser extension to view formatted JSON in the browser!

- View the existing routes: `php artisan route:list`
    - Unauthenticated API routes:
        - GET /api/polls
        - GET /api/polls/{poll}
        - GET /api/questions
        - GET /api/questions/{question}
        - GET /api/results
        - GET /api/results/{result}
    - Authenticated API routes:
        - POST /api/polls
        - PATCH /api/polls/{poll}
        - DELETE /api/polls/{poll}
        - POST /api/questions
        - PATCH /api/questions/{question}
        - DELETE /api/questions/{question}
        - POST /api/results
        - PATCH /api/results/{result}
        - DELETE /api/results/{result}
        - POST /api/types
        - PATCH /api/types/{type}
        - DELETE /api/types/{type}
        
## API Tokens
To access the API, you will need some Bearer Tokens generated by the Sanctum library.

Generate tokens:  
![Generate API Tokens](https://i.imgur.com/wgBeNeg.png)
- Click your name to access profile menu
- Click `API Tokens`
- Create 2 tokens (the names are arbitrary), copy each one as you will only see it once
    - Generate one with just `read` permission checked
    - Generate another with all permissions checked
- Import the Poll App Postman environment/collection from the project root & make calls.
    - Paste those tokens into the Postman variables for `read` only in `pollTokenRead`, the other in `pollTokenFull`  
        ![Postman environment variables](https://i.imgur.com/Krzhmkr.png)
    - The `read` only token should not be able to create/update/delete any resources
    - The other token should be able to do all resource actions
    - To test authorization on a specific create/update/delete route in Postman:  
    ![Postman per request Authorization](https://i.imgur.com/P5GkIbV.png) 
        1. Click the Authorization tab
        1. Change the `TYPE` from `Inherit auth from parent` to `Bearer Token`
        1. Set Token to `{{pollTokenRead}}`
        1. When you're done testing the read only, switch the `TYPE` back to `Inherit auth from parent`
        1. This `{{pollTokenRead}}` should be there each time you change the setting on any other routes now too!
