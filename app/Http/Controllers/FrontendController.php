<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category\Category;
use App\Model\Product\Product;
use App\Model\Blog\Blog;
use App\MediaType;
use App\Model\Productfile\Productfile;

class FrontendController extends Controller
{
    public function index()
    //for homepage
    {
        $blogs = Blog::where('status', 1)->latest()->get();
        $media = MediaType::where('status', 1)->get();
        $category = Category::where(['status' => 1, 'level' => 0])->get();
        $featuredcategory = Category::where(['status' => 1, 'level' => 1])->oldest()->get();
        $trendingcat = Product::where(['status' => 1])->latest()->limit(6)->get();


        return (view('index/index', compact('category', 'blogs', 'media', 'featuredcategory', 'trendingcat')));
    }

    public function allcategory($id)
    {
        $media = MediaType::where('status', 1)->get();

        $category = Category::where(['status' => 1, 'level' => 0])->get();
        $checkedcat = Category::find($id);
        $subcategory = Category::where(['status' => 1, 'level' => 1, 'parent' => $id])->get();

        // return $category;

        return view('category.category', compact('subcategory', 'category', 'media', 'checkedcat'));
    }


    public function showsubcategoryproduct($id)
    {
        $media = MediaType::where('status', 1)->get();

        $category = Category::where(['status' => 1, 'level' => 0])->get();
        $checkedcat = Category::find($id);
        $subcategory = Category::where(['status' => 1, 'level' => 1, 'id' => $id])->with(['activeproducts'])->get();

        return view('category.category', compact('subcategory', 'category', 'media', 'checkedcat'));
    }


    public function showproduct(Request $request)
    {
        $product = Product::where(['status' => 1, 'category_id' => $request->id])->get();
        return Response()->json($product);
    }








    public function showbook($id)
    {
        $category = Category::where(['status' => 1, 'level' => 0])->get();
        $media = MediaType::where('status', 1)->get();
        $product = Product::where('id', $id)->with(['pdffile', 'category', 'author', 'publisher', 'language', 'media', 'activereviews', 'activereviews.user'])->get();
        $relatedproduct = Product::where(['category_id' => $product[0]->category_id, 'status' => 1])->where('id', '!=', $id)->with('pdffile')->take(8)->get();


        return view('subcategory.subcategory', compact('product', 'media', 'category', 'relatedproduct'));
    }



    public function searchproduct(Request $request)
    {
        $category = Category::where('cat_name', 'LIKE', '%' . $request->search . '%')->with('activeproducts', 'activeproducts.author', 'activeproducts.category')->get();

        $product = Product::where('title', 'LIKE', '%' . $request->search . '%')->where('status', 1)->with('author', 'category')->get();

        $data = $category->merge($product);
        return $data;
    }


    public function searchresult($search)
    {

        $category = Category::where('cat_name', 'LIKE', '%' . $search . '%')->with('activeproducts')->get();

        $product = Product::where('title', 'LIKE', '%' . $search . '%')->where('status', 1)->get();


        $data = $category->merge($product);
        return view('search.search', compact('data', 'search'));
    }

    public function blogdetail($id)
    {
        $blog = Blog::find($id);
        //dd($blog->toArray());
        $relatedblog = Blog::where('id', '!=', $id)->limit(5)->get();
        // dd($relatedblog->toArray());
        return view('blog.blog', compact('blog', 'relatedblog'));
    }


    public function readbook(Request $request)
    {
        $productfile = Product::find($request->id)->pdffile;
        if ($productfile != "") {
            return Response()->json($productfile->fileformate);
        } else {
            return Response()->json('nodata');
        }

        // $files = array();
        // foreach ($productfile[0]->files as $file) {
        //     $extension = explode(".", $file->fileformate)[1];
        //     if ($extension === "pdf") {
        //         $files[] = $file->fileformate;
        //     }
        // }

        // if (count($files) > 0) {
        //     $latest = count($files) - 1;
        //     return Response()->json($files[$latest]);
        // } else {
        //     return Response()->json('nodata');
        // }
    }

    //
}
