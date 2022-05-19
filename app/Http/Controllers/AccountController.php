<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Models\State;
use Illuminate\Http\Request;
use Inertia\Inertia;
use function back;
use function session;

class AccountController extends Controller
{
    public function index()
    {
        return Inertia::render('Account', [
            'ads' => AdResource::collection(Ad::isOwner()
                                                ->with('media')
                                                ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at', 'id'])
                                                ->latest()
                                                ->get()),
            'states' => State::select(['id', 'name'])->get(),
        ]);
    }
}
