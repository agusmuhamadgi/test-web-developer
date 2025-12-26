<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video as Video;
use App\Models\VideoRequest as VideoRequest;
use Carbon\Carbon;

class VideoController extends Controller
{
    public function index()
    {
        return view('admin.videos.index', [
            'videos' => Video::all()
        ]);
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        Video::create($request->all());
        return redirect()->route('admin.videos.index');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $video->update($request->all());
        return redirect()->route('admin.videos.index');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('admin.videos.index');
    }
}
