<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('category')->upsert([
            ["id" => "1","name" => "News","desc" => 'Berita'],
            ["id" => "2","name" => "Olah Raga","desc" => 'Berita Olah Raga'],
            ["id" => "3","name" => "Kesehatan","desc" => 'Berita Kesehatan'],
            ["id" => "4","name" => "Bencana","desc" => 'Berita Bencana'],
            ["id" => "5","name" => "Politik","desc" => 'Berita Politik'],
        ], "id");

        DB::table('tag')->upsert([
            ["id" => "1","name" => "Solo","desc" => 'Berita di Solo'],
            ["id" => "2","name" => "Jawa Tengah","desc" => 'Berita di Jawa Tengah'],
            ["id" => "3","name" => "UNS","desc" => 'Berita di UNS'],
            ["id" => "4","name" => "Solopos","desc" => 'Berita Solopos'],
            ["id" => "5","name" => "Banjir","desc" => 'Berita Banjir'],
        ], "id");

        DB::table('users')->upsert([
            ["id" => "1","name" => "userauthor1","email" => 'userauthor1@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'$2y$10$Ld0ABT9K8Z4LBrBmrMwYl.vt8zPF1H9ntVhRciFbUSCyFJZWt9Xhu','remember_token'=>'null','created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'1'],
            ["id" => "2","name" => "userauthor2","email" => 'userauthor2@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'$2y$10$Ld0ABT9K8Z4LBrBmrMwYl.vt8zPF1H9ntVhRciFbUSCyFJZWt9Xhu','remember_token'=>'null','created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'1'],
            ["id" => "3","name" => "usereditor1","email" => 'usereditor1@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'$2y$10$YuJ1VAHT7M82fGsh12QVsuOKK9FpDan/hlZMX9COtqFrUYVQkB0zS','remember_token'=>'null','created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'2'],
            ["id" => "4","name" => "usereditor2","email" => 'usereditor2@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'$2y$10$YuJ1VAHT7M82fGsh12QVsuOKK9FpDan/hlZMX9COtqFrUYVQkB0zS','remember_token'=>'null','created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'2'],
            ["id" => "5","name" => "useradmin1","email" => 'useradmin1@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'$2y$10$KE/r8e/tU2chf5SfYO58fO0NGIag7DMIBSydxJ2Uc.9/TwqwsvboG','remember_token'=>'null','created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'3'],
            ["id" => "6","name" => "useradmin2","email" => 'useradmin2@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'$2y$10$KE/r8e/tU2chf5SfYO58fO0NGIag7DMIBSydxJ2Uc.9/TwqwsvboG','remember_token'=>'null','created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'3'],
        ], "id");

        DB::table('post')->upsert([
            ["id" => "1","title" => "Berita Author 1","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '1'],
            ["id" => "2","title" => "Berita Author 2","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '2'],
            ["id" => "3","title" => "Berita Editor 1","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '3'],
            ["id" => "4","title" => "Berita Editor 2","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '4'],
            ["id" => "5","title" => "Berita Admin 1","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '5'],
            ["id" => "6","title" => "Berita Admin 2","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '6'],
        ], "id");


    }
}
