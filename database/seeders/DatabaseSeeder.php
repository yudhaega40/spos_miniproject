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
            ["id" => "6","name" => "Sembako","desc" => 'Berita'],
            ["id" => "7","name" => "Bako","desc" => 'Berita'],
            ["id" => "8","name" => "Mbako","desc" => 'Berita'],
            ["id" => "9","name" => "Ako","desc" => 'Berita'],
            ["id" => "10","name" => "Emba","desc" => 'Berita'],
            ["id" => "11","name" => "Tag","desc" => 'Berita'],
            ["id" => "12","name" => "yoasobi","desc" => 'Berita'],
            ["id" => "13","name" => "misuta","desc" => 'Berita'],
            ["id" => "14","name" => "tabun","desc" => 'Berita'],
            ["id" => "15","name" => "haruka","desc" => 'Berita'],
            ["id" => "16","name" => "encore","desc" => 'Berita'],
            ["id" => "17","name" => "jaret","desc" => 'Berita'],
            ["id" => "18","name" => "Jawa Barat","desc" => 'Berita Jawa Barat'],
            ["id" => "19","name" => "Jawa Timur","desc" => 'Berita Jawa Timur'],
            ["id" => "20","name" => "Jama","desc" => 'Berita Jama'],
        ], "id");

        DB::table('tag')->upsert([
            ["id" => "1","name" => "Solo","desc" => 'Berita di Solo'],
            ["id" => "2","name" => "Jawa Tengah","desc" => 'Berita di Jawa Tengah'],
            ["id" => "3","name" => "UNS","desc" => 'Berita di UNS'],
            ["id" => "4","name" => "Solopos","desc" => 'Berita Solopos'],
            ["id" => "5","name" => "Banjir","desc" => 'Berita Banjir'],
            ["id" => "6","name" => "Sembako","desc" => 'Berita'],
            ["id" => "7","name" => "Bako","desc" => 'Berita'],
            ["id" => "8","name" => "Mbako","desc" => 'Berita'],
            ["id" => "9","name" => "Ako","desc" => 'Berita'],
            ["id" => "10","name" => "Emba","desc" => 'Berita'],
            ["id" => "11","name" => "Tag","desc" => 'Berita'],
            ["id" => "12","name" => "yoasobi","desc" => 'Berita'],
            ["id" => "13","name" => "misuta","desc" => 'Berita'],
            ["id" => "14","name" => "tabun","desc" => 'Berita'],
            ["id" => "15","name" => "haruka","desc" => 'Berita'],
            ["id" => "16","name" => "encore","desc" => 'Berita'],
            ["id" => "17","name" => "jaret","desc" => 'Berita'],
            ["id" => "18","name" => "Jawa Barat","desc" => 'Berita Jawa Barat'],
            ["id" => "19","name" => "Jawa Timur","desc" => 'Berita Jawa Timur'],
            ["id" => "20","name" => "Jama","desc" => 'Berita Jama'],
        ], "id");

        DB::table('users')->upsert([
            ["id" => "1","name" => "userauthor1","email" => 'userauthor1@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'$2y$10$Ld0ABT9K8Z4LBrBmrMwYl.vt8zPF1H9ntVhRciFbUSCyFJZWt9Xhu','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'1'],
            ["id" => "2","name" => "userauthor2","email" => 'userauthor2@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'$2y$10$Ld0ABT9K8Z4LBrBmrMwYl.vt8zPF1H9ntVhRciFbUSCyFJZWt9Xhu','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'1'],
            ["id" => "3","name" => "usereditor1","email" => 'usereditor1@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'$2y$10$YuJ1VAHT7M82fGsh12QVsuOKK9FpDan/hlZMX9COtqFrUYVQkB0zS','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'2'],
            ["id" => "4","name" => "usereditor2","email" => 'usereditor2@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'$2y$10$YuJ1VAHT7M82fGsh12QVsuOKK9FpDan/hlZMX9COtqFrUYVQkB0zS','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'2'],
            ["id" => "5","name" => "useradmin1","email" => 'useradmin1@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'$2y$10$KE/r8e/tU2chf5SfYO58fO0NGIag7DMIBSydxJ2Uc.9/TwqwsvboG','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'3'],
            ["id" => "6","name" => "useradmin2","email" => 'useradmin2@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'$2y$10$KE/r8e/tU2chf5SfYO58fO0NGIag7DMIBSydxJ2Uc.9/TwqwsvboG','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'3'],
            ["id" => "7","name" => "dummy1","email" => 'dummy1@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'password','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'1'],
            ["id" => "8","name" => "dummy2","email" => 'dummy2@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'password','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'1'],
            ["id" => "9","name" => "dummy3","email" => 'dummy3@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'password','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'1'],
            ["id" => "10","name" => "dummy4","email" => 'dummy4@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'password','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'2'],
            ["id" => "11","name" => "dummy5","email" => 'dummy5@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'password','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'2'],
            ["id" => "12","name" => "dummy6","email" => 'dummy6@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'password','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'2'],
            ["id" => "13","name" => "dummy7","email" => 'dummy7@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'password','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'3'],
            ["id" => "14","name" => "dummy8","email" => 'dummy8@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'password','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'3'],
            ["id" => "15","name" => "dummy9","email" => 'dummy9@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'password','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'3'],
            ["id" => "16","name" => "dummy10","email" => 'dummy10@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'password','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'1'],
            ["id" => "17","name" => "dummy11","email" => 'dummy11@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'password','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'2'],
            ["id" => "18","name" => "dummy12","email" => 'dummy12@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'password','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'3'],
            ["id" => "19","name" => "dummy13","email" => 'dummy13@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'password','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'2'],
            ["id" => "20","name" => "dummy14","email" => 'dummy14@gmail.com','email_verified_at'=>'2023-03-02 13:45:40','password'=>'password','remember_token'=>null,'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40','role'=>'1'],
        ], "id");

        DB::table('post')->upsert([
            ["id" => "1","title" => "Berita Author 1","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '1',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:40','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "2","title" => "Berita Author 2","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '2',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:41','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "3","title" => "Berita Editor 1","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '3',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:42','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "4","title" => "Berita Editor 2","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '4',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:43','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "5","title" => "Berita Admin 1","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '5',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:44','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "6","title" => "Berita Admin 2","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '6',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:45','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "7","title" => "Berita Dummy 1","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '1',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:46','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "8","title" => "Berita Dummy 2","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '1',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:47','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "9","title" => "Berita Dummy 3","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '1',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:48','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "10","title" => "Berita Dummy 4","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '2',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:49','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "11","title" => "Berita Dummy 5","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '2',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:50','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "12","title" => "Berita Dummy 6","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '2',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:51','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "13","title" => "Berita Dummy 7","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '3',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:52','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "14","title" => "Berita Dummy 8","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '3',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:53','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "15","title" => "Berita Dummy 9","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '4',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:54','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "16","title" => "Berita Dummy 10","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '4',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:55','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "17","title" => "Berita Dummy 11","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '5',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:56','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "18","title" => "Berita Dummy 12","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '6',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:57','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "19","title" => "Berita Dummy 13","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '5',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:58','updated_at'=>'2023-03-02 13:45:40'],
            ["id" => "20","title" => "Berita Dummy 14","content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","id_user" => '6',"photo_dir"=>"foto/default.jpg",'created_at'=>'2023-03-02 13:45:59','updated_at'=>'2023-03-02 13:45:40'],
        ], "id");

        DB::table('post_category')->upsert([
            ["id" => "1","id_post" => "1","id_category" => '1'],
            ["id" => "2","id_post" => "1","id_category" => '3'],
            ["id" => "3","id_post" => "1","id_category" => '4'],
            ["id" => "4","id_post" => "2","id_category" => '10'],
            ["id" => "5","id_post" => "2","id_category" => '11'],
            ["id" => "6","id_post" => "2","id_category" => '2'],
            ["id" => "7","id_post" => "2","id_category" => '3'],
            ["id" => "8","id_post" => "3","id_category" => '4'],
            ["id" => "9","id_post" => "3","id_category" => '6'],
            ["id" => "10","id_post" => "4","id_category" => '7'],
            ["id" => "11","id_post" => "4","id_category" => '8'],
            ["id" => "12","id_post" => "4","id_category" => '3'],
            ["id" => "13","id_post" => "4","id_category" => '2'],
            ["id" => "14","id_post" => "5","id_category" => '3'],
            ["id" => "15","id_post" => "5","id_category" => '10'],
            ["id" => "16","id_post" => "5","id_category" => '11'],
            ["id" => "17","id_post" => "6","id_category" => '7'],
            ["id" => "18","id_post" => "6","id_category" => '1'],
            ["id" => "19","id_post" => "6","id_category" => '11'],
            ["id" => "20","id_post" => "6","id_category" => '6'],
        ], "id");

        DB::table('post_tag')->upsert([
            ["id" => "1","id_post" => "1","id_tag" => '1'],
            ["id" => "2","id_post" => "1","id_tag" => '3'],
            ["id" => "3","id_post" => "1","id_tag" => '4'],
            ["id" => "4","id_post" => "2","id_tag" => '10'],
            ["id" => "5","id_post" => "2","id_tag" => '11'],
            ["id" => "6","id_post" => "2","id_tag" => '2'],
            ["id" => "7","id_post" => "2","id_tag" => '3'],
            ["id" => "8","id_post" => "3","id_tag" => '4'],
            ["id" => "9","id_post" => "3","id_tag" => '6'],
            ["id" => "10","id_post" => "4","id_tag" => '7'],
            ["id" => "11","id_post" => "4","id_tag" => '8'],
            ["id" => "12","id_post" => "4","id_tag" => '3'],
            ["id" => "13","id_post" => "4","id_tag" => '2'],
            ["id" => "14","id_post" => "5","id_tag" => '3'],
            ["id" => "15","id_post" => "5","id_tag" => '10'],
            ["id" => "16","id_post" => "5","id_tag" => '11'],
            ["id" => "17","id_post" => "6","id_tag" => '7'],
            ["id" => "18","id_post" => "6","id_tag" => '1'],
            ["id" => "19","id_post" => "6","id_tag" => '11'],
            ["id" => "20","id_post" => "6","id_tag" => '6'],
        ], "id");
    }
}
