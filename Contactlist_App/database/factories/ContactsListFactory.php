<?php

namespace Database\Factories;

use App\Models\ContactList;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactsListFactory extends Factory
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
        ContactList::factory()
            ->count(10)
            ->create();
    }
}
