<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();

        return view('video.index', compact('videos'));
    }

    public function requestAccess(Video $video)
    {
        $exists = VideoRequest::where('user_id', auth()->id())
            ->where('video_id', $video->id)
            ->whereIn('status', ['pending', 'approved'])
            ->first();

        if ($exists) {
            return back()->with('error', 'Anda sudah memiliki request aktif.');
        }

        VideoRequest::create([
            'user_id'   => auth()->id(),
            'video_id'  => $video->id,
            'status'    => 'pending',
        ]);

        return back()->with('success', 'Permintaan akses berhasil dikirim.');
    }

    public function watch(Video $video)
    {
        $request = VideoRequest::where('user_id', auth()->id())
            ->where('video_id', $video->id)
            ->where('status', 'approved')
            ->whereNotNull('expires_at')
            ->where('expires_at', '>', now())
            ->first();

        if (!$request) {
            return redirect()->route('videos.index')
                ->with('error', 'Akses video belum aktif atau sudah berakhir.');
        }

        return view('video.watch', compact('video'));
    }

}
