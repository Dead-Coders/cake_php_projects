<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Quiz seed.
 */
class QuizSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $collection = \App\Mongo\CollectionRegistry::get('quizzes');
        $collection->deleteMany([]);
        //Sourve https://devsari.com/hardest-how-i-met-your-mother-quiz-ever/
        $data = [
            [
                'name' => __('The Ultimate Ted Mosby Quiz'),
                'questions' => [
                    [
                        'title' => 'After whose wedding did Ted Mosby start searching for his soulmate?',
                        'options' => [
                            ['text' => 'Barney and Nora', 'is_correct' => false],
                            ['text' => 'Quinn and Barney', 'is_correct' => false],
                            ['text' => 'Marshall and Lily', 'is_correct' => true],
                            ['text' => 'Barney and Robin', 'is_correct' => false],
                        ]
                    ],
                    [
                        'title' => 'After the break-up with Victoria, how did Ted try to win over Robin as the last attempt?',
                        'options' => [
                            ['text' => 'Hiring a chamber orchestra with blue instruments', 'is_correct' => true],
                            ['text' => 'Singing her favorite song with blue flowers', 'is_correct' => false],
                            ['text' => 'Proposing with a blue french horn', 'is_correct' => true],
                            ['text' => 'Hiring an orchestra with blue dressed musicians', 'is_correct' => false],
                        ]
                    ],
                    [
                        'title' => 'What was the color of the umbrella that Ted picks up after he returns to the room, the morning after the St.Patrick\'s day party?',
                        'options' => [
                            ['text' => 'Blue', 'is_correct' => false],
                            ['text' => 'Pink', 'is_correct' => false],
                            ['text' => 'White', 'is_correct' => true],
                            ['text' => 'Yellow', 'is_correct' => true],
                        ]
                    ],
                ]
            ],
            [
                'name' => __('The Hardest Barney Stinson Quiz Ever'),
                'questions' => [
                    [
                        'title' => 'Which Band Did Barney Pretend To Be A Member Of To Pick Up Women?',
                        'options' => [
                            ['text' => 'Cheap Trick', 'is_correct' => false,],
                            ['text' => 'Motley Crue', 'is_correct' => false,],
                            ['text' => 'Journey', 'is_correct' => true,],
                            ['text' => 'White Snake', 'is_correct' => false,],
                        ]
                    ],
                    [
                        'title' => 'Who wrote the \'Bro Code\'?',
                        'options' => [
                            ['text' => 'Barney Stinson', 'is_correct' => false,],
                            ['text' => 'Barnabus Stinson', 'is_correct' => false,],
                            ['text' => 'Bernard Stinson', 'is_correct' => true,],
                            ['text' => 'Barnaby Stinson', 'is_correct' => false,],
                        ]
                    ],
                ]
            ],
        ];

        debug($collection->insertMany($data));

    }
}
