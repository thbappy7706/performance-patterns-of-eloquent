<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()->count(10000)->create()->each(fn($company)=>$company->members()
            ->createMany(Member::factory()->count(10)->make()->map->getAttributes()));

        $member = Member::find(10000);
        $member->update([
            'first_name' => 'Bill',
            'last_name' => 'Gates',
            'email' => 'bill.gates@microsoft.com',
        ]);
        $member->company->update([
            'name' => 'Microsoft Corporation',
        ]);

        $member = Member::find(20000);
        $member->update([
            'first_name' => 'Tim',
            'last_name' => 'O\'Reilly',
            'email' => 'tim@oreilly.com',
        ]);
        $member->company->update([
            'name' => 'O\'Reilly Media Inc.',
        ]);
    }
}
