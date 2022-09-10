<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdReport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdReportsController extends Controller
{
    public function store(Ad $ad, Request $request): RedirectResponse
    {
        $request->validate(
            [
                'type' => 'required|exists:report_types,id',
                'description' => 'required',
            ]);

        $ad->reports()->create(
            [
                'user_id' => auth()->id(),
                'report_type_id' => $request->input('type'),
                'description' => $request->input('description'),
            ]);

        return back()->with([
            'type' => 'success',
            'body' => 'گزارش تخلف یا مشکل شما ارسال شد. لطفاً منتظر بررسی مدیر سایت باشید!',
        ]);
    }

    public function show(AdReport $adReport)
    {
        //
    }

    public function update(Request $request, AdReport $adReport)
    {
        //
    }

    public function destroy(AdReport $adReport)
    {
        //
    }
}
