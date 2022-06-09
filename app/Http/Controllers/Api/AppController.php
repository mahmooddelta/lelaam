<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\ReportType;
use App\Models\State;

class AppController extends Controller
{
    public function districts(State $state)
    {
        return $state->exists ? District::select(['id', 'name'])
            ->where('state_id', $state->id)
            ->get() : [];
    }

    public function states()
    {
        return State::select(['id', 'name'])->get();
    }

    public function reportTypes()
    {
        return ReportType::select(['id', 'name'])->active()->get();
    }
}
