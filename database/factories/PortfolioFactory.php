<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Apps Design',
            'title' => 'Banking Management System',
            "image" => 'frontend/assets/img/portfolio/portfolio_img02.jpg',
            'description' => "Rixelda - 24 hours Control room landing page
                Definition: Business strategy can be understood as the course of action or set of decisions which assist the entrepreneurs in achieving specific business objectives.

                It is nothing but a master plan that the management of a company implements to secure a competitive position in the market, carry on its operations, please customers and achieve the desired ends of the business.

                In business, it is the long-range sketch of the desired image, direction and destination of the organization. It is a scheme of corporate intent and action, which is carefully planned and flexibly designed with the purpose of

                Achieving effectiveness,
                Perceiving and utilizing opportunities,
                Mobilising resources,
                Securing an advantageous position,
                Meeting challenges and threats,
                Directing efforts and behaviour and
                Gaining command over the situation.
                A business strategy is a set of competitive moves and actions that a business uses to attract customers, compete successfully, strengthening performance, and achieve organizational goals. It outlines how business should be carried out to reach the desired ends"
        ];
    }
}
