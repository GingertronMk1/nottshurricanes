<?php

namespace Database\Seeders;

use App\Models\CommitteeMember;
use Illuminate\Database\Seeder;

class CommitteeMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getRoles() as $key => $role) {
            CommitteeMember::query()->create([
                ...$role,
                'sort_order' => $key,
                'is_active' => true,
            ]);
        }
    }

    /**
     * @return (array<string, string>)[]
     */
    private function getRoles(): array
    {
        return [
            [
                'name' => 'Bas Labree',
                'role' => 'Touch Rugby Co-Chair',
                'pronouns' => 'he/him',
            ],
            [
                'name' => 'Riley Harris',
                'role' => 'Rugby Union Co-Chair',
                'pronouns' => 'they/them',
            ],
            [
                'name' => 'Liam Earley',
                'role' => 'Secretary',
                'pronouns' => 'he/they',
            ],
            [
                'name' => 'Nāgamanas Armstrong',
                'role' => 'Sponsorship and Fundraising Officer',
                'pronouns' => 'they/them',
            ],
            [
                'name' => 'Ryan Ford',
                'role' => 'Treasurer',
                'pronouns' => 'he/him',
            ],
            [
                'name' => 'Nathan Barrington',
                'role' => 'Social Media Officer',
                'pronouns' => 'he/him',
            ],
            [
                'name' => 'Izzy Ellis',
                'role' => 'Safeguarding Lead',
                'pronouns' => 'she/her',
            ],
            [
                'name' => 'Rach Grayston',
                'role' => 'Touch Rugby Captain',
                'pronouns' => 'they/them',
            ],
            [
                'name' => 'Ed Cox',
                'role' => 'Rugby Union Captain',
                'pronouns' => 'they/them',
            ],
            [
                'name' => 'Jack Ellis',
                'role' => 'Touch Rugby Head Coach',
                'pronouns' => 'he/him',
            ],
            [
                'name' => 'Chrissy Hillier',
                'role' => 'Rugby Union Head Coach',
                'pronouns' => 'they/them',
            ],
        ];
    }
}
