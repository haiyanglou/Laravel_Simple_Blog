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


