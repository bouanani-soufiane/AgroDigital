<?php

namespace App\Repositories\Eloquent;

use App\Models\Maladie;
use App\Repositories\MaladieRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class MaladieRepository.
 */
class MaladieRepository extends BaseRepository implements MaladieRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Maladie $model
     */
    public function __construct(Maladie $model)
    {
        parent::__construct($model);
    }
}
