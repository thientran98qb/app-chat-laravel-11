<?php

namespace App\Services;

use App\Repositories\ProjectRepository;

class ProjectService implements ProjectServiceInterface {
    protected $projectRepository;

    /**
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function getLists()
    {

    }
}
