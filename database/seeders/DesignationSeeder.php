<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('designations')->truncate();

//        Schema::enableForeignKeyConstraints();

        DB::table('designations')->insert([['name' => 'Emergency Medical Technician', 'urdu_name' => 'ایمرجنسی میڈیکل ٹیکنیشن', 'code' => 'EMT', 'responsibilities' => 'Provide emergency medical care, patient assessment, and ambulance response.'], ['name' => 'Lead Fire Rescuer', 'urdu_name' => 'لیڈ فائر ریسکیو', 'code' => 'LFR', 'responsibilities' => 'Lead firefighting and rescue operations; ensure safety compliance.'], ['name' => 'Driver', 'urdu_name' => 'ڈرائیور', 'code' => 'DR', 'responsibilities' => 'Operate rescue vehicles safely and maintain vehicle readiness.'], ['name' => 'Junior Command Officer', 'urdu_name' => 'جونیئر کمانڈ آفیسر', 'code' => 'JCO', 'responsibilities' => 'Supervise field operations and ensure discipline among staff.'], ['name' => 'Senior Command Officer', 'urdu_name' => 'سینئر کمانڈ آفیسر', 'code' => 'SCO', 'responsibilities' => 'Oversee multiple rescue operations and manage team performance.'], ['name' => 'Medical Officer', 'urdu_name' => 'میڈیکل آفیسر', 'code' => 'MO', 'responsibilities' => 'Conduct medical evaluations and provide clinical guidance to EMTs.'], ['name' => 'Instructor Officer', 'urdu_name' => 'انسٹرکٹر آفیسر', 'code' => 'IO', 'responsibilities' => 'Deliver training sessions and evaluate trainee performance.'], ['name' => 'Course Training Officer', 'urdu_name' => 'کورس ٹریننگ آفیسر', 'code' => 'CTO', 'responsibilities' => 'Manage course schedules and ensure training quality.'], ['name' => 'Admin Staff', 'urdu_name' => 'انتظامی عملہ', 'code' => 'ADMIN', 'responsibilities' => 'Handle administrative and support operations.'], ['name' => 'Other', 'urdu_name' => 'دیگر', 'code' => 'OTH', 'responsibilities' => 'Perform other assigned duties as required.'],]);

    }
}
