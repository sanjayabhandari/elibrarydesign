<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Publisher\Repositories\Interfaces\PublisherRepositoryInterface;

class PublisherController extends Controller
{
    private $publisherRepo;

    public function __construct(
        PublisherRepositoryInterface $publisherRepository
    ) {

        $this->publisherRepo = $publisherRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $data =  $this->publisherRepo->all();
        return Response()->json($data);

        //return view('publisher.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publisher = $this->publisherRepo->createPublisher($request->except('_method', '_token'));

        return response()->json([
            'success' => $publisher,
            'data' => [],
            'message' => 'publisher added'
        ], 200);
        // return redirect()->route('publisher.index')->with('success', ' publisher Added Successfull.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publisher = $this->publisherRepo->get($id);
        return Response()->json($publisher);
        //return view('publisher.show')->withPublisher($publisher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publisher = $this->publisherRepo->get($id);

        return view('publisher.edit')->withPublihser($publisher);
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
        $publisher = $this->publisherRepo->updatePublisher($id, $request->except('_method', '_token'));
        //return redirect()->route('publisher.index');
        return response()->json([
            'success' => $publisher,
            'data' => [],
            'message' => 'publisher added'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publisher = $this->publisherRepo->deletePublisher($id);
        // return Redirect::back();
        return response()->json([
            'success' => $publisher,
            'data' => [],
            'message' => 'publisher added'
        ], 200);
    }
}
