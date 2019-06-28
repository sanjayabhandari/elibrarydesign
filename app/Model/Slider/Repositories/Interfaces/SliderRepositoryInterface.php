<?php

namespace App\Model\Slider\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Model\Slider\Slider;

interface SliderRepositoryInterface extends BaseRepositoryInterface
{
    public function createSlider( $params, $img);
        public function updateSlider($slider_id, array $params,$aut);
        public function deleteSlider($slider_id);
        public function get($slider_id):Slider;

}
