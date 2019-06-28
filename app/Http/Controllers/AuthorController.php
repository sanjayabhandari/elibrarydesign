<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Author\Repositories\Interfaces\AuthorRepositoryInterface;
use app\Model\Author\Author;
use Illuminate\Support\Facades\File;



class AuthorController extends Controller
{

    private $authorRepo;

    public function __construct(
        AuthorRepositoryInterface $authorRepository
    ) {

        $this->authorRepo = $authorRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  $this->authorRepo->all();
        return Response()->json($data);
        // return view('author.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
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
            $destinationPath = public_path('files/author');
            $file->move($destinationPath, $fileNameToStore);
        } else {
            $fileNameToStore = NULL;
            // return response()->json([
            //     'sucess' => false,
            //     'data' => [],
            //     'message' => 'file not selected...'
            // ], 200);
        }

        $author = new Author();
        $author->image = $fileNameToStore;



        // return redirect()->route('author.index')->with('success', ' category Added Successfull.');

        try {
            $author = $this->authorRepo->createAuthor($request->except('_method', '_token'), $author->image);
            return response()->json([
                'success' => true,
                'data' => $author,
                'message' => 'Author Added'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Author Not Added'
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
        $author = $this->authorRepo->get($id);
        return Response()->json($author);
        // return view('author.show')->withAuthor($author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = $this->authorRepo->get($id);

        return view('author.edit')->withAuthor($author);
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
            $author = Author::find($id);
            $authorimage =  public_path('files/author/' . $author->image);
            $authorimage =  public_path('files/author/' . $author->image);
            File::delete($authorimage);
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
            $destinationPath = public_path('files/author');
            $file->move($destinationPath, $fileNameToStore);
        } else {


            $fileNameToStore = Author::find($id)->image;
        }

        $author = new Author();
        $author->image = $fileNameToStore;


        try {
            $author =   $this->authorRepo->updateAuthor($id, $request->except('_method', '_token'), $author->image);
            return response()->json([
                'success' => true,
                'data' => $author,
                'message' => 'Author updated'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Author Not Updated'
            ], 200);
        }

        ///return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorRepo->deleteAuthor($id);
        //return Redirect::back();
        return response()->json([
            'success' => true,
            'data' => [],
            'message' => 'author deleted'
        ], 200);
    }
}
