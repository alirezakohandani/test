<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\admin\File;
use Faker\Generator as Faker;

$factory->define(File::class, function (Faker $faker) {
    return [
        'type' => 'pdf',
        'title' => $faker->title(),
        'description' => $faker->text(),
        'price' => $faker->numberBetween(10000, 200000),
        'thumb' => 'thumb/haUYupEChTbiX30BDRIj3yCQaxu3nH8ASOOxuAdb.jpg',
        'link' => 'file/9dWL0Ki165JnEhMpAnPlWeptAPu9gj0EurA2FGq3.pdf',
    ];
});
