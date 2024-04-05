<?php

namespace App\Http\Controllers;

use App\Services\Court\CourtService;
use Inertia\Inertia;

class CourtController extends Controller
{
    public function __construct(public CourtService $courtService) {}

    public function index()
    {
        $courts = $this->courtService->getLists();

        return Inertia::render('Courts/Index', ['courts' => $courts]);
    }
}
