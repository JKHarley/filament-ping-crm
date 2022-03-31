<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Contact;
use App\Models\Organisation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        $organizations = Organisation::factory(100)
            ->create();

        Contact::factory(100)
            ->create()
            ->each(function ($contact) use ($organizations) {
                $contact->update(['organisation_id' => $organizations->random()->id]);
            });
    }
}
