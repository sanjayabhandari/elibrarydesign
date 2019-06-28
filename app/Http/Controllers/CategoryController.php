<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Category;
use DB;
use App\Model\Category\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Model\Category\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    // use DealerTransformable;

    private $categoryRepo;
    // private $userRepo;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
        // UserRepositoryInterface $userRepository
    ) {
        $this->categoryRepo = $categoryRepository;
        // $this->userRepo = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $data =  $this->categoryRepo->all();
        return Response()->json($data);

        // return view('category.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = $this->categoryRepo->gLevel(0);
        $child = $this->categoryRepo->gLevel(1);
        $subchild = $this->categoryRepo->gLevel(2);
        return Response()->json([$parent, $child, $subchild]);
        // return view('category.create', compact('parent', 'child', 'subchild'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->child) {
            $category = $this->categoryRepo->get($request->child);
            $request['parent'] = $category->parent;
        }
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
            $destinationPath = public_path('files/category');
            $file->move($destinationPath, $fileNameToStore);
        } else {
            return response()->json([
                'sucess' => false,
                'data' => [],
                'message' => 'file not selected...'
            ], 200);
        }

        $category = new Category();
        $category->image = $fileNameToStore;


        $category = $this->categoryRepo->createCategory($request->except('_method', '_token'), $category->image);

        return response()->json([
            'success' => true,
            'data' => $category,
            'message' => 'category added'
        ], 200);
        //return redirect()->route('category.index')->with('success', ' category Added Successfull.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categoryRepo->get($id);
        return Response()->json($category);
        // return view('category.show')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parent = $this->categoryRepo->gLevel(0);
        $child = $this->categoryRepo->gLevel(1);
        $subchild = $this->categoryRepo->gLevel(2);

        $category = $this->categoryRepo->get($id);

        return view('category.edit', compact('parent', 'child', 'subchild'))->withCategory($category);
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


        //    return $request->image;
        if ($request->hasFile('image')) {
            $category = Category::find($id);
            $categoryimage = public_path('files/category/' . $category->image);
            File::delete($categoryimage);
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
            $destinationPath = public_path('files/category');
            $file->move($destinationPath, $fileNameToStore);
        } else {
            $category = $this->categoryRepo->get($id);
            $fileNameToStore = $category->image;
            // return response()->json([
            //     'sucess' => false,
            //     'data' => [],
            //     'message' => 'file not selected...'
            // ], 200);
        }


        $category = new Category();
        $category->image = $fileNameToStore;

        $category = $this->categoryRepo->updateCategory($id, $request->except('_method', '_token'), $category->image);
        return response()->json([
            'success' => true,
            'data' => $category,
            'message' => 'category updated'
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
        $this->categoryRepo->deleteCategory($id);
        return response()->json([
            'success' => true,
            'data' => [],
            'message' => 'category deleted'
        ], 200);
    }
}
