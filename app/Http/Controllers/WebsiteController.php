<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use function auth;
use function back;
use function now;
use function redirect;

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
        $validated = $request->validate(
            [
                'phone' => 'required|string|min:10|max:14|unique:users,phone',
                'phoneVerified' => ['nullable', 'boolean'],
            ]);

        if (! isset(auth()->user()->phone)) {
            if (auth()->user()->hasVerifiedPhone()) {
                return back()->with([
                                        'type' => 'error',
                                        'body', 'شماره تماس کاربر از قبل تایید شده است!',
                                    ]);
            }

            if (auth()->user()->phone !== $validated['phone']) {
                return back()->with([
                                        'type' => 'error',
                                        'body', 'شماره تماس وارد شده، اشتباه است!',
                                    ]);
            }

            auth()
                ->user()
                ?->update(['phone_verified_at' => $validated['phoneVerified'] === true ? now() : null]);
        } else {
            auth()
                ->user()
                ?->update(['phone' => $validated['phone'], 'phone_verified_at' => $validated['phoneVerified'] === true ? now() : null]);
        }

        return redirect()->intended('account');
    }
}
