<?php

namespace App\Model\Productfile\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Model\Productfile\Productfile;

interface ProductfileRepositoryInterface extends  BaseRepositoryInterface
{
    public function createProductfile($params, $img, $extension);
    public function updateProductfile($productfile_id, array $params, $aut);
    public function deleteProductfile($productfile_id);
    public function get($productfile_id): Productfile;
}
