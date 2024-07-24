<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Lead;
use App\Models\LeadStatusLog;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Factory;
use Faker\Generator as Faker;
use App\Models\LeadFactory;


class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Contact::factory()->count(10)->create();  // Adjust the number as needed

        
        User::factory()->count(5)->create();

        // Create sample leads using factories
        Lead::factory()->count(20)
            ->afterCreating(function (Lead $lead, Faker $faker) {
                // Create a contact for the lead
                $contact = Contact::factory()->create();
                $lead->contact_id = $contact->id;
                $lead->save();

                // Create a random number of tasks (0-3) for the lead
                $taskCount = $faker->numberBetween(0, 3);
                for ($i = 0; $i < $taskCount; $i++) {
                    Task::factory()->create([
                        'lead_id' => $lead->id,
                        'created_by' => User::all()->random()->id, // Assign to a random user
                    ]);
                }

                // Create a lead status log entry with initial status (new)
                LeadStatusLog::create([
                    'lead_id' => $lead->id,
                    'status' => $lead->status, // Assuming initial status is "new"
                    'changed_by' => User::all()->random()->id, // Changed by random user
                ]);
            })
            ->create();
    }
}
