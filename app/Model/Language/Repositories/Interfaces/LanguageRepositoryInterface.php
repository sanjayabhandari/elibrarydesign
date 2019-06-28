<?php

namespace App\Model\Language\Repositories\Interfaces;

use App\Model\Language\Language;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface LanguageRepositoryInterface extends BaseRepositoryInterface
{

public function createLanguage($params);
public function updateLanguage($language_id, array $params);
public function get($language_id) : Language;
public function deleteLanguage($language_id);

}

