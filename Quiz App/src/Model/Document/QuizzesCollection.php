<?php


namespace App\Model\Document;


use App\Mongo\CollectionRegistry;
use Cake\Datasource\Exception\RecordNotFoundException;
use MongoDB\BSON\ObjectId;
use MongoDB\Model\BSONDocument;

class QuizzesCollection
{
    /**
     * @param array $questions
     * @param array $answers
     */
    public function getResults($questions, array $answers)
    {
        $total = count($questions);
        $correctCount = 0;
        foreach ($answers as $id => $answer) {
            $answer = (int)$answer;
            $isCorrect = $questions[$id]['options'][$answer]['is_correct'] ?? false;
            if ($isCorrect === true) {
                $correctCount++;
            }
        }

        return [
            'correctCount' => $correctCount,
            'total' => $total,
        ];
    }

    /**
     * Create a new quiz
     *
     * @param array $data
     */
    public function createOne(array $data)
    {
        foreach ($data['questions'] as $key => $question) {
            $correctOption = (int)$question['correct_option'];
            unset($question['correct_option']);
            foreach ($question['options'] as $optionKey => $option) {
                $question['options'][$optionKey] = [
                    'text' => $option['text'],
                    'is_correct' => $optionKey == $correctOption,
                ];
            }
            $data['questions'][$key] = [
                'title' => $question['title'],
                'options' => $question['options'],
            ];
        }
        $data = [
            'name' => $data['name'],
            'questions' => $data['questions'],
        ];
        $result = $this->getBase()->insertOne($data);
        if (!$result->isAcknowledged()) {
            throw new \UnexpectedValueException(__('Could not save quiz'));
        }

        $data['_id'] = (string)$result->getInsertedId();

        return json_decode(json_encode($data));
    }
    /**
     * @return \MongoDB\Driver\Cursor
     */
    public function getAll()
    {
        return $this->getBase()->find();
    }

    /**
     * @param string $id The quiz id
     *
     * @return array|object|null
     */
    public function get(string $id)
    {
        $result = $this->getBase()->findOne([
            '_id' => new ObjectId($id)
        ]);
        if ($result !== null && $result instanceof BSONDocument) {
            return $result;
        }
        throw new RecordNotFoundException(__('Quiz not found for requested id'));
    }

    /**
     * @return \MongoDB\Collection
     */
    protected function getBase(): \MongoDB\Collection
    {
        return CollectionRegistry::get('quizzes');
    }
}
