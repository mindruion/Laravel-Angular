<?php
use Faker\Generator as Faker;
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
$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Admin','Member']),
    ];
});
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role_id'=> $faker->numberBetween(1,2),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\TeamMember::class, function (Faker $faker) {
    return [
        'full_name' => $faker->name,
        'job_title' => $faker->name,
        'email' =>$faker->safeEmail,
        'photo'=> 'placeholder.jpg',
        'skills' => $faker->randomElement(['HTML','CSS', 'Php', 'Angular']),
    ];
});
$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text('10'),
        'icon'=> 'relativePathToImage.jpg',
        'class' => $faker->name,
    ];
});
$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'url' => $faker->url,
        'requirements'=> $faker->text('10'),
        'coverImage' => 'relativePathToImage.jpg',
        'customer_id' => $faker->randomDigitNotNull,
        'domain' => $faker->domainName,
        'feedbacks' => $faker->text('15'),
        'technologies' => $faker->randomElement(['HTML','CSS', 'Php', 'Angular']),
        'services_id' => $faker->randomDigitNotNull,
    ];
});
$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'full_name' => $faker->name,
        'company' => $faker->company,
        'domain'=> $faker->domainName,
        'email' => $faker->email,
        'phone' => $faker->buildingNumber,
    ];
});
$factory->define(App\Technology::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text('10'),
        'icon'=> 'relativePathToImage.jpg',
        'class' => $faker->name,
    ];
});