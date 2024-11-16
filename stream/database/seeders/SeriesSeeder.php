<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Series;

class SeriesSeeder extends Seeder
{
    public function run()
    {
        $series = [
            ['title' => 'Breaking Bad', 'descriptions' => 'A high school chemistry teacher turned methamphetamine manufacturer partners with a former student.', 'release_date' => '2008-01-20', 'rate' => 4.9, 'thumbnail_url' => 'https://example.com/breakingbad.jpg', 'total_seasons' => 5],

            ['title' => 'Stranger Things', 'descriptions' => 'A group of kids in a small town uncover a series of supernatural mysteries and government conspiracies.', 'release_date' => '2016-07-15', 'rate' => 4.7, 'thumbnail_url' => 'https://example.com/strangerthings.jpg', 'total_seasons' => 4],

            ['title' => 'Game of Thrones', 'descriptions' => 'Noble families vie for control of the Iron Throne in the Seven Kingdoms of Westeros.', 'release_date' => '2011-04-17', 'rate' => 4.8, 'thumbnail_url' => 'https://example.com/gameofthrones.jpg', 'total_seasons' => 8],

            ['title' => 'The Crown', 'descriptions' => 'The story of Queen Elizabeth II\'s reign and the events that shaped the second half of the 20th century.', 'release_date' => '2016-11-04', 'rate' => 4.7, 'thumbnail_url' => 'https://example.com/thecrown.jpg', 'total_seasons' => 5],

            ['title' => 'The Witcher', 'descriptions' => 'Geralt of Rivia, a monster hunter, navigates a world where humans can be more wicked than beasts.', 'release_date' => '2019-12-20', 'rate' => 4.5, 'thumbnail_url' => 'https://example.com/thewitcher.jpg', 'total_seasons' => 2],

            ['title' => 'The Office', 'descriptions' => 'A mockumentary on a group of typical office workers, where the workday consists of ego clashes, inappropriate behavior, and tedium.', 'release_date' => '2005-03-24', 'rate' => 4.8, 'thumbnail_url' => 'https://example.com/theoffice.jpg', 'total_seasons' => 9],

            ['title' => 'Friends', 'descriptions' => 'Six friends navigate life and love in New York City.', 'release_date' => '1994-09-22', 'rate' => 4.8, 'thumbnail_url' => 'https://example.com/friends.jpg', 'total_seasons' => 10],

            ['title' => 'The Mandalorian', 'descriptions' => 'A lone bounty hunter makes his way through the outer reaches of the galaxy.', 'release_date' => '2019-11-12', 'rate' => 4.6, 'thumbnail_url' => 'https://example.com/mandalorian.jpg', 'total_seasons' => 3],

            ['title' => 'The Boys', 'descriptions' => 'A group of vigilantes set out to take down corrupt superheroes who abuse their powers.', 'release_date' => '2019-07-26', 'rate' => 4.7, 'thumbnail_url' => 'https://example.com/theboys.jpg', 'total_seasons' => 3],

            ['title' => 'Ozark', 'descriptions' => 'A financial planner relocates his family to the Ozarks after a money-laundering scheme goes wrong.', 'release_date' => '2017-07-21', 'rate' => 4.5, 'thumbnail_url' => 'https://example.com/ozark.jpg', 'total_seasons' => 4],

            ['title' => 'The Handmaid\'s Tale', 'descriptions' => 'In a dystopian future, a woman is forced into child-bearing servitude as a Handmaid.', 'release_date' => '2017-04-26', 'rate' => 4.6, 'thumbnail_url' => 'https://example.com/handmaidstale.jpg', 'total_seasons' => 5],

            ['title' => 'Better Call Saul', 'descriptions' => 'The prequel to Breaking Bad, focusing on the evolution of small-time lawyer Jimmy McGill into the morally challenged Saul Goodman.', 'release_date' => '2015-02-08', 'rate' => 4.7, 'thumbnail_url' => 'https://example.com/bettercallsaul.jpg', 'total_seasons' => 6],

            ['title' => 'Sherlock', 'descriptions' => 'A modern update to the classic British detective tales of Sherlock Holmes and Dr. John Watson.', 'release_date' => '2010-07-25', 'rate' => 4.8, 'thumbnail_url' => 'https://example.com/sherlock.jpg', 'total_seasons' => 4],

            ['title' => 'The Umbrella Academy', 'descriptions' => 'A dysfunctional family of adopted sibling superheroes reunite to solve the mystery of their father\'s death.', 'release_date' => '2019-02-15', 'rate' => 4.5, 'thumbnail_url' => 'https://example.com/umbrellaacademy.jpg', 'total_seasons' => 3],

            ['title' => 'Narcos', 'descriptions' => 'The true-life story of the growth and spread of cocaine drug cartels across the globe and attendant efforts of law enforcement.', 'release_date' => '2015-08-28', 'rate' => 4.8, 'thumbnail_url' => 'https://example.com/narcos.jpg', 'total_seasons' => 3],

            ['title' => 'Fargo', 'descriptions' => 'Various chronicles of deception, intrigue, and murder in and around frozen Minnesota.', 'release_date' => '2014-04-15', 'rate' => 4.7, 'thumbnail_url' => 'https://example.com/fargo.jpg', 'total_seasons' => 4],

            ['title' => 'The Marvelous Mrs. Maisel', 'descriptions' => 'A housewife in the 1950s discovers she has a knack for stand-up comedy and pursues a career in it.', 'release_date' => '2017-03-17', 'rate' => 4.8, 'thumbnail_url' => 'https://example.com/mrsmaisel.jpg', 'total_seasons' => 4],

            ['title' => 'Westworld', 'descriptions' => 'In a futuristic amusement park, guests interact with lifelike robots in a Wild West setting.', 'release_date' => '2016-10-02', 'rate' => 4.5, 'thumbnail_url' => 'https://example.com/westworld.jpg', 'total_seasons' => 4],

            ['title' => 'The Good Place', 'descriptions' => 'A woman finds herself in the afterlife\'s Good Place, only to realize she doesn\'t belong there.', 'release_date' => '2016-09-19', 'rate' => 4.7, 'thumbnail_url' => 'https://example.com/goodplace.jpg', 'total_seasons' => 4],

            ['title' => 'Money Heist', 'descriptions' => 'A criminal mastermind plans the biggest heist in recorded history, aiming to print billions of euros in the Royal Mint of Spain.', 'release_date' => '2017-05-02', 'rate' => 4.6, 'thumbnail_url' => 'https://example.com/moneyheist.jpg', 'total_seasons' => 5]

        ];

        foreach ($series as $serie) {
            Series::create($serie);
        }
    }
}
