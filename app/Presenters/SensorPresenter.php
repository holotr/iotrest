<?php

namespace Someline\Presenters;

use Someline\Transformers\SensorTransformer;

/**
 * Class SensorPresenter
 *
 * @package namespace Someline\Presenters;
 */
class SensorPresenter extends BasePresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SensorTransformer();
    }
}
