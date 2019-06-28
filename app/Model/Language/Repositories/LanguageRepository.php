<?php

namespace App\Model\Language\Repositories;

use App\Model\Language\Language;

use App\Model\Language\Repositories\Interfaces\LanguageRepositoryInterface;

use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepository;
use Auth;

class LanguageRepository extends BaseRepository implements LanguageRepositoryInterface
{
    protected $model;

    /**
     * AddressRepository constructor.
     * @param Language $language
     */
    public function __construct(Language $language)
    {
        parent::__construct($language);
        $this->model = $language;
    }


    /**
     * Create the Dealer
     *
     * @param array $data
     *
     * @return Language
     * @throws CreateLanguageErrorException
     */

    public function createLanguage($data)
    {

        $data['created_by'] = Auth::user()->id;
        return $this->create($data);
    }

    public function updateLanguage($language_id, array $data)
    {
        $data['created_by'] = Auth::user()->id;
        Language::find($language_id)->update($data);
    }


    public function get($language_id): Language
    {
        return Language::find($language_id);
    }


    public function deleteLanguage($language_id)
    {
        Language::destroy($language_id);
    }
}
