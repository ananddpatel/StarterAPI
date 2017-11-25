# StarterAPI

## Use case
I made this to practice API development and for personal use. Creating blogs are one of the best ways to learn the basics of a framework and this API has all the basic resources, people and their respective comments and blog posts, blogs with comments, etc. to populate facilitate your practice blog site.

## Endpoints 
  ### Blog
  - GET: /blog
  - GET: /blog/{id}
  - GET: /blog/{id}/comments
  - POST: /blog
    - accepts a ```title``` and ```body```
    - doesn't actually stores in the data base but simulates a POST request.
  ### People
  - GET: /people
  - GET: /people/{id}
  - GET: /people/{id}/comments
  ### Comments
  - GET: /comments
  - GET: /comments/{id}
  
  endpoints can also accept a limit query string ```?limit={int}``` to change the num of items returned

## See a working local version:
1. clone this repo
2. run ```composer install```
3. run ```npm install```
4. run ```npm run dev``` or ```npm run production```
5. rename ```.env.example``` to ```.env``` and configure your database settings
6. run ```php artisan key:generate``` to generate an app key specific to yourself
7. run ```php artisan migrate```
8. run ```php artisan db:seed``` to seed the database
9. run ```php artisan serve``` to view the website
