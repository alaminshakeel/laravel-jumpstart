# README #


### What is this repository for? ###
This is the main repository for "Laravel Jump Starter" App

### How do I get set up? ###
## Setup:
All you need is to run these commands:

```bash

git clone https://github.com/kossa/laradminator.git

cd laradminator

composer install # Install backend dependencies

sudo chmod 777 storage/ -R # Chmod Storage

php artisan storage:link # Enable link to storage

cp .env.example .env # Update database credentials configuration

php artisan key:generate # Generate new keys for Laravel

create a database name '**larastart**' with permission to root user.(If you want to use another database name! well! you know the drill ).

php artisan migrate:fresh --seed # Run migration and seed users and categories for testing

yarn install # or npm i to Install node dependencies(>= node 9.x)

npm run production # To compile assets for prod

See this [crud-generator](https://packagist.org/packages/appzcoder/crud-generator) link for generating any new crud  .every set up is already done , just follow paragraph name ** Commands**


```
#### How can I use custom CSS and JS ?

The current architecture of assets are inspired from [adminator](https://github.com/puikinsh/Adminator-admin-dashboard/tree/master/src/assets/scripts), so all assets(css and js) are located in [resources](https://github.com/kossa/laradminator/tree/master/resources). if you want to add new component, like [select2](https://select2.org/) juste create file like [`resources/js/select2/index.js`](https://github.com/kossa/laradminator/blob/master/resources/js/select2/index.js), and don't forget to load it in [bootstrap.js](https://github.com/kossa/laradminator/blob/master/resources/js/bootstrap.js#L54)


If you want to update the CSS, you can put them directly in [`resources/sass/app.scss`](https://github.com/kossa/laradminator/blob/master/resources/sass/app.scss#L72) or create new file under `resources/sass` and import it in [resources/sass/app.scss](https://github.com/kossa/laradminator/blob/master/resources/sass/app.scss#L5)

> VERY IMPORTANT: Any change you make on resources you have to run : `npm run dev` or `npm run prod`.

> If you have a lot of changes it's much better to run: `npm run watch` to watch any changes on your files, take a look on [browersync](https://laravel.com/docs/master/mix#browsersync-reloading)


#### Create new CRUD

Creating CRUD in your application is the job you do most. Let's create Post CRUD:

* Add new migration and model : `php artisan make:model Post -m`

* Open migration file and add your columns

* Create PostsController : `php artisan make:controller PostController`. fill your resource (you can use UserController with some changes) or, if you are a lazy developer like me, use a [snippet](https://github.com/kossa/st-snippets/blob/master/kossa_php/Laravel/lcontroller.sublime-snippet) and make only 2 changes

## License

Laravel Jump Start is licensed under The MIT License (MIT). Which means that you can use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the final products.

### Contribution guidelines ###
 1.  Pull before every time  start working
 2.  Make sure you commit & push right after whenever you changed/added anything.
 3.  Use your task name as commit message, it makes easy track down task list


### Who do I talk to? ###
YOU KNOW HOW TO TALK :-D
