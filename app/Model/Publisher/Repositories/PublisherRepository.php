<?php

namespace App\Model\Publisher\Repositories;

use App\Model\Publisher\Publisher;
use App\Model\Publisher\Repositories\Interfaces\PublisherRepositoryInterface;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepository;
use Auth;
class PublisherRepository extends BaseRepository implements PublisherRepositoryInterface
{
    protected $model;

    /**
     * AddressRepository constructor.
     * @param Publisher $publisher
     */
    public function __construct(Publisher $publisher)
    {
        parent::__construct($publisher);
        $this->model = $publisher;

    }


    /**
     * Create the Dealer
     *
     * @param array $data
     *
     * @return Cateogry
     * @throws CreateCateogryErrorException
     */


    public function createPublisher( $data)
    {
        // $data['fileformate'] = $file;

        //$data['created_by'] = 1;
         $data['created_by'] = Auth::user()->id;
        return $this->create($data);

    }

    public function updatePublisher($publisher_id,array $data)
    {
       // $data['created_by'] = 1;
         $data['created_by'] = Auth::user()->id;
          return  Publisher::find($publisher_id)->update($data);
    }


    public function get($publisher_id) : Publisher
    {
        return Publisher::find($publisher_id);
    }
    // public function all()
    // {
    //     return Category::all();
    // }

    public function deletePublisher($publisher_id)
    {
        return Publisher::destroy($publisher_id);
    }

}
