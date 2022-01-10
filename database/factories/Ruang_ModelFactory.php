<?php

namespace Database\Factories;

use App\Models\Ruang_Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Ruang_ModelFactory extends Factory
{
    /**
    * The name of the model.
    *
    * @var string
    */
   protected $model = Ruang_Model::class;

   
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_ruang' => 'Ruang ' . $this->faker->randomElement(['Tidur', 'Periksa', 'Tunggu', 'Santai']),
            'kapasitas' => $this->faker->numberBetween(1, 15),
        ];
    }
}
