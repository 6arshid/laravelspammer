<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feed;

class FeedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feed::truncate(); 
        $feeds = [
            [
                'feed_title' => 'BBC News » World RSS Feed',
                'feed_url' => 'http://feeds.bbci.co.uk/news/world/rss.xml',
                'feed_category' => 'world',
                'feed_user_id' => 3,
                'feed_lang' => 'en'
            ],
            [
                'feed_title' => 'BBC News » technology RSS Feed',
                'feed_url' => 'https://feeds.bbci.co.uk/news/technology/rss.xml',
                'feed_category' => 'technology',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'BBC News » uk Rss Feed',
                'feed_url' => 'https://feeds.bbci.co.uk/news/uk/rss.xml',
                'feed_category' => 'uk',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'BBC News » science_and_environment rss Feed',
                'feed_url' => 'https://feeds.bbci.co.uk/news/science_and_environment/rss.xml',
                'feed_category' => 'science and environment',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'BBC News » entertainment_and_arts rss Feed',
                'feed_url' => 'https://feeds.bbci.co.uk/news/entertainment_and_arts/rss.xml',
                'feed_category' => 'entertainment and arts',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'BBC News » health rss Feed',
                'feed_url' => 'https://feeds.bbci.co.uk/news/health/rss.xml',
                'feed_category' => 'health',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'BBC News » in_pictures rss Feed',
                'feed_url' => 'https://feeds.bbci.co.uk/news/in_pictures/rss.xml',
                'feed_category' => 'in pictures',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'digitaltrends - movies',
                'feed_url' => 'https://www.digitaltrends.com/movies/feed/',
                'feed_category' => 'movies',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'digitaltrends - social-media',
                'feed_url' => 'https://www.digitaltrends.com/social-media/feed/',
                'feed_category' => 'social_media',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'digitaltrends - mobile',
                'feed_url' => 'https://www.digitaltrends.com/mobile/feed/',
                'feed_category' => 'mobile',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'digitaltrends - space',
                'feed_url' => 'https://www.digitaltrends.com/space/feed/',
                'feed_category' => 'space',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'digitaltrends - home',
                'feed_url' => 'https://www.digitaltrends.com/s/h/feed/',
                'feed_category' => 'home',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'digitaltrends - computing',
                'feed_url' => 'https://www.digitaltrends.com/computing/feed/',
                'feed_category' => 'computing',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'digitaltrends - gaming',
                'feed_url' => 'https://www.digitaltrends.com/gaming/feed/',
                'feed_category' => 'gaming',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'digitaltrends - home-theater',
                'feed_url' => 'https://www.digitaltrends.com/home-theater/feed/',
                'feed_category' => 'home_theater',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'digitaltrends - cars',
                'feed_url' => 'https://www.digitaltrends.com/cars/feed/',
                'feed_category' => 'cars',
                'feed_user_id' => 3,
                'feed_lang' => 'en'

            ],
            [
                'feed_title' => 'uptv - movie',
                'feed_url' => 'https://uptv.com/feed/',
                'feed_category' => 'movie',
                'feed_user_id' => 3,
                'feed_lang' => 'en'
            ],
            [
                'feed_title' => 'lwlies - movie',
                'feed_url' => 'https://lwlies.com/feed/',
                'feed_category' => 'movie',
                'feed_user_id' => 3,
                'feed_lang' => 'en'
            ],
            [
                'feed_title' => 'screenrant',
                'feed_url' => 'https://screenrant.com/feed/',
                'feed_category' => 'movie',
                'feed_user_id' => 3,
                'feed_lang' => 'en'
            ],
            [
                'feed_title' => 'comingsoon',
                'feed_url' => 'http://www.comingsoon.net/news/rss-main-30.php',
                'feed_category' => 'movie',
                'feed_user_id' => 3,
                'feed_lang' => 'en'
            ],
            [
                'feed_title' => 'rogerebert',
                'feed_url' => 'https://www.rogerebert.com/feed',
                'feed_category' => 'movie',
                'feed_user_id' => 3,
                'feed_lang' => 'en'
            ],
            [
                'feed_title' => 'screencrush',
                'feed_url' => 'https://screencrush.com/feed/',
                'feed_category' => 'movie',
                'feed_user_id' => 3,
                'feed_lang' => 'en'
            ],
            [
                'feed_title' => 'cinemablend',
                'feed_url' => 'https://www.cinemablend.com/reviews/',
                'feed_category' => 'Movie Review',
                'feed_user_id' => 3,
                'feed_lang' => 'en'
            ],
            [
                'feed_title' => 'sbs',
                'feed_url' => 'https://www.sbs.com.au/movies/rss',
                'feed_category' => 'Movie Review',
                'feed_user_id' => 3,
                'feed_lang' => 'en'
            ]
           
        ];
        foreach($feeds as $feed)
        {
            Feed::create([
                'feed_title' => $feed['feed_title'],
                'feed_url' => $feed['feed_url'],
                'feed_category' => $feed['feed_category'],
                'feed_user_id' => $feed['feed_user_id'],
                'feed_lang' => $feed['feed_lang']

           ]);
         }
    }
}
