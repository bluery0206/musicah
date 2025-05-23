# Musicah

A PHP-based web application. It has the basic CRUD operations for music and User and Anon based views. Originally developed as a school project and revived to practice PHP concepts before learning Laravel.

This was probably the very first commission I did (neither paid or not) while still getting started with PHP for our Software Engineering I course if I remember correctly.

I revived this old PHP side project to get familiar or remember PHP in preperation for Laravel. I also applied things I learned when I was using Django. One of it is utilizing the

``` php
<?php if (...something...) { ?>
   // ... html code
   <?= "echo something" ?>
   // ... html code
<?php } ?>
``` 

although yes... it looks like a mess BUT, I used this before, you can see it in the [old tag](https://github.com/bluery0206/musicah/tree/3c94f12b103fba21ccac2575ed8c12624f8d5e91) AND I know Laravel uses the same idea so I think it's still a win.

## Features
- Role-based views (User/Anon)
- CRUD operations for music
- Fully responsive design

## Stack
- **Backend**: PHP 8.0.30
- **Frontend**: Halfmoon CSS
- **Database**: MySQL (XAMPP/LAMPP Default)
- **Server**: Apache

## Installation

1. Clone the repository in your `htdocs/` or `html/` directory:
``` bash
git clone https://github.com/bluery0206/room-reservation
```

2. Open your sever by going to `localhost/musicah/` in your browser.

## Usage
- Browse available music details (User/Anon)
- Full CRUD for music (User)
- Bulk delete music
