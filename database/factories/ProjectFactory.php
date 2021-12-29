<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $projectName = $this->faker->sentence;
        $projectKey = projectKeyGenerator($projectName);
        $user = User::factory()->create()->id;

        return [
            'name' => $projectName,
            'key' => $projectKey,
            'description' => $this->faker->paragraph,
            'creator_id' => $user,
            'owner_id' => $user,
            'is_private' => $this->faker->boolean(80)
        ];
    }
}
