<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository extends BaseRepository {

    /**
     * @var $model
     */
    protected $model;

    public function __construct(Project $project)
    {
        $this->model = $project;
    }
}
