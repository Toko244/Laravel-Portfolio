<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Footer>
 */
class FooterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => '+81383 766 284',
            'short_description' => "There are many variations of passages of lorem ipsum available but the majority have suffered alteration in some form is also here.",
            'address' => "Level 13, 2 Elizabeth Steereyt set Melbourne, Victoria 3000",
            'country' => 'AUSTRALIA',
            'email' => 'random@email.com',
            'facebook' => 'https://www.facebook.com/',
            'twitter' => 'https://twitter.com/home',
            'instagram' => 'https://www.instagram.com/',
            'linkedin' => 'https://www.linkedin.com/'
        ];
    }
}
