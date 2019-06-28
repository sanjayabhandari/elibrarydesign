<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Slider\Repositories\Interfaces\SliderRepositoryInterface;
use App\Model\Slider\Slider;

class SliderController extends Controller
{

    private $sliderRepo;

    public function __construct(
        SliderRepositoryInterface $sliderRepository
    ) {

        $this->sliderRepo = $sliderRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  $this->sliderRepo->all();
        return Response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $extension;
            if (!(
                (strcasecmp($extension, 'jpg') == 0) || (strcasecmp($extension, 'jpeg') == 0) || (strcasecmp($extension, 'png') == 0))) {
                return response()->json([
                    'sucess' => false,
                    'data' => [],
                    'message' => 'vaild file not selected...'
                ], 200);
            }

            $file = $request->file('image');
            $destinationPath = public_path('file');
            $file->move($destinationPath, $fileNameToStore);
        } else {
            $fileNameToStore = NULL;
                }

        $slider = new Slider();
        $slider->image = $fileNameToStore;



        try {
            $slider = $this->sliderRepo->createslider($request->except('_method', '_token'), $slider->image);
            return response()->json([
                'success' => true,
                'data' => $slider,
                'message' => 'slider Added'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'slider Not Added'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = $this->sliderRepo->get($id);
        return Response()->json($slider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = $this->sliderRepo->get($id);

        return view('slider.edit')->withSlider($slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $extension;
            if (!(
                (strcasecmp($extension, 'jpg') == 0) || (strcasecmp($extension, 'jpeg') == 0) || (strcasecmp($extension, 'png') == 0))) {
                return response()->json([
                    'sucess' => false,
                    'data' => [],
                    'message' => 'vaild file not selected...'
                ], 200);
            }

            $file = $request->file('image');
            $destinationPath = public_path('file');
            $file->move($destinationPath, $fileNameToStore);
        } else {


            $fileNameToStore = Slider::find($id)->image;
        }

        $slider = new Slider();
        $slider->image = $fileNameToStore;


        try {
            $slider =   $this->sliderRepo->updateslider($id, $request->except('_method', '_token'), $slider->image);
            return response()->json([
                'success' => true,
                'data' => $slider,
                'message' => 'slider updated'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'slider Not Updated'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->sliderRepo->deleteSlider($id);
        //return Redirect::back();
        return response()->json([
            'success' => true,
            'data' => [],
            'message' => 'slider deleted'
        ], 200);
    }
}
