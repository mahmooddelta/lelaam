<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Models\Category;
use App\Models\State;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Inertia\Response;
use function auth;
use function now;
use function to_route;

class WebsiteController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Index', [
            'categories' => Category::query()->select(['id', 'name', 'slug'])
                ->whereHas('children')
                ->with(['children' => fn($query) => $query->select(['id', 'name', 'slug', 'parent_id'])])
                ->withCount('ads')
                ->latest()
                ->get()
                ->map(function ($category) {
                    $category->setRelation('children', $category->children->take(5));

                    return $category;
                }),
            'ads' => AdResource::collection(Ad::query()->published()
                                                ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at', 'updated_at', 'id'])
                                                ->with('media')
                                                ->latest()
                                                ->take(40)
                                                ->get()),
        ]);
    }

    public function phoneUnverified(): Response
    {
        return Inertia::render('PhoneNotVerified');
    }

    public function phoneVerify(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'phone' => 'required|string|min:10|max:14|exists:users,phone',
            'phoneVerified' => ['nullable', 'boolean'],
        ])->validate();

        auth()->user()->update(['phone_verified_at' => $request->phoneVerified === true ? now() : null,]);

        return to_route('account');
    }
}
