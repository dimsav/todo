todo
====

Todo assignment for madewithlove. Live demo [here](http://todo.dimsav.com).

### Installation steps for development environment.

After cloning the repository, make sure gulp and nodejs are installed on your system.
Then, run the following steps:

#### 1. Database setup

* Install laravel homestead and create a database called `dimsav_todo`.
* Ssh into the app directory in homestead vm and run `php artisan migrate`

#### 2. Composer install

Execute `composer install` to install composer dependencies.

#### 3. Setup

* Add `192.168.10.10 local.todo.com` to the host machine's /etc/hosts file. Use the local ip of the homestead machine.
* Enter the following domain in Homestead.yaml, pointing to the appropriate repository path in the virtual machine:

```
- map: local.todo.com
  to: /home/vagrant/sites/todo/public
```

* Run `vagrant provision` to apply the homestead changes

#### 4. Cache server

Make sure Memcache is installed on the web server.

#### 5. Asset files (needed only to do changes in assets files)

1. Run `bower install` to download assets.

2. Run these commands to setup gulp:

```bash
npm install --save-dev gulp
npm install --save-dev gulp-minify-css
npm install --save-dev gulp-ruby-sass
npm install --save-dev gulp-concat
npm install --save-dev gulp-uglify
```
