<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tareas>
 */
class TareasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::all()->random()->id,
            'nombre' => $this->faker->unique()->sentence(),
            'descripcion' => $this->faker->text(),
            'completada' => $this->faker->boolean(),
            'fecha_creacion' => $this->faker->dateTime(),
            'fecha_completada' => $this->faker->dateTime()


        ];
    }
}
