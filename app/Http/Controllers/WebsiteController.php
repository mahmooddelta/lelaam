<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Http\Resources\CategoryResource;
use App\Models\Ad;
use App\Models\Category;
use Config;
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
    public function index()
    {
        $categories = Category::query()->select(['id', 'name', 'slug', 'icon'])
            ->whereHas('children')
            ->with(['children' => fn ($query) => $query->select(['id', 'name', 'slug', 'icon', 'parent_id'])])
            ->withCount(['ads' => fn ($query) => $query->published()])
            ->orderByDesc('ads_count')
            ->take(4)
            ->get()
            ->map(function ($category) {
                $category->setRelation('children', $category->children->take(5));

                return $category;
            });

        $ads = Ad::query()->published()
            ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at', 'updated_at', 'id'])
            ->with('media')
            ->latest()
            ->take(40)
            ->get();

        return Inertia::render('Index', [
            'categories' => CategoryResource::collection($categories),
            'ads' => AdResource::collection($ads),
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
                'phone' => 'required|string|min:10|max:14',
                'phoneVerified' => ['nullable', 'boolean'],
            ]
        );

        if (!isset(auth()->user()->phone)) {
            if (auth()->user()->hasVerifiedPhone()) {
                return back()->with([
                    'type' => 'error',
                    'body' => 'شماره تماس کاربر از قبل تایید شده است!',
                ]);
            }

            if (auth()->user()->phone !== $validated['phone']) {
                return back()->with([
                    'type' => 'error',
                    'body' => 'شماره تماس وارد شده، اشتباه است!',
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

    public function about(): Response
    {
        return Inertia::render('Others/About', [
            'text' => Config::get('settings.website_about'),
        ]);
    }

    public function contact(): Response
    {
        return Inertia::render('Others/Contact', [
            'phone' => Config::get('settings.default_phone_number'),
            'email' => Config::get('settings.default_email'),
        ]);
    }

    public function privacy(): Response
    {
        return Inertia::render('Others/Privacy', [
            'text' => Config::get('settings.website_privacy_text'),
        ]);
    }

    public function terms(): Response
    {
        return Inertia::render('Others/TermsAndConditions', [
            'text' => Config::get('settings.website_terms_text'),
        ]);
    }
}
