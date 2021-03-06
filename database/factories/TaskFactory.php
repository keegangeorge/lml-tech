<?php

namespace Database\Factories;

use App\Models\Assessment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'assessment_id' => Assessment::factory(),
            'title' => $this->faker->word,
            'hazards' => $this->faker->sentence,
            'riskLevel' => $this->faker->word,
            'controls' => $this->faker->sentence,
        ];
    }
}
