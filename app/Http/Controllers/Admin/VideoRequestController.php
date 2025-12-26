<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoRequest as VideoRequest;


class VideoRequestController extends Controller
{
    public function index()
    {
        return view('admin.requests.index', [
            'requests' => VideoRequest::with('user', 'video')->latest()->get()
        ]);
    }

    public function approve(Request $request, VideoRequest $requestVideo)
    {
        $requestVideo->update([
            'status' => 'approved',
            'approved_at' => now(),
            'expires_at' => now()->addHours($request->hours)
        ]);

        return back()->with('success', 'Akses disetujui');
    }


    public function reject(VideoRequest $requestVideo)
    {
        $requestVideo->update([
            'status' => 'rejected'
        ]);

        return back();
    }
}

