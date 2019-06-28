<?php

namespace App\Model\Slider\Repositories;
use App\Model\Slider\Repositories\Interfaces\SliderRepositoryInterface;
use Jsdecena\Baserepo\BaseRepository;
use App\Model\Slider\Slider;

class SliderRepository extends BaseRepository implements SliderRepositoryInterface
{
    protected $model;

    public function __construct(Slider $slider)
    {
        parent::__construct($slider);
        $this->model = $slider;
    }


    public function createSlider($data, $img)
    {
        $data['image'] = $img;
        //$data['created_by'] = 1;
        $data['created_by'] = Auth::user()->id;
        return $this->create($data);
    }

    public function updateSlider($slider_id, array $data, $aut)
    {

        $data['image'] = $aut;
        //$data['created_by'] = 1;
        $data['created_by'] = Auth::user()->id;
        return Slider::find($slider_id)->update($data);
    }


    public function get($slider_id): Slider
    {
        return slider::find($slider_id);
    }
    // public function all()
    // {
    //     return Category::all();
    // }

    public function deleteSlider($slider_id)
    {
        Slider::destroy($slider_id);
    }

}
