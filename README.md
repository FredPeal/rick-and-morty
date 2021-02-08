# rick-and-morty
This is a solution for Rick and Morty Challenge write in php

## Install
- cp .env.example .env
- composer update
- php -S localhost: 8000

```
By default the app is in development, that means that it does not bring all the results, only the first page of each iteration, because if I bring all the results from the api in the case of the character endpoint many times the api makes me a stop. If you want to change that, in your file .env change value APP_PRODUCTION from 0 to 1

If you want to test the API without downloading the repo visit this page https://blooming-brushlands-50550.herokuapp.com/
```