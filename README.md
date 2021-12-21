<div align="center" style="font-size: 32px">

 <b>Todo Cuba Engineer</b>

</div>

<div align="center">

![GitHub top language](https://img.shields.io/github/languages/top/bjvalmaseda92/todo-cuba-engineer?logo=php) ![Codecov](https://img.shields.io/codecov/c/github/bjvalmaseda92/todo-cuba-engineer?logo=codecov&token=H7DYU7DCB0) ![Laravel](https://img.shields.io/badge/laravel-v8-orange)

</div>

- [**Description**](#description)
- [**Installation**](#installation)
- [**Test**](#test)

## **Description** ##

This is an app only for the purpose of presenting a technical test for Cuba Engineer

Docker and Docker compose are used to generate the environment where the application will be running and Laravel as a development framework

## **Installation** ##

To start using the app we must create the environment by running the following commands

1. Get the repository

        git clone git@github.com:bjvalmaseda92/todo-cuba-engineer.git

2. Run docker compose inside the project folder to create the runtime environment

        docker-compose up -d

3. After that we are ready to install all the dependencies and generate the configuration files.

        docker-compose exec php composer install

4. Create a copy of .env.example and rename it to .env

5. Generate a key for your application

        docker-compose exec php php artisan key:generate

6. After that change the DB connection in to .env file a run the migrations

   ![.env](/images/env_file.png)

        docker-compose exec php php artisan migrate

And the app is ready to use. Go to your browser and go to <http://localhost>

![.env](/images/index.png)

## **Test** ##

To run test you can use:

        docker-compose exec php php artisan test

or for E2E test run

         php artisan dusk
