<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => "I'm a Rasalina based product design & visual designer focused on crafting clean & user‑friendly experiences",
            'short_title' => 'I will give you Best Product in the shortest time.',
            "image" => 'frontend/assets/img/banner/banner_img.png',
            'video_url' => 'https://www.youtube.com/watch?v=LZcBBHQco1E&t=471s'
        ];
    }
}
