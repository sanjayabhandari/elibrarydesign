<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Blog\Repositories\Interfaces\BlogRepositoryInterface;
use App\Model\Blog\Blog;
use App\Http\Resources\Blog as BlogResource;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $blogRepo;
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepo = $blogRepository;
    }
    public function index()
    {
        $data =  $this->blogRepo->all();
        return BlogResource::collection($data);
        //return view('blog.index')->with('data',$data);
        // return Response()->json($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd( $request->hasFile('image'));
        try {
            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = time() . '.' . $extension;
                if (!(
                    (strcasecmp($extension, 'jpg') == 0) || (strcasecmp($extension, 'jpeg') == 0) || (strcasecmp($extension, 'png') == 0))) {
                    return redirect()->back()->withInput($request->input())->with('error', 'Please select valid file');
                }
                $file = $request->file('image');
                $destinationPath = public_path('file');
                $file->move($destinationPath, $fileNameToStore);
            } else {
                $fileNameToStore = null;
            }
            $blog = new Blog();
            $blog->image = $fileNameToStore;
            $blog = $this->blogRepo->createBlog($request->except('_method', '_token'), $blog->image);
            //return redirect()->route('blog.index')->with('success', ' file Added Successfull.');
            return response()->json([
                'success' => true,
                'data' => [],
                'message' => 'Blog  Added'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Blog Not Added'
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
        $blog = $this->blogRepo->get($id);
        // return view('blog.show')->withBlog($blog);
        return Response()->json($blog);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this->blogRepo->get($id);
        //return view('blog.edit')->withBlog($blog);
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
                    return redirect()->back()->withInput($request->input())->with('error', 'Please select valid file');
                }
                $file = $request->file('image');
                $destinationPath = public_path('file');
                $file->move($destinationPath, $fileNameToStore);
            } else {
                // return response()->json([
                //     'sucess' => false,
                //     'data' => [],
                //     'message' => 'file not selected...'
                // ], 200);
                $fileNameToStore = Blog::find($id)->image;
            }
            $blog = new Blog();
            $blog->image = $fileNameToStore;
            $blog =   $this->blogRepo->updateblog($id, $request->except('_method', '_token'), $blog->image);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogRepo->deleteBlog($id);
        return response()->json([
            'success' => true,
            'data' => [],
            'message' => 'blog deleted'
        ], 200);
        //return Redirect::back();
    }
}