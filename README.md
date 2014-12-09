todo
====

Todo assignment for madewithlove

### Installation notes for development.
After cloning the repository, make sure gulp and nodejs are installed on your system.
Then, run the following steps:

#### 1. Database setup:

* Install laravel homestead and create a database called `dimsav_todo`.
* Ssh into the app directory in homestead vm and run `php artisan migrate`

#### 2. Asset files:

1. Run `bower install` to download assets.

2. Run these commands to setup gulp:

```bash
npm install --save-dev gulp
npm install --save-dev gulp-minify-css
npm install --save-dev gulp-ruby-sass
npm install --save-dev gulp-concat
npm install --save-dev gulp-uglify
```

