<?php

namespace App\Model\Product\Repositories;

use App\Model\Product\Product;
use App\Model\Product\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepository;

use Auth;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected $model;

    /**
     * AddressRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        parent::__construct($product);
        $this->model = $product;
    }


    /**
     * Create the Dealer
     *
     * @param array $data
     *
     * @return Product
     * @throws CreateProductErrorException
     */


    public function createProduct($data, $image)
    {

        //$data['created_by'] = 1;
        $data['created_by'] = Auth::user()->id;
        $data['image'] = $image;
        return $this->create($data);
    }

    public function updateProduct($product_id, array $data, $image)
    {
        // $data['created_by'] = 1;
        $data['created_by'] = Auth::user()->id;
        $data['image'] = $image;
        Product::find($product_id)->update($data);
    }


    public function get($product_id): product
    {
        return Product::find($product_id);
    }


    public function deleteproduct($product_id)
    {
        Product::destroy($product_id);
    }
}
