<?php

namespace Database\Factories\MediaCenter;

use App\Models\MediaCenter\MediaCenter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MediaCenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = MediaCenter::class;

    public function definition(): array
    {
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'description' => $this->faker->text,
            'short_description' => fake()->paragraph(),
            'slug' => Str::slug($title),
            "type" => "erez",
            "status" => 'active',
            "showInSlider" => 'no',
            "publication_at" => now(),
            "basicFile" => 'https://via.placeholder.com/640x480.png/0099ff?text=sapiente',

        ];
    }
}


// MediaCenter::create([
//     "description" => $request->post('description'),
//     "short_description" => $request->post('short_description'),

//     ,
//     ,

//     "basicFile" => $basicFileName,
//     ,
// ]);
