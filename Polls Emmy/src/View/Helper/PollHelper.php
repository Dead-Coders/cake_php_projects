<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Poll helper
 */
class PollHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * @param int $responseCount
     *
     * @return string
     */
    public function result(int $responseCount): string
    {
        $total = $this->getView()->get('allResponses');
        $value = $responseCount * 100 / $total;

        return sprintf(
            '<progress class="progress is-primary" value="%s" max="100">%s %%</progress>',
            $value,
            $value
        );
    }

}
