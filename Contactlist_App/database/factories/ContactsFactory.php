<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Contact::factory()
            ->count(100)
            ->create();
    }
}
