<?php

namespace Database\Seeders;

use App\Models\EmailAndNotificationTemplate;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmailAndNotificationTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmailAndNotificationTemplate::insert([
            ['type' => TEMPLATE_TYPE_EMAIL, 'name' => 'forgot-password', 'subject' => 'Forgot Password', 'body' => '<p>Your forgot password mail link:</p>', 'status' => STATUS_ACTIVE, 'tenant_id' => DEFAULT_TENANT_ID_SUPER_ADMIN, 'created_at' => now()],
        ]);
    }
}
