<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * @var $projectService
     */
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        return Inertia::render('Projects/Index', [
            'projects' => Project::latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Projects/Create');
    }

    public function show()
    {
        return Inertia::render('Projects/Show');
    }
}
