<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product\Repositories\Interfaces\ProductRepositoryInterface;
use App\Http\Resources\Product as ProductResource;
use App\Model\Product\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $productRepo;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepo = $productRepository;
    }
    public function index()
    {
        $data =  $this->productRepo->all();
        return ProductResource::collection($data);
        // return view('product.index')->with('data', $data);
        // return Response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
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
                $destinationPath = public_path('files/product/images');
                $file->move($destinationPath, $fileNameToStore);
            } else {

                return response()->json([
                    'sucess' => false,
                    'data' => [],
                    'message' => 'file not selected...'
                ], 200);
            }

            // $product = new Product();
            // $product->image = $fileNameToStore;

            // $request['media_id'] = 1;
            $this->productRepo->createProduct($request->except('_method', '_token', 'image'), $fileNameToStore);
            // return redirect()->route('product.index')->with('success', ' product Added Successfull.');
            return response()->json([
                'success' => true,
                'data' => [],
                'message' => 'Product added'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Product Not Added'
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
        // $product[] = $this->productRepo->get($id);
        $product = \App\Model\Product\Product::where('id', $id)->with('pdffile')->get();
        //return view('product.show')->withproduct($product);
        return Response()->json($product);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepo->get($id);

        return view('product.edit')->withProduct($product);
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
            if ($request->hasFile('image')) {
                $product = Product::find($id);
                $productimage = public_path('files/product/images/' . $product->image);
                File::delete($productimage);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = time() . '.' . $extension;
                if (!(
                    (strcasecmp($extension, 'jpg') == 0) || (strcasecmp($extension, 'jpeg') == 0) || (strcasecmp($extension, 'png') == 0))) {
                    return redirect()->back()->withInput($request->input())->with('error', 'Please select valid file');
                }
                $file = $request->file('image');
                $destinationPath = public_path('files/product/images');
                $file->move($destinationPath, $fileNameToStore);
            } else {
                // return response()->json([
                //     'sucess' => false,
                //     'data' => [],
                //     'message' => 'file not selected...'
                // ], 200);
                $fileNameToStore = Product::find($id)->image;
            }


            $this->productRepo->updateProduct($id, $request->except('_method', '_token'), $fileNameToStore);
            return response()->json([
                'success' => true,
                'data' => [],
                'message' => 'Product   Updated'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Product  Not Updated'
            ], 200);
        }
        //return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $this->productRepo->deleteProduct($id);

            return response()->json([
                'success' => true,
                'data' => [],
                'message' => 'Product  deleted'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Product Not deleted'
            ], 200);
        }
        //return Redirect::back();
    }

    public function media()
    {
        $data = \App\MediaType::all();
        return $data;
    }
}
