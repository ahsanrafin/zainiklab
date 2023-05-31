<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'              => 'Firoj Ahmed',
            'role_id'           => 2,
            'about_me'          => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsa, molestias corporis hic tenetur consequuntur quisquam odit eum, sit velit praesentium blanditiis quidem voluptates. Possimus laboriosam mollitia saepe modi ex.',
            'avatar'            => 'firoj.jpg',
            'email'             => 'firoj@gmail.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
        ]);
        User::create([
            'name'              => 'Rakib Ahmed',
            'role_id'           => 2,
            'about_me'          => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsa, molestias corporis hic tenetur consequuntur quisquam odit eum, sit velit praesentium blanditiis quidem voluptates. Possimus laboriosam mollitia saepe modi ex.',
            'avatar'            => 'rakib.jpg',
            'email'             => 'rakib@gmail.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
        ]);
        User::create([
            'name'              => 'Tamim',
            'role_id'           => 2,
            'about_me'          => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit in inventore, expedita debitis magni laboriosam dolorum maiores eveniet, aut facilis quidem soluta! Ut eveniet doloremque debitis possimus, rerum quia ipsum!',
            'avatar'            => 'tamim.jpg',
            'email'             => 'tamim@gmail.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
        ]);
        User::create([
            'name'              => 'Rabby',
            'role_id'           => 2,
            'about_me'          => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis mollitia delectus soluta quae vel tempora labore ea optio, commodi sequi modi praesentium deleniti. Eveniet quisquam accusantium minus ad perferendis architecto.',
            'avatar'            => 'rabby.jpg',
            'email'             => 'rabbi@gmail.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
        ]);
        User::create([
            'name'              => 'Akash',
            'role_id'           => 2,
            'about_me'          => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat quam ipsum magni eius ea repellendus, repellat, inventore repudiandae accusamus, molestiae voluptate possimus explicabo nisi. Aspernatur qui libero aliquid assumenda quam.',
            'avatar'            => 'akash.jpg',
            'email'             => 'akash@gmail.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
        ]);
        User::create([
            'name'              => 'Sadek',
            'role_id'           => 2,
            'about_me'          => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam nulla vero incidunt, ipsam explicabo illum ullam officia repudiandae quas dolorem optio excepturi maxime molestiae nihil voluptates asperiores iste saepe voluptatem!',
            'avatar'            => 'sadek.jpg',
            'email'             => 'sadek@gmail.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
        ]);
    }
}
