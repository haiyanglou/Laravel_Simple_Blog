Simple Blog Build Readme - Haiyang Lou, Nov 2017

1. Laravel installation (Search) -- prerequisite: have Composer installed first
   
   Via Composer Create-Project
   Terminal: composer create-project --prefer-dist laravel/laravel dev-blog

2. Open project - Configure package.json
   
   (Delete jQuery as it won't be used, we use vue) save file
   Terminal: npm install --prerequisite: have Node.js installed first, get NPM (Node Package Manager) is part of installing Node

3. *Configure composer.json file
    
   Add below "autoload" 

   "files": [
         "app/Helpers/html.php"
        ]
   Then create html.php, which could catch .js and .css files.

   Above step is not necessary, it just adds the timestamp in the css method. 
   <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
   <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> in later on layout.blade.php is good   


4. Configure webpack.mix.js, 
   
   let mix = require('laravel-mix');

   mix.disableNotifications();   //To avoid remind on toplight of screen again and again
   mix.js('resources/assets/js/app.js', 'public/js'); //To load js in resources to public/js
   mix.sass('resources/assets/sass/app.scss', 'public/css');  //To load sass in resources to public/css

5. Configure routes/web.php, Controller, View
   
   Route::get('/', 'PostsController@index'); // Homepage, index method in PostController
  
   Terminal: php artisan make:controller PostsController
             php artisan make:model Post
 
   
   Open app/Http/PostsController.php, do follow
   class PostsController extends Controller
       {
        #index
        public function index()
          {
            return view('posts.index');
          }
       }
   -- This step is to locate Controller to view.


   Create "posts" folder under resources/views, then create index.blade.php file, write follow
   @extends('layout')

   @section('content')
    Post index
   @stop
 
   Change welcome.blade.php to layout.blade.php, customize the content.

6. sass, js

   Customize resources/assets/sass/app.scss (app.scss import all path to other sass files *_colors, _variables)
   Build resources/assets/sass/layout folder build html.scss for body of web

   Customize resources/assets/js/app.js (app.js import vue.js, already there)
   Customize resources/assets/js/bootstrap

7. npm run watch -- For Compiling Assets (Laravel Mix) 
   (Just validate the webpack.mix.js file and let scss in resources->public/css/app.css, js in resources->public/js/app.js)
   *** Care the format!
   
   // Fonts
   @import url("https://fonts.googleapis.com/css?family=Noto+Sans:400,700|Noto+Serif:400,700");

   // Variables & Colors
   @import "variables";
   @import "colors";

   // Layout
   @import "layout/html";
   @import "layout/layout";

   // Bootstrap
   @import "~bootstrap-sass/assets/stylesheets/bootstrap";

   Terminal: npm run dev --build resources/assets/scss & js into public/css & js 
   **: npm run watch is to realtime check if everything css/js is going right

8. Start building content.

   sidebar.blade.php -- contents in sidebar

   index.blade.php -- contents of articles
   *Personalize this step

   **************

9. Authentication
   
   a.build directories into project
   Terminal: php artisan make:auth --create the authentication model
   in Laravel 5.5, 4 Controllers built
   RegisterController,LoginController,ForgotPasswordController,ResetPasswordController

   b.personalize database/migrations/table file
   Terminal: php artisan make:migration create_admins_table --create=admins --create table with timestamp
   in database/migrations customize create_admins_table, like 
   Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
   *least one unique 

   c. 
   create suitable database -- only database no table, tables will be created automatically
   turn to .env file, change configuration -- DB_DATABASE, DB_USERNAME, DB_PASSWORD  

   d. 
   Terminal: php artisan migrate -- tables created
   problem: when mysql version lower than 5.7 need to change AppServiceProvider file to configure.

   
   e. 
   instead of building new model with artisan, we could copy user model to admin model, change user -> model, add necessary columns
   now we have table to store admin, and model to manage admin, next step is to set up config/auth.php and ok! 

   f. 
   config/auth.php 4 parts: defaults, guards, providers, passwords

   default:
   could configure to specified type of users, user, admin, guest....
   //add below default: Auth::guard('admin')->check($credentials)

   guards: session for cookies and storage, token for api
   'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'admin-api' => [
            'driver' => 'token',
            'provider' => 'admins',
        ],
    ],

   providers: tells how to talk back and forward with database, use eloquent/database driver
   setup new provider for admin. 
   'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class,  //
        ],

   passwords: table was automatically created when do step d. php artisan migrate
   'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'users' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 15,
        ],
    ],

    g. configure Admin.php
       add: protected $guard = 'admin';

    h. add middleware to route at routes/web.app    
       just like step 5, direct route ->Route::get('/admin', 'AdminController@index')->name('home');
       then make controller from terminal or duplicate homecontrolloer and change few attributes
       
       2 place to change:
       --class AdminController extends Controller
       --return view('admin');
  

       then create a new "view" file ->resources/views/admin.blade.php (every process just like step 5 procedure)



