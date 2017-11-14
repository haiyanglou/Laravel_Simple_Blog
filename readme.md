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