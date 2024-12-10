<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * TagsWidget cell
 */
class TagsWidgetCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize(): void
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        /**
         * @var \App\Model\Table\TagsTable $Model;
         */
        $Model = $this->loadModel('Tags');

        $tags = $Model
            ->find()
            ->orderAsc('name')
            ->all();
        $size = (int)round($tags->count() / 2);
        $tags = $tags->chunk($size)->toArray();
        $this->set(compact("tags"));
    }
}
