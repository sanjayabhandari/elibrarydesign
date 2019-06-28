<?php

namespace App\Model\Author\Repositories\Interfaces;

use App\Model\Author\Author;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface AuthorRepositoryInterface extends BaseRepositoryInterface
{
        public function createAuthor( $params, $img);
        public function updateAuthor($author_id, array $params,$aut);
        public function deleteAuthor($author_id);
        public function get($author_id):Author;
        // public function gLevel($a):Collection;
 //   public function update($Author_id, array $Author_data):Author;
    // public function all();
}
