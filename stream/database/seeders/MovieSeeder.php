<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;


class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $movies = [
            ['title' => 'The Social Network', 'descriptions' => 'As Harvard students create the social networking site that would become known as Facebook, they must deal with both personal and legal complications.', 'release_date' => '2010-10-01', 'duration' => 120, 'rate' => 4.6, 'video_url' => 'https://example.com/socialnetwork.mp4', 'thumbnail_url' => 'https://example.com/socialnetwork.jpg'],

            ['title' => 'Interstellar', 'descriptions' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.', 'release_date' => '2014-11-07', 'duration' => 169, 'rate' => 4.7, 'video_url' => 'https://example.com/interstellar.mp4', 'thumbnail_url' => 'https://example.com/interstellar.jpg'],

            ['title' => 'Gladiator', 'descriptions' => 'A former Roman General sets out to exact vengeance against the corrupt emperor who murdered his family and sent him into slavery.', 'release_date' => '2000-05-05', 'duration' => 155, 'rate' => 4.8, 'video_url' => 'https://example.com/gladiator.mp4', 'thumbnail_url' => 'https://example.com/gladiator.jpg'],

            ['title' => 'The Lion King', 'descriptions' => 'Lion prince Simba flees his kingdom after the death of his father, but returns as an adult to reclaim his throne.', 'release_date' => '1994-06-15', 'duration' => 88, 'rate' => 4.6, 'video_url' => 'https://example.com/lionking.mp4', 'thumbnail_url' => 'https://example.com/lionking.jpg'],

            ['title' => 'The Departed', 'descriptions' => 'An undercover cop and a mole in the police attempt to identify each other while infiltrating an Irish gang in South Boston.', 'release_date' => '2006-10-06', 'duration' => 151, 'rate' => 4.5, 'video_url' => 'https://example.com/departed.mp4', 'thumbnail_url' => 'https://example.com/departed.jpg'],

            ['title' => 'The Prestige', 'descriptions' => 'After a tragic accident, two stage magicians engage in a battle to create the ultimate stage illusion while sacrificing everything they have to outwit each other.', 'release_date' => '2006-10-20', 'duration' => 130, 'rate' => 4.5, 'video_url' => 'https://example.com/prestige.mp4', 'thumbnail_url' => 'https://example.com/prestige.jpg'],

            ['title' => 'The Green Mile', 'descriptions' => 'The lives of guards on Death Row are affected by one of their charges: a black man accused of child murder, who has a mysterious gift.', 'release_date' => '1999-12-10', 'duration' => 189, 'rate' => 4.6, 'video_url' => 'https://example.com/greenmile.mp4', 'thumbnail_url' => 'https://example.com/greenmile.jpg'],

            ['title' => 'Se7en', 'descriptions' => 'Two detectives, a rookie and a veteran, hunt a serial killer who uses the seven deadly sins as his modus operandi.', 'release_date' => '1995-09-22', 'duration' => 127, 'rate' => 4.6, 'video_url' => 'https://example.com/se7en.mp4', 'thumbnail_url' => 'https://example.com/se7en.jpg'],

            ['title' => 'The Godfather', 'descriptions' => 'An organized crime dynasty\'s aging patriarch transfers control of his clandestine empire to his reluctant son.', 'release_date' => '1972-03-24', 'duration' => 175, 'rate' => 4.9, 'video_url' => 'https://example.com/godfather.mp4', 'thumbnail_url' => 'https://example.com/godfather.jpg'],

            ['title' => 'The Dark Knight', 'descriptions' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.', 'release_date' => '2008-07-18', 'duration' => 152, 'rate' => 4.8, 'video_url' => 'https://example.com/darkknight.mp4', 'thumbnail_url' => 'https://example.com/darkknight.jpg'],

            ['title' => 'Pulp Fiction', 'descriptions' => 'The lives of two mob hitmen, a boxer, a gangster\'s wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 'release_date' => '1994-10-14', 'duration' => 154, 'rate' => 4.7, 'video_url' => 'https://example.com/pulpfiction.mp4', 'thumbnail_url' => 'https://example.com/pulpfiction.jpg'],

            ['title' => 'The Lord of the Rings: The Return of the King', 'descriptions' => 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to save Middle-earth.', 'release_date' => '2003-12-17', 'duration' => 201, 'rate' => 4.9, 'video_url' => 'https://example.com/returnoftheking.mp4', 'thumbnail_url' => 'https://example.com/returnoftheking.jpg'],

            ['title' => 'Fight Club', 'descriptions' => 'An insomniac office worker and a devil-may-care soap maker form an underground fight club that evolves into much more.', 'release_date' => '1999-10-15', 'duration' => 139, 'rate' => 4.7, 'video_url' => 'https://example.com/fightclub.mp4', 'thumbnail_url' => 'https://example.com/fightclub.jpg'],

            ['title' => 'Forrest Gump', 'descriptions' => 'A slow-witted but kind-hearted man witnesses and influences several historical events.', 'release_date' => '1994-07-06', 'duration' => 142, 'rate' => 4.8, 'video_url' => 'https://example.com/forrestgump.mp4', 'thumbnail_url' => 'https://example.com/forrestgump.jpg'],

            ['title' => 'The Matrix', 'descriptions' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 'release_date' => '1999-03-31', 'duration' => 136, 'rate' => 4.8, 'video_url' => 'https://example.com/matrix.mp4', 'thumbnail_url' => 'https://example.com/matrix.jpg'],

            ['title' => 'Goodfellas', 'descriptions' => 'The story of Henry Hill and his life in the mob, covering his relationship with his wife Karen Hill and his mob partners Jimmy Conway and Tommy DeVito.', 'release_date' => '1990-09-19', 'duration' => 146, 'rate' => 4.7, 'video_url' => 'https://example.com/goodfellas.mp4', 'thumbnail_url' => 'https://example.com/goodfellas.jpg'],

            ['title' => 'The Silence of the Lambs', 'descriptions' => 'A young FBI cadet must confide in an incarcerated and manipulative killer to catch another serial killer.', 'release_date' => '1991-02-14', 'duration' => 118, 'rate' => 4.8, 'video_url' => 'https://example.com/silenceofthelambs.mp4', 'thumbnail_url' => 'https://example.com/silenceofthelambs.jpg'],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
