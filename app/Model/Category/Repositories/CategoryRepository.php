<?php

namespace App\Model\Category\Repositories;

use App\Model\Category\Category;
use App\User;
use App\Model\Category\Exceptions\CreateCategoryErrorException;
use App\Model\Category\Exceptions\CategoryNotFoundException;
use App\Model\Category\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Model\Category\Transformations\CategoryTransformable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepository;
use Auth;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    // use CategoryTransformable;
    protected $model;

    /**
     * AddressRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        parent::__construct($category);
        $this->model = $category;
    }


    /**
     * Create the Dealer
     *
     * @param array $data
     *
     * @return Cateogry
     * @throws CreateCateogryErrorException
     */

    public function imgUpload($request)
    {
        // if ($data->hasFile('image')){
        //     $extension = $data->file('image')->getClientOriginalExtension();
        //     $fileNameToStore =time() . '.' . $extension;
        //     if (!(
        //         (strcasecmp($extension, 'jpg') == 0) ||
        //         (strcasecmp($extension, 'jpeg') == 0) ||
        //         (strcasecmp($extension, 'png') == 0)

        //     )) {
        //         return "valid file not selected";
        //     }

        //     $file = $data->file('image');
        //     $destinationPath = public_path('image');
        //     $file->move($destinationPath, $fileNameToStore);
        // } else {
        //     return "image not selected";
        // }

        // $data['image'] = $fileNameToStore;
    }

    public function uploadIsValid($request)
    {
        foreach ($request->file('iamge') as $file) {
            if (!$file->isValid()) {
                return false;
            }
        }

        return true;
    }
    public function createCategory($data, $img)
    {

        $data['image'] = $img;
        $data['created_by'] = Auth::user()->id;
        return $this->create($data);
    }

    public function updateCategory($category_id, array $data, $cat)
    {
        $data['image'] = $cat;
        $data['created_by'] = Auth::user()->id;
        Category::find($category_id)->update($data);
    }


    public function get($category_id): Category
    {
        return Category::find($category_id);
    }
    // public function all()
    // {
    //     return Category::all();
    // }

    public function deleteCategory($category_id)
    {
        Category::destroy($category_id);
    }
    // public function update($category_id, array $category_data)
    // {
    //     Category::find($category_id)->update($category_data);
    // }


    public function gLevel($a): Collection
    {

        return Category::Where('level', $a)->get();
        //  return  Category::where('level', '=', $no)->get();
    }
}
