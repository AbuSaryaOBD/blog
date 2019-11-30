<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Comment;
use App\CommentReply;
use App\Photo;
use App\Post;
use App\Role;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'role_id' => $faker->numberBetween(1,3),
        // 'is_active' => 1,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('123456789'),
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1,4),
        'photo_id' => 1,
        'title' => $faker->sentence(7,11),
        'body' => $faker->paragraphs(rand(3,5),true),
        'slug' => $faker->slug(),
    ];
});

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['administrator','author','subscriber']),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['PHP','Laravel','Bootstrap','Javascript']),
    ];
});

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'file' => 'aj.png'
    ];
});

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(1,10),
        'is_active' =>1,
        'author' => $faker->name,
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1,true),
        'file' => 'images/aj.png',
    ];
});

$factory->define(CommentReply::class, function (Faker $faker) {
    return [
        'comment_id' => $faker->numberBetween(1,10),
        'is_active' =>1,
        'author' => $faker->name,
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1,true),
        'file' => 'images/aj.png',
    ];
});