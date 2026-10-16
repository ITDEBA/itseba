<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\Project;
use App\Models\Post;
use App\Models\Client;
use App\Models\Staff;
use App\Models\Notice;
use App\Models\Contact;
use App\Models\User;

class ExampleSeeder extends Seeder
{
    public function run()
    {
        // Create admin user (password: password)
        if (class_exists(User::class)) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@itseba.org',
                'password' => bcrypt('password'),
            ]);
        }

        Service::create([
            'title' => 'Web Development',
            'slug' => 'web-development',
            'excerpt' => 'Modern web development services using Laravel and Vue/React.',
            'description' => 'Full stack web development',
            'is_active' => true,
        ]);

        Project::create([
            'title' => 'ITSEBA Website',
            'slug' => 'itseba-website',
            'client' => 'ITSEBA',
            'excerpt' => 'Official website for ITSEBA.',
            'description' => 'This project is the ITSEBA website.',
            'is_published' => true,
        ]);

        Post::create([
            'title' => 'Welcome to ITSEBA',
            'slug' => 'welcome-to-itseba',
            'excerpt' => 'First blog post.',
            'content' => 'This is a sample post created by the seeder.',
            'is_published' => true,
            'published_at' => now(),
        ]);

        Client::create(['name' => 'Example Client']);
        Staff::create(['name' => 'John Doe','designation'=>'Developer']);
        Notice::create(['title'=>'Welcome','body'=>'Site launched','is_active'=>true]);
        Contact::create(['name'=>'Visitor','email'=>'visitor@example.com','message'=>'Hello']);
    }
}
