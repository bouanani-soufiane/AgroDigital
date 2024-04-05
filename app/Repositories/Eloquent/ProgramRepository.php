<?php

namespace App\Repositories\Eloquent;

use App\Models\Program;
use App\Repositories\ProgramRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class ProgramRepository.
 */
class ProgramRepository extends BaseRepository implements ProgramRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Program $model
     */
    public function __construct(Program $model)
    {
        parent::__construct($model);
    }
}
