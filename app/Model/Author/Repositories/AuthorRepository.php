<?php

namespace App\Model\Author\Repositories;

use App\Model\Author\Author;
use App\Model\Author\Repositories\Interfaces\AuthorRepositoryInterface;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepository;

use Auth;

class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{
    protected $model;

    /**
     * AddressRepository constructor.
     * @param Author $author
     */
    public function __construct(Author $author)
    {
        parent::__construct($author);
        $this->model = $author;
    }


    /**
     * Create the Dealer
     *
     * @param array $data
     *
     * @return Cateogry
     * @throws CreateCateogryErrorException
     */


    public function createAuthor($data, $img)
    {
        $data['image'] = $img;
        //$data['created_by'] = 1;
        $data['created_by'] = Auth::user()->id;
        return $this->create($data);
    }

    public function updateAuthor($author_id, array $data, $aut)
    {

        $data['image'] = $aut;
        //$data['created_by'] = 1;
        $data['created_by'] = Auth::user()->id;
        return Author::find($author_id)->update($data);
    }


    public function get($author_id): Author
    {
        return Author::find($author_id);
    }
    // public function all()
    // {
    //     return Category::all();
    // }

    public function deleteAuthor($author_id)
    {
        Author::destroy($author_id);
    }



    // public function gLevel($a) : Collection
    // {

    //     return Author::Where('level',$a)->get();
    //     //  return  Category::where('level', '=', $no)->get();
    // }
}
