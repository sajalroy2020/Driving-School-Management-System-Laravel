<?php

namespace Database\Seeders;

use App\Models\FrontendSetting;
use App\Models\SectionConfiguration;
use Illuminate\Database\Seeder;

class FrontendSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SectionConfiguration::insert([
            ['slug' => 'hero section', 'section_name' => 'Hero Area', 'title' => 'Learn our Driving course', 'description' => 'Lorem ipsum is a placeholder text commonly used to  demonstrate the visual form of a document or a typeface lorem ipsum dolor  on meaningful content. Lorem ipsum may be used as a placeholder before  without relying  on meaningful content  without meaningful content  without relying  on meaningful content', 'background_image' => NULL, 'is_section_show' => 1, 'tenant_id' => DEFAULT_TENANT_ID_ADMIN, 'created_at' => now(), 'updated_at' => now()],
            ['slug' => 'about us', 'section_name' => 'About us', 'title' => 'We’re an Experienced a driving School You Can  Rely On', 'description' => 'Lorem ipsum is a placeholder text commonly used to  demonstrate the visual form of a document or a typeface without relying  on meaningful content. Lorem ipsum may be used as a placeholder before', 'background_image' => NULL, 'is_section_show' => 1, 'tenant_id' => DEFAULT_TENANT_ID_ADMIN, 'created_at' => now(), 'updated_at' => now()],
            ['slug' => 'achievement', 'section_name' => 'Achievement', 'title' => NULL, 'description' => NULL, 'background_image' => NULL, 'is_section_show' => 1, 'tenant_id' => DEFAULT_TENANT_ID_ADMIN, 'created_at' => now(), 'updated_at' => now()],
            ['slug' => 'our courses', 'section_name' => 'Our Course', 'title' => 'Our Popular Courses', 'description' => 'Lorem ipsum is a placeholder text commonly used to  demonstrate the visual form of a document or a typeface without relying  on meaningful content. Lorem ipsum may be used as a placeholder before', 'background_image' => NULL, 'is_section_show' => 1, 'tenant_id' => DEFAULT_TENANT_ID_ADMIN, 'created_at' => now(), 'updated_at' => now()],
            ['slug' => 'our gallery', 'section_name' => 'Our Gallery', 'title' => 'See Our Photos And Enjoying Time', 'description' => 'Lorem ipsum is a placeholder text commonly used to  demonstrate the visual form of a document or a typeface without relying  on meaningful content. Lorem ipsum may be used as a placeholder before', 'background_image' => NULL, 'is_section_show' => 1, 'tenant_id' => DEFAULT_TENANT_ID_ADMIN, 'created_at' => now(), 'updated_at' => now()],
            ['slug' => 'our instructor', 'section_name' => 'Our Instructor', 'title' => 'Our Expeart Instructor', 'description' => 'Lorem ipsum is a placeholder text commonly used to  demonstrate the visual form of a document or a typeface without relying  on meaningful content. Lorem ipsum may be used as a placeholder before', 'background_image' => NULL, 'is_section_show' => 1, 'tenant_id' => DEFAULT_TENANT_ID_ADMIN, 'created_at' => now(), 'updated_at' => now()],
            ['slug' => 'faq', 'section_name' => 'FAQ’s', 'title' => 'FAQ’s', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'background_image' => NULL, 'is_section_show' => 1, 'tenant_id' => DEFAULT_TENANT_ID_ADMIN, 'created_at' => now(), 'updated_at' => now()],
            ['slug' => 'testimonials', 'section_name' => 'Testimonials', 'title' => 'See What Our Clients Have To Say', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'background_image' => NULL, 'is_section_show' => 1, 'tenant_id' => DEFAULT_TENANT_ID_ADMIN, 'created_at' => now(), 'updated_at' => now()],
            ['slug' => 'contact us', 'section_name' => 'Contact Us', 'title' => 'Needs Help? Let’s Get In Touch', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'background_image' => NULL, 'is_section_show' => 1, 'tenant_id' => DEFAULT_TENANT_ID_ADMIN, 'created_at' => now(), 'updated_at' => now()],
        ]);

        FrontendSetting::insert([
            ['about_point_1' => 'Driving classes are conducted in a beautiful and polite manner', 'about_point_2' => '12 years of expertise for driver safety experience', 'about_point_3' => 'Courses are developed by professional driving instructors', 'about_learn_more' => 'Long Description', 'about_year_of_exp' => '12', 'about_right_image' => NULL, 'about_video_link' => 'https://youtu.be/VIVaqt4VhKc?si=ULC7LLx76zJYE0-r', 'achiev_course_completed' => '15', 'achiev_driving_learner' => '130', 'achiev_experience_instructor' => '50', 'achiev_award_winner' => '40', 'tenant_id' => DEFAULT_TENANT_ID_ADMIN, 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
