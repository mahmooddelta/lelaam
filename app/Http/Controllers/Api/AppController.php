<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\District;
use App\Models\ReportType;
use App\Models\State;
use Illuminate\Support\Collection;
use LaravelIdea\Helper\App\Models\_IH_District_C;

class AppController extends Controller
{
    public function districts(State $state): array|\Illuminate\Database\Eloquent\Collection|Collection|_IH_District_C
    {
        return $state->exists ? District::select(['id', 'name'])
            ->where('state_id', $state->id)
            ->get() : [];
    }

    public function states(): array|\Illuminate\Database\Eloquent\Collection|Collection|\LaravelIdea\Helper\App\Models\_IH_State_C
    {
        return State::select(['id', 'name'])->get();
    }

    public function reportTypes(): \Illuminate\Database\Eloquent\Collection|\LaravelIdea\Helper\App\Models\_IH_ReportType_C|array
    {
        return ReportType::select(['id', 'name'])->active()->get();
    }

    public function currencies()
    {
        return Currency::active()->select(['id', 'name', 'symbol'])->get();
    }
}
