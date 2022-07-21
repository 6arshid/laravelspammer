<?php 
namespace Database\Seeders;

use Illuminate\Database\Seeder; 
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\User; 
use Illuminate\Support\Facades\Validator;
use Helper;
use Image;

class UsersSeeder extends Seeder { 
    /** 
    * Run the database seeds. 
    * 
    * @return void */

 
   public function run() { 
     
           User::truncate(); 
           $faker = Faker::create();

            $name = $faker->hexColor();
           $users = [ 
            [ 
              'username' => 'support',
              'name' => 'Support',
              'family' => 'Center',
              'email' => "support@last.today",
              'password' => "support@last.today",
              'color' => $faker->hexColor(),
              'backgroundimage' => "assets/img/pexels-mart-production-7709297-min.jpg",
              'verify' => 1,
              'is_admin' => 1,
              'avatar' => "files/avatars/icons8-support-100.png",
              'bio' => "Support Account - contact us with this account",
              'pv' => 0
            ],
            [ 
              'username' => 'demo',
              'name' => 'De',
              'family' => 'Mo',
              'email' => "demo@last.today",
              'password' => "demo@last.today",
              'color' => $faker->hexColor(),
              'backgroundimage' => 'assets/img/shop/digiday.jpeg',
              'verify' => 0,
              'is_admin' => null,
              'avatar' => "files/avatars/Multiavatar-627e908c5c9fc.png",
              'bio' => "Hi ,Im LT demo account you can login with this username and password demo@last.today",
              'pv' => 0
            ],
            [ 
              'username' => 'anonymoususer',
              'name' => 'Anonymous',
              'family' => 'User',
              'email' => "nashenas@x.com",
              'password' => "nashenas@x.com",
              'color' => $faker->hexColor(),
              'backgroundimage' => 'assets/img/shop/security-6901712__340.jpeg',
              'verify' => 1,
              'is_admin' => null,
              'avatar' => "files/avatars/Multiavatar-627e908ed71a0.png",
              'bio' => "This is an anonymous user who sends messages to non-member users.",
              'pv' => 0
            ],
            [ 
              'username' => 'farshid',
              'name' => 'Farshid',
              'family' => 'Mahmoudi',
              'email' => 'farshidm917@gmail.com',
              'password' => 'LT!01',
              'color' => $faker->hexColor(),
              'backgroundimage' => 'files/backgroundimages/629a60dd24ce1diego-ph-BCuxVP5WEsU-unsplash-min.jpg',
              'verify' => 1,
              'is_admin' => 1,
              'avatar' => "files/avatars/photo_2022-06-02_20-54-04.jpg",
              'bio' => 'Let us, with good work for ourselves and those around us, turn love on earth and in the sky, Hallelujah.',
              'pv' => 1
            ],
            [ 
              'username' => 'amin',
              'name' => 'Amin',
              'family' => 'Khadivar',
              'email' => 'amin.khadivar@gmail.com',
              'password' => 'amin.khadivar@gmail.com',
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 1,
              'is_admin' => 0,
              'avatar' => "files/avatars/photo_2022-06-02_20-54-01.jpg",
              'bio' => null,
              'pv' => 0
            ],
            [ 
              'username' => 'mulle',
              'name' => 'Mulle',
              'family' => 'Saadi',
              'email' => 'buffalofood@yahoo.com',
              'password' => 'Mulle2513',
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 1,
              'is_admin' => 0,
              'avatar' => "files/avatars/photo_2022-06-02_20-53-58.jpg",
              'bio' => null,
              'pv' => 0
            ],
            [ 
              'username' => 'arash',
              'name' => 'Arash',
              'family' => null,
              'email' => 'arash98.mail@gmail.com',
              'password' => 'arash98.mail@gmail.com',
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'is_admin' => 0,
              'verify' => 1,
              'avatar' => "files/avatars/photo_2022-06-02_20-53-55.jpg",
              'bio' => null,
              'pv' => 0

            ],
            [ 
              'username' => 'love_sweetie_rose',
              'name' => "💖Julia💖",
              'family' => null,
              'email' => $faker->name()."@email.com",
              'password' => uniqid(),
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 0,
              'is_admin' => null,
              'avatar' => "files/avatars/Multiavatar-6d0fcfce3f28df9bd1.png",
              'bio' => null,
              'pv' => 0
            ],
            [ 
              'username' => 'misscovermahon',
              'name' => null,
              'family' => null,
              'email' => $faker->name()."@email.com",
              'password' => uniqid(),
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 0,
              'is_admin' => null,
              'avatar' => "files/avatars/Multiavatar-660e1d8784d4017c95.png",
              'bio' => null,
              'pv' => 0
            ],
            [ 
              'username' => 'traetupoliza',
              'name' => "Traetupóliza",
              'family' => null,
              'email' => $faker->name()."@email.com",
              'password' => uniqid(),
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 0,
              'is_admin' => null,
              'avatar' => "files/avatars/Multiavatar-43008b178ef6ce45a1.png",
              'bio' => null,
              'pv' => 0
            ],
            [ 

              'username' => 'mayrreeeeee_',
              'name' => "🇺 🇲 🇦 🇮 🇷",
              'family' => null,
              'email' => $faker->name()."@email.com",
              'password' => uniqid(),
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 0,
              'is_admin' => null,
              'avatar' => "files/avatars/Multiavatar-306034419231849644.png",
              'bio' => null,
              'pv' => 0
            ],
            [ 
              'username' => 'shybin_joe',
              'name' => null,
              'family' => null,
              'email' => $faker->name()."@email.com",
              'password' => uniqid(),
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 0,
              'is_admin' => null,
              'avatar' => "files/avatars/Multiavatar-fb1edbcb104a8df353.png",
              'bio' => null,
              'pv' => 0
            ],
            [ 
              'username' => 'storczyk94',
              'name' => "🌻Kinga Zając🌻",
              'family' => null,
              'email' => "storczyk94@last.today",
              'password' => "storczyk94@last.today",
              'color' => $faker->hexColor(),
              'backgroundimage' => 'assets/img/shop/digiday.jpeg',
              'verify' => 0,
              'is_admin' => null,
              'avatar' => "files/avatars/Multiavatar-627e908c5c9fc.png",
              'bio' => "Hi ,Im LT demo account you can login with this username and password demo@last.today",
              'pv' => 0
            ],
            [ 
              'username' => 'claste88',
              'name' => 'Stefania',
              'family' => null,
              'email' => "claste88@x.com",
              'password' => "nashenas@x.com",
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 0,
              'is_admin' => null,
              'avatar' => "files/avatars/Multiavatar-627e908ed71a0.png",
              'bio' => "This is an anonymous user who sends messages to non-member users.",
              'pv' => 0
            ],
            [ 
              'username' => 'cyber_thulika',
              'name' => 'സൈബർ',
              'family' => 'തൂലിക',
              'email' => 'cyber_thulika@gmail.com',
              'password' => 'LT!01',
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 0,
              'is_admin' => 0,
              'avatar' => "files/avatars/Multiavatar-627e909194a96.png",
              'bio' => null,
              'pv' => 1
            ],
            [ 
              'username' => 'predam_za_teba',
              'name' => 'Predám',
              'family' => 'Zateba',
              'email' => 'predam_za_teba@gmail.com',
              'password' => 'amin.khadivar@gmail.com',
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 0,
              'is_admin' => 0,
              'avatar' => "files/avatars/Multiavatar-627e90943724f.png",
              'bio' => null,
              'pv' => 0
            ],
            [ 
              'username' => 'by_cheetah',
              'name' => null,
              'family' => null,
              'email' => 'by_cheetah@yahoo.com',
              'password' => 'buffalofood@yahoo.com',
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 0,
              'is_admin' => 0,
              'avatar' => "files/avatars/Multiavatar-627e909701c71.png",
              'bio' => null,
              'pv' => 0
            ],
            [ 
              'username' => 'findurcrush_lbk',
              'name' => null,
              'family' => null,
              'email' => 'findurcrush_lbk@gmail.com',
              'password' => 'armo@gmail.com',
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'is_admin' => 0,
              'verify' => 0,
              'avatar' => "files/avatars/Multiavatar-627e9099df534.png",
              'bio' => null,
              'pv' => 0

            ],
            [ 
              'username' => 'allfkoff',
              'name' => null,
              'family' => null,
              'email' => "allfkoff@email.com",
              'password' => "test@email.com",
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 0,
              'is_admin' => null,
              'avatar' => "files/avatars/Multiavatar-0fe0a6d0da3faac3c6.png",
              'bio' => null,
              'pv' => 0

            ],
            [ 
              'username' => 'prakritipathak1',
              'name' => null,
              'family' => null,
              'email' => $faker->name()."@email.com",
              'password' => uniqid(),
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 0,
              'is_admin' => null,
              'avatar' => "files/avatars/Multiavatar-6d0fcfce3f28df9bd1.png",
              'bio' => null,
              'pv' => 0
            ],
            [ 
              'username' => 'benbasculente',
              'name' => null,
              'family' => null,
              'email' => $faker->name()."@email.com",
              'password' => uniqid(),
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 0,
              'is_admin' => null,
              'avatar' => "files/avatars/Multiavatar-660e1d8784d4017c95.png",
              'bio' => null,
              'pv' => 0
            ],
            [ 
              'username' => 'benbasculente',
              'name' => null,
              'family' => null,
              'email' => $faker->name()."@email.com",
              'password' => uniqid(),
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 0,
              'is_admin' => null,
              'avatar' => "files/avatars/Multiavatar-43008b178ef6ce45a1.png",
              'bio' => null,
              'pv' => 0
            ],
            [ 

              'username' => '_posti_nel_mondo',
              'name' => null,
              'family' => null,
              'email' => $faker->name()."@email.com",
              'password' => uniqid(),
              'color' => $faker->hexColor(),
              'backgroundimage' => null,
              'verify' => 0,
              'is_admin' => null,
              'avatar' => "files/avatars/Multiavatar-306034419231849644.png",
              'bio' => null,
              'pv' => 0
            ],
         
            
          ];
    
          foreach($users as $user)
          {
            $string = str_replace(' ', '_', $user['username']); // Replaces all spaces with hyphens.

            $username =  preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
            
              User::create([
               'username' =>  $username,
               'name' => $user['name'],
               'family' => $user['family'],
               'email' => $user['email'],
               'avatar' => $user['avatar'],
               'color' => $user['color'],
               'backgroundimage' => $user['backgroundimage'],
               'verify' => $user['verify'],
               'is_admin' => $user['is_admin'],
               'bio' => $user['bio'],
               'pv' => $user['pv'],
               'password' => Hash::make($user['password'])
             ]);
           }

    }
}