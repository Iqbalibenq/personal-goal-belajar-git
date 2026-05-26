<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin Utama
        User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Insert Kategori Event (Tugas Mandiri: Minimal 3 Kategori)
        $catSeminar = Category::create([
            'name' => 'Seminar IT',
            'slug' => 'seminar-it',
        ]);

        $catEntertainment = Category::create([
            'name' => 'Entertainment',
            'slug' => 'entertainment',
        ]);

        $catWorkshop = Category::create([
            'name' => 'Workshop Design',
            'slug' => 'workshop-design',
        ]);


        // 3. Insert Sampel Events (Tugas Mandiri: Minimal 6 Jenis Event Acak)
        
        // Event 1 (Entertainment)
        Event::create([
            'category_id' => $catEntertainment->id,
            'title' => 'Jazz Night 2025',
            'description' => 'Nikmati malam yang indah dengan alunan musik jazz yang merdu.',
            'date' => '2026-05-10 19:00:00',
            'location' => 'Amikom Baru',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-1.png',
        ]);

        // Event 2 (Seminar IT)
        Event::create([
            'category_id' => $catSeminar->id,
            'title' => 'Hackathon - Unleash Your Inner Developer',
            'description' => 'Ayo asah skill coding kamu dan ciptakan solusi inovatif untuk tantangan masa depan!',
            'date' => '2026-05-05 10:00:00',
            'location' => 'Inkubator Amikom',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-2.png',
        ]);

        // Event 3 (Seminar IT)
        Event::create([
            'category_id' => $catSeminar->id,
            'title' => 'AI & FUTURE TECH SUMMIT 2026',
            'description' => 'Jelajahi tren terkini dalam kecerdasan buatan dan teknologi masa depan bersama para ahli di bidangnya.',
            'date' => '2026-06-01 13:00:00',
            'location' => 'Cinema Unit 5',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-3.png',
        ]);

        // Event 4 (Workshop Design - Tambahan Tugas Mandiri)
        Event::create([
            'category_id' => $catWorkshop->id,
            'title' => 'UI/UX Masterclass: From Zero to Hero',
            'description' => 'Belajar mendesain antarmuka aplikasi yang intuitif langsung dari pakar industri senior.',
            'date' => '2026-06-15 09:00:00',
            'location' => 'Lab Komputer 4',
            'price' => 75000,
            'stock' => 50,
            'poster_path' => 'posters/event-4.png',
        ]);

        // Event 5 (Entertainment - Tambahan Tugas Mandiri)
        Event::create([
            'category_id' => $catEntertainment->id,
            'title' => 'E-Sport Amikom Championship',
            'description' => 'Turnamen bergengsi Mobile Legends antar mahasiswa Universitas Amikom Yogyakarta.',
            'date' => '2026-07-20 10:00:00',
            'location' => 'Basement Gedung 5',
            'price' => 25000,
            'stock' => 200,
            'poster_path' => 'posters/event-5.png',
        ]);

        // Event 6 (Workshop Design - Tambahan Tugas Mandiri)
        Event::create([
            'category_id' => $catWorkshop->id,
            'title' => '3D Animation Workshop with Blender',
            'description' => 'Eksplorasi pembuatan karakter 3D dasar untuk kebutuhan animasi dan game development.',
            'date' => '2026-08-05 13:00:00',
            'location' => 'Lab Animasi Gedung 3',
            'price' => 60000,
            'stock' => 40,
            'poster_path' => 'posters/event-6.png',
        ]);
    }
}