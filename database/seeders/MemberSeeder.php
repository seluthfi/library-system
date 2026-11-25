<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => 'Muhammad Luthfi Ramadhan',
                'member_code' => 'M001',
                'phone' => '081234567801',
                'address' => 'Jl. Merdeka No. 1',
            ],
            [
                'name' => 'Muhammad Syifaaur Rahman',
                'member_code' => 'M002',
                'phone' => '081234567802',
                'address' => 'Jl. Sudirman No. 2',
            ],
            [
                'name' => 'Muhammad Sayyid Zhilan Hifzhullah',
                'member_code' => 'M003',
                'phone' => '081234567803',
                'address' => 'Jl. Ahmad Yani No. 3',
            ],
            [
                'name' => 'Muhammad Zaki Riyanto',
                'member_code' => 'M004',
                'phone' => '081234567804',
                'address' => 'Jl. Diponegoro No. 4',
            ],
            [
                'name' => 'Muhammad Rizqi Rahmatullah',
                'member_code' => 'M005',
                'phone' => '081234567805',
                'address' => 'Jl. Gatot Subroto No. 5',
            ],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}
