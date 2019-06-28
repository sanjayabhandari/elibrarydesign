<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Language\Repositories\Interfaces\LanguageRepositoryInterface;
use App\Model\Language\Language;

class LanguageController extends Controller
{
    private $languageRepo;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(LanguageRepositoryInterface  $languageRepository)
    {
        $this->languageRepo = $languageRepository;
    }

    public function index()
    {
        $data = $this->languageRepo->all();
        // return view('language.index')->with('data',$data);
        return Response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Language::create($request->all());
        try {


            $language = $this->languageRepo->createLanguage($request->except('_method', '_token'));
            //return redirect()->route('language.index')->with('success', 'sucessfully added');
            return response()->json([
                'success' => true,
                'data' => $language,
                'message' => 'Language Added'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Language Not Added'
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
        $language = $this->languageRepo->get($id);
        //return view('language.show')->withLanguage($language);
        return Response()->json($language);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = $this->languageRepo->get($id);

        //return view('language.edit')->withLanguage($language);
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
        try {


            $language = $this->languageRepo->updateLanguage($id, $request->except('_method', '_token'));
            //return redirect()->route('language.index');
            return response()->json([
                'success' => true,
                'data' => $language,
                'message' => 'Language Added'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Language Not Added'
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
        $this->languageRepo->deleteLanguage($id);
        //return Redirect::back();
        return response()->json([
            'success' => true,
            'data' => [],
            'message' => 'language deleted'
        ], 200);
    }
}
