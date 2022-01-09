<?php

namespace Database\Factories;

use App\Models\Dokter_Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Dokter_ModelFactory extends Factory
{   
    
    /**
    * The name of the model.
    *
    * @var string
    */
   protected $model = Dokter_Model::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_dokter' => 'dr. ' . $this->faker->name(),
            'spesialis' => $this->faker->randomElement(['spesialis jantung', 'spesialis hati', 'spesialis kejiwaan', 'spesialis mata']),
            'jadwal_hari' => $this->faker->dayOfWeek('+3 weeks'). ' - ' . $this->faker->dayOfWeek('+2 weeks'),
            'jadwal_waktu' => $this->faker->time('H:i'). ' - ' . $this->faker->time('H:i', '11:00')
        ];
    }
}
