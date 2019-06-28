<?php

namespace App\Model\Productfile\Repositories;

use App\Model\Productfile\Repositories\Interfaces\ProductfileRepositoryInterface;
use App\Model\Productfile\Productfile;
use Jsdecena\Baserepo\BaseRepository;
use Auth;

class ProductfileRepository extends BaseRepository  implements ProductfileRepositoryInterface
{
    protected $model;

    public function __construct(Productfile $productfile)
    {

        parent::__construct($productfile);
        $this->model = $productfile;
    }

    public function  createProductfile($data, $img, $extension)
    {
        // dd($img);
        $data['fileformate'] = $img;
        $data['created_by'] = Auth::user()->id;
        $data['extension'] = $extension;

        // dd ($data);
        //        $data =implode(" ",$data);
        // dd($data['fileformate']);
        // $data['created_by'] = Auth::user()->id;
        return $this->create($data);

        // return $this->create([
        //     'fileformate'=>$data['fileformate'],
        //     'created_by'=>$data['created_by'],
        //     'status'=>$data['status'],
        //     'product_id'=>$data['product_id'],

        // ]);
    }
    public function updateProductfile($productfile_id, array $data, $aut)
    {
        $data['fileformate'] = $aut;
        $data['created_by'] = 1;
        $data['product_id'] = 1;
        //  $data['created_by'] = Auth::user()->id;
        Productfile::find($productfile_id)->update($data);
    }


    public function get($productfile_id): productfile
    {
        return Productfile::find($productfile_id);
    }
    // public function all()
    // {
    //     return Category::all();
    // }

    public function deleteProductfile($productfile_id)
    {
        Productfile::destroy($productfile_id);
    }
}
