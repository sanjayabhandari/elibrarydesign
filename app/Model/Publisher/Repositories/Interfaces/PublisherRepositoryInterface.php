<?php

namespace App\Model\Publisher\Repositories\Interfaces;

use App\Model\Publisher\Publisher;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface PublisherRepositoryInterface extends BaseRepositoryInterface
{
    public function createPublisher ($params);
    public function updatePublisher ($publisher_id,array $params);
    public function deletePublisher ($publisher_id);
    public function get ($publisher_id) : Publisher;
    // public function all ($publisher_id);

}
