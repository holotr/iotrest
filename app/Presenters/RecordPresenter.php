<?php

namespace Someline\Presenters;

use Someline\Transformers\RecordTransformer;

/**
 * Class RecordPresenter
 *
 * @package namespace Someline\Presenters;
 */
class RecordPresenter extends BasePresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RecordTransformer();
    }
}
