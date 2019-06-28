<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Productfile\Repositories\Interfaces\ProductfileRepositoryInterface;
use App\Model\Productfile\Productfile;
use PhpParser\Node\Stmt\Foreach_;

class ProductfileController extends Controller
{

    private $productfileRepo;

    public function __construct(ProductfileRepositoryInterface $productfileRepository)
    {
        $this->productfileRepo = $productfileRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  $this->productfileRepo->all();
        return view('productfile.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productfile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  return ( $request->fileformate);
        try {
            $files = $request->fileformate;
            foreach ($files as $file) {

                if ($request->hasFile('fileformate')) {

                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore = $file->getClientOriginalName();
                    // $fileNameToStore =time() . '.' . $extension;

                    if (!(
                        (strcasecmp($extension, 'jpg') == 0) || (strcasecmp($extension, 'jpeg') == 0) || (strcasecmp($extension, 'pdf') == 0) || (strcasecmp($extension, 'png') == 0))) {
                        return redirect()->back()->withInput($request->input())->with('error', 'Please select valid file');
                    }
                    //uplod image
                    // $file = $request->file('fileformate');
                    $destinationPath = public_path('files/product/files');
                    $file->move($destinationPath, $fileNameToStore);
                } else {
                    return redirect()->back()->withInput()->with('error', 'file not selected...');
                }
                $file = new Productfile();



                $data[] = $this->productfileRepo->createProductfile($request->except('_method', '_token'), $fileNameToStore, $extension);
            }
            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'Product file Added'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Product file Not Added'
            ], 200);
        }

        // return redirect()->route('productfile.index')->with('success', ' file Added Successfull.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productfile = $this->productfileRepo->get($id);
        return view('productfile.show')->withProductfile($productfile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productfile = $this->productfileRepo->get($id);
        $prod = Productfile::find($id);
        return view('productfile.edit')->withProductfile($productfile)->with('prod', $prod);
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
        $files = $request->fileformate;

        foreach ($files as $file) {

            if ($request->hasFile('fileformate')) {

                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = time() . '.' . $extension;

                if (!(
                    (strcasecmp($extension, 'jpg') == 0) || (strcasecmp($extension, 'jpeg') == 0) || (strcasecmp($extension, 'pdf') == 0) || (strcasecmp($extension, 'png') == 0))) {
                    return redirect()->back()->withInput($request->input())->with('error', 'Please select valid file');
                }

                $destinationPath = public_path('files/product/files');
                $file->move($destinationPath, $fileNameToStore);
            } else {
                $fileNameToStore = Productfile::find($id)->fileformate;
            }
            $file = new Productfile();

            $file->fileformate = $fileNameToStore;


            $this->productfileRepo->updateProductfile($id, $request->except('_method', '_token'), $file->fileformate, $extension);
        }
        return redirect()->route('productfile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productfileRepo->deleteProductfile($id);
        return Redirect::back();
    }
}
