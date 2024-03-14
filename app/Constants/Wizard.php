<?php

namespace App\Constants;

interface Wizard
{
    public const STEP_DEFAULT = 1;

    public const STEP_CREATED_PROJECT = 2;

    public const STEP_LABELS = ['project', 'requirements', 'features', 'results'];
}
