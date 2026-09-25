<?php

// Provided fake data for the Community Library catalog.
//
// The 'author' and 'genres' keys describe Day 3 relations (Author + Genre
// entities). On Day 2 the Book entity doesn't have those relations yet, so
// strip them in the Story before passing the row to BookFactory:
//
//     public function build(): void
//     {
//         $books = require dirname(__DIR__, 2) . '/fixtures/book_fixtures.php';
//
//         BookFactory::createMany(\count($books), static function (int $i) use ($books) {
//             // Day 2: strip relation data — the entity has no authors/genres yet
//             unset($books[$i - 1]['author'], $books[$i - 1]['genres']);
//
//             return $books[$i - 1];
//         });
//     }

return [
    // --- Tolkien (Middle-earth) ---
    [
        'title' => 'The Lord of the Rings',
        'isbn' => '9780544003415',
        'summary' => 'Frodo Baggins inherits a ring of terrible power and must destroy it before the Dark Lord reclaims it.',
        'publicationDate' => new \DateTimeImmutable('1954-07-29'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780544003415-L.jpg',
        'author' => 'J.R.R. Tolkien',
        'genres' => ['Fantasy'],
    ],
    [
        'title' => 'The Hobbit',
        'isbn' => '9780547928227',
        'summary' => 'A comfortable hobbit is swept from his armchair into a company of dwarves bound to reclaim their mountain from a dragon.',
        'publicationDate' => new \DateTimeImmutable('1937-09-21'),
        'available' => false,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780547928227-L.jpg',
        'author' => 'J.R.R. Tolkien',
        'genres' => ['Fantasy', 'Young Adult'],
    ],
    [
        'title' => 'The Silmarillion',
        'isbn' => '9780544338012',
        'summary' => 'The creation myths and early ages of Middle-earth, from the shaping of the world to the drowning of Númenor.',
        'publicationDate' => new \DateTimeImmutable('1977-09-15'),
        'available' => false,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780544338012-L.jpg',
        'author' => 'J.R.R. Tolkien',
        'genres' => ['Fantasy'],
    ],

    // --- Jordan (The Wheel of Time) ---
    [
        'title' => 'The Eye of the World',
        'isbn' => '9780812511819',
        'summary' => 'Three young men from a quiet village are swept into the conflict between the Dragon Reborn and the Dark One.',
        'publicationDate' => new \DateTimeImmutable('1990-01-15'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780812511819-L.jpg',
        'author' => 'Robert Jordan',
        'genres' => ['Fantasy'],
    ],
    [
        'title' => 'The Great Hunt',
        'isbn' => '9780812517729',
        'summary' => 'Rand al\'Thor and his friends pursue the stolen Horn of Valere across shadowed borderlands as prophecies close around them.',
        'publicationDate' => new \DateTimeImmutable('1990-11-15'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780812517729-L.jpg',
        'author' => 'Robert Jordan',
        'genres' => ['Fantasy'],
    ],
    [
        'title' => 'The Shadow Rising',
        'isbn' => '9780812513738',
        'summary' => 'Rand crosses the Waste while Perrin returns home to fight the Whitecloaks and Nynaeve hunts the Black Ajah in Tanchico.',
        'publicationDate' => new \DateTimeImmutable('1992-09-15'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780812513738-L.jpg',
        'author' => 'Robert Jordan',
        'genres' => ['Fantasy'],
    ],

    // --- Feist (Riftwar) ---
    [
        'title' => 'Magician',
        'isbn' => '9780553564938',
        'summary' => 'A kitchen boy named Pug is apprenticed to a magician on the eve of an invasion from another world.',
        'publicationDate' => new \DateTimeImmutable('1982-10-01'),
        'available' => false,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780553564938-L.jpg',
        'author' => 'Raymond E. Feist',
        'genres' => ['Fantasy'],
    ],
    [
        'title' => 'Silverthorn',
        'isbn' => '9780553270549',
        'summary' => 'Prince Arutha crosses hostile borderlands in search of a rare flower — the only cure for a poison meant for him.',
        'publicationDate' => new \DateTimeImmutable('1985-05-01'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780553270549-L.jpg',
        'author' => 'Raymond E. Feist',
        'genres' => ['Fantasy'],
    ],

    // --- McClellan (Powder Mage) ---
    [
        'title' => 'Promise of Blood',
        'isbn' => '9780316219044',
        'summary' => 'A field marshal overthrows the king and must defend his fragile new republic from gods and gunpowder mages.',
        'publicationDate' => new \DateTimeImmutable('2013-04-16'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780316219044-L.jpg',
        'author' => 'Brian McClellan',
        'genres' => ['Fantasy'],
    ],
    [
        'title' => 'The Crimson Campaign',
        'isbn' => '9780316219068',
        'summary' => 'Field Marshal Tamas leads a shattered army deep into enemy territory while his son hunts a sorcerer in the mountains.',
        'publicationDate' => new \DateTimeImmutable('2014-05-06'),
        'available' => false,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780316219068-L.jpg',
        'author' => 'Brian McClellan',
        'genres' => ['Fantasy'],
    ],

    // --- Sanderson (Mistborn + Stormlight) ---
    [
        'title' => 'Mistborn: The Final Empire',
        'isbn' => '9780765350381',
        'summary' => 'In a world of perpetual ash, a ragtag crew of thieves plans to overthrow an immortal god-emperor.',
        'publicationDate' => new \DateTimeImmutable('2006-07-25'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780765350381-L.jpg',
        'author' => 'Brandon Sanderson',
        'genres' => ['Fantasy'],
    ],
    [
        'title' => 'The Well of Ascension',
        'isbn' => '9780765356130',
        'summary' => 'Vin and Elend struggle to hold a fragile new kingdom together as ancient powers stir beneath the world.',
        'publicationDate' => new \DateTimeImmutable('2007-08-21'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780765356130-L.jpg',
        'author' => 'Brandon Sanderson',
        'genres' => ['Fantasy'],
    ],
    [
        'title' => 'The Way of Kings',
        'isbn' => '9780765365279',
        'summary' => 'On the shattered plains, a disgraced soldier, a reluctant scholar, and a wounded king all seek answers to a coming storm.',
        'publicationDate' => new \DateTimeImmutable('2010-08-31'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780765365279-L.jpg',
        'author' => 'Brandon Sanderson',
        'genres' => ['Fantasy'],
    ],
    [
        'title' => 'Words of Radiance',
        'isbn' => '9780765326362',
        'summary' => 'Shallan and Kaladin converge on the Shattered Plains as storms grow strange and old oaths return to bind the knights.',
        'publicationDate' => new \DateTimeImmutable('2014-03-04'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780765326362-L.jpg',
        'author' => 'Brandon Sanderson',
        'genres' => ['Fantasy'],
    ],

    // --- Gaiman ---
    [
        'title' => 'American Gods',
        'isbn' => '9780380789030',
        'summary' => 'An ex-convict named Shadow crosses America as a storm brews between old gods and new gods of technology and media.',
        'publicationDate' => new \DateTimeImmutable('2001-06-19'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780380789030-L.jpg',
        'author' => 'Meil Gaiman',
        'genres' => ['Fantasy'],
    ],

    // --- Zelazny (Amber) ---
    [
        'title' => 'Nine Princes in Amber',
        'isbn' => '9780380014309',
        'summary' => 'A man wakes without memory and slowly discovers he is Corwin, prince of the one true realm from which all worlds are shadow.',
        'publicationDate' => new \DateTimeImmutable('1970-01-01'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780380014309-L.jpg',
        'author' => 'Roger Zelazny',
        'genres' => ['Fantasy'],
    ],

    // --- Gemmell (Drenai) ---
    [
        'title' => 'Legend',
        'isbn' => '9780345379061',
        'summary' => 'An aging warrior named Druss comes out of retirement to defend a fortress against an overwhelming Nadir horde.',
        'publicationDate' => new \DateTimeImmutable('1984-01-01'),
        'available' => false,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780345379061-L.jpg',
        'author' => 'David Gemmell',
        'genres' => ['Fantasy'],
    ],

    // --- Stoker (Gothic) ---
    [
        'title' => 'Dracula',
        'isbn' => '9780486411095',
        'summary' => 'An English solicitor\'s journey to a Transylvanian castle unleashes a centuries-old predator on the streets of London.',
        'publicationDate' => new \DateTimeImmutable('1897-05-26'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780486411095-L.jpg',
        'author' => 'Bram Stoker',
        'genres' => ['Gothic'],
    ],

    // --- Asimov (Foundation) ---
    [
        'title' => 'Foundation',
        'isbn' => '9780553293357',
        'summary' => 'Psychohistorian Hari Seldon plans to shorten the coming galactic dark age from 30,000 years to one.',
        'publicationDate' => new \DateTimeImmutable('1951-06-01'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780553293357-L.jpg',
        'author' => 'Isaac Asimov',
        'genres' => ['Science Fiction'],
    ],
    [
        'title' => 'Foundation and Empire',
        'isbn' => '9780553293371',
        'summary' => 'Seldon\'s plan confronts a mutant warlord who can read and bend minds — a variable no mathematics foresaw.',
        'publicationDate' => new \DateTimeImmutable('1952-01-01'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780553293371-L.jpg',
        'author' => 'Isaac Asimov',
        'genres' => ['Science Fiction'],
    ],

    // --- Herbert (Dune) ---
    [
        'title' => 'Dune',
        'isbn' => '9780441172719',
        'summary' => 'Paul Atreides comes of age on a desert planet where water is scarcer than spice is precious.',
        'publicationDate' => new \DateTimeImmutable('1965-08-01'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780441172719-L.jpg',
        'author' => 'Frank Herbert',
        'genres' => ['Science Fiction'],
    ],
    [
        'title' => 'Dune Messiah',
        'isbn' => '9780441172696',
        'summary' => 'Twelve years after taking the imperial throne, Paul Atreides faces a conspiracy of Bene Gesserit, Tleilaxu, and Spacing Guild.',
        'publicationDate' => new \DateTimeImmutable('1969-07-01'),
        'available' => false,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780441172696-L.jpg',
        'author' => 'Frank Herbert',
        'genres' => ['Science Fiction'],
    ],

    // --- Card (Ender) ---
    [
        'title' => 'Ender\'s Game',
        'isbn' => '9780812550702',
        'summary' => 'A gifted child is trained in zero gravity battle school to lead humanity\'s defense against an alien invasion.',
        'publicationDate' => new \DateTimeImmutable('1985-01-15'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780812550702-L.jpg',
        'author' => 'Orson Scott Card',
        'genres' => ['Science Fiction', 'Young Adult'],
    ],
    [
        'title' => 'Speaker for the Dead',
        'isbn' => '9780812550757',
        'summary' => 'Decades after Ender Wiggin destroyed an alien species, he travels to a colony world to speak the truth of a xenobiologist\'s death.',
        'publicationDate' => new \DateTimeImmutable('1986-03-01'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780812550757-L.jpg',
        'author' => 'Orson Scott Card',
        'genres' => ['Science Fiction'],
    ],

    // --- Simmons (Hyperion Cantos + Ilium) ---
    [
        'title' => 'Hyperion',
        'isbn' => '9780553283686',
        'summary' => 'Seven pilgrims travel to the Time Tombs of a doomed world, each recounting the story that brought them to the Shrike.',
        'publicationDate' => new \DateTimeImmutable('1989-05-26'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780553283686-L.jpg',
        'author' => 'Dan Simmons',
        'genres' => ['Science Fiction'],
    ],
    [
        'title' => 'The Fall of Hyperion',
        'isbn' => '9780553288209',
        'summary' => 'The pilgrims face their reckoning at the Time Tombs while empires collapse and a war god walks.',
        'publicationDate' => new \DateTimeImmutable('1990-02-28'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780553288209-L.jpg',
        'author' => 'Dan Simmons',
        'genres' => ['Science Fiction'],
    ],
    [
        'title' => 'Ilium',
        'isbn' => '9780380817920',
        'summary' => 'A twentieth-century scholar watches the Trojan War on a terraformed Mars while moravecs from Jupiter investigate why.',
        'publicationDate' => new \DateTimeImmutable('2003-07-01'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780380817920-L.jpg',
        'author' => 'Dan Simmons',
        'genres' => ['Science Fiction'],
    ],

    // --- Pullman (His Dark Materials) ---
    [
        'title' => 'The Golden Compass',
        'isbn' => '9780679879244',
        'summary' => 'In a world where souls walk as animal daemons, young Lyra discovers a conspiracy involving stolen children and a mysterious Dust.',
        'publicationDate' => new \DateTimeImmutable('1995-07-09'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780679879244-L.jpg',
        'author' => 'Philip Pullman',
        'genres' => ['Young Adult', 'Fantasy'],
    ],

    // --- Rowling (Harry Potter) ---
    [
        'title' => 'Harry Potter and the Philosopher\'s Stone',
        'isbn' => '9780747532743',
        'summary' => 'An orphaned boy discovers on his eleventh birthday that he is a wizard and is invited to a hidden school of magic.',
        'publicationDate' => new \DateTimeImmutable('1997-06-26'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780747532743-L.jpg',
        'author' => 'J.K. Rowling',
        'genres' => ['Young Adult', 'Fantasy'],
    ],
    [
        'title' => 'Harry Potter and the Prisoner of Azkaban',
        'isbn' => '9780747542155',
        'summary' => 'Harry\'s third year at Hogwarts is darkened by the escape of Sirius Black and the arrival of shadowy Dementors.',
        'publicationDate' => new \DateTimeImmutable('1999-07-08'),
        'available' => true,
        'language' => 'en',
        'coverUrl' => 'https://covers.openlibrary.org/b/isbn/9780747542155-L.jpg',
        'author' => 'J.K. Rowling',
        'genres' => ['Young Adult', 'Fantasy'],
    ],
];
