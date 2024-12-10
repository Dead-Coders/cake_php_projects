<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Sample seed.
 */
class SampleSeed extends AbstractSeed
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
        $this->movies();
        $this->screens();
        $this->schedules();
    }

    protected function screens(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Sala 1',
                'tags' => 'DUB'
            ],
            [
                'id' => 2,
                'name' => 'Sala 2',
                'tags' => 'PLUS',
            ],
            [
                'id' => 3,
                'name' => 'Sala 3',
                'tags' => 'EXP|PLUS',
            ],
            [
                'id' => 4,
                'name' => 'Sala 4 - Max',
                'tags' => 'MAX',
            ],
            [
                'id' => 5,
                'name' => 'Sala 5',
                'tags' => 'EXP',
            ],
        ];

        $table = $this->table('screens');
        $table->insert($data)->save();
    }

    protected function movies(): void
    {
        $data = [
            [
                'id' => 10,
                'name' => 'Viúva Negra',
                'synopsis' => 'No novo filme da Marvel Studios, Viúva Negra precisa confrontar partes de sua história quando surge uma conspiração perigosa ligada ao seu passado.',
                'duration' => 130,
            ],
            [
                'id' => 15,
                'name' => 'Space Jam: Um Novo Legado',
                'synopsis' => 'Quando LeBron e seu filho Dom são aprisionados em um espaço digital por uma I.A. trapaceira, LeBron precisa trazê-los de volta para casa em segurança levando o Pernalonga, a Lola Bunny e uma equipe indisciplinada de Looney Tunes a uma vitória contra os campeões digitais da I.A',
                'duration' => 115,
            ],
            [
                'id' => 20,
                'name' => 'Velozes e Furiosos 9',
                'synopsis' => 'Nono filme da série Velozes & Furiosos, e segundo da nova trilogia (Velozes 8, 9 e 10), que não conta mais com a presença de Paul Walker, falecido em 2013.',
                'duration' => 140,
            ],
        ];

        $table = $this->table('movies');
        $table->insert($data)->save();
    }

    protected function schedules(): void
    {
        $data = [
            [
                'movie_id' => 10,
                'screen_id' => 1,
                'start_time' => date('Y-m-d') . ' 12:00:00',
                'close_time' => date('Y-m-d') . ' 15:09:59',
            ],
            [
                'movie_id' => 10,
                'screen_id' => 1,
                'start_time' => date('Y-m-d') . ' 15:10:00',
                'close_time' => date('Y-m-d') . ' 18:19:59',
            ],
            [
                'movie_id' => 10,
                'screen_id' => 1,
                'start_time' => date('Y-m-d') . ' 18:20:00',
                'close_time' => date('Y-m-d') . ' 21:39:59',
            ],
            [
                'movie_id' => 10,
                'screen_id' => 2,
                'start_time' => date('Y-m-d') . ' 13:00:00',
                'close_time' => date('Y-m-d') . ' 16:09:59',
            ],
            [
                'movie_id' => 15,
                'screen_id' => 2,
                'start_time' => date('Y-m-d') . ' 16:10:00',
                'close_time' => date('Y-m-d') . ' 18:39:59',
            ],
            [
                'movie_id' => 10,
                'screen_id' => 2,
                'start_time' => date('Y-m-d') . ' 18:40:00',
                'close_time' => date('Y-m-d') . ' 21:59:59',
            ],
            [
                'movie_id' => 20,
                'screen_id' => 4,
                'start_time' => date('Y-m-d') . ' 12:00:00',
                'close_time' => date('Y-m-d') . ' 15:09:59',
            ],
            [
                'movie_id' => 20,
                'screen_id' => 4,
                'start_time' => date('Y-m-d') . ' 15:10:00',
                'close_time' => date('Y-m-d') . ' 18:19:59',
            ],
            [
                'movie_id' => 20,
                'screen_id' => 4,
                'start_time' => date('Y-m-d') . ' 18:20:00',
                'close_time' => date('Y-m-d') . ' 21:39:59',
            ],
            [
                'movie_id' => 20,
                'screen_id' => 5,
                'start_time' => date('Y-m-d') . ' 16:30:00',
                'close_time' => date('Y-m-d') . ' 19:29:59',
            ],
            [
                'movie_id' => 20,
                'screen_id' => 5,
                'start_time' => date('Y-m-d') . ' 19:30:00',
                'close_time' => date('Y-m-d') . ' 22:49:59',
            ],
            [
                'movie_id' => 10,
                'screen_id' => 1,
                'start_time' => date('Y-m-d', strtotime('+1 day')) . ' 12:00:00',
                'close_time' => date('Y-m-d', strtotime('+1 day')) . ' 15:09:59',
            ],
            [
                'movie_id' => 10,
                'screen_id' => 1,
                'start_time' => date('Y-m-d', strtotime('+1 day')) . ' 15:10:00',
                'close_time' => date('Y-m-d', strtotime('+1 day')) . ' 18:19:59',
            ],
            [
                'movie_id' => 10,
                'screen_id' => 1,
                'start_time' => date('Y-m-d', strtotime('+1 day')) . ' 18:20:00',
                'close_time' => date('Y-m-d', strtotime('+1 day')) . ' 21:39:59',
            ],
            [
                'movie_id' => 10,
                'screen_id' => 2,
                'start_time' => date('Y-m-d', strtotime('+1 day')) . ' 13:00:00',
                'close_time' => date('Y-m-d', strtotime('+1 day')) . ' 16:09:59',
            ],
            [
                'movie_id' => 15,
                'screen_id' => 2,
                'start_time' => date('Y-m-d', strtotime('+1 day')) . ' 16:10:00',
                'close_time' => date('Y-m-d', strtotime('+1 day')) . ' 18:39:59',
            ],
            [
                'movie_id' => 10,
                'screen_id' => 2,
                'start_time' => date('Y-m-d', strtotime('+1 day')) . ' 18:40:00',
                'close_time' => date('Y-m-d', strtotime('+1 day')) . ' 21:59:59',
            ],
            [
                'movie_id' => 10,
                'screen_id' => 1,
                'start_time' => date('Y-m-d', strtotime('+2 days')) . ' 15:10:00',
                'close_time' => date('Y-m-d', strtotime('+2 days')) . ' 18:19:59',
            ],
            [
                'movie_id' => 10,
                'screen_id' => 1,
                'start_time' => date('Y-m-d', strtotime('+2 days')) . ' 18:20:00',
                'close_time' => date('Y-m-d', strtotime('+2 days')) . ' 21:39:59',
            ],
            [
                'movie_id' => 10,
                'screen_id' => 2,
                'start_time' => date('Y-m-d', strtotime('+2 days')) . ' 13:00:00',
                'close_time' => date('Y-m-d', strtotime('+2 days')) . ' 16:09:59',
            ],
            [
                'movie_id' => 15,
                'screen_id' => 2,
                'start_time' => date('Y-m-d', strtotime('+2 days')) . ' 16:10:00',
                'close_time' => date('Y-m-d', strtotime('+2 days')) . ' 18:39:59',
            ],
        ];

        $table = $this->table('schedules');
        $table->insert($data)->save();
    }
}
