<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $visitorCount = Session::get('visitor_count', 0);
        Session::put('visitor_count', $visitorCount + 1);

        // Load ảnh đã duyệt để hiển thị gallery
        $galleryData = Contribution::where('status', 'approved')->get();

        return view('pages.home', compact('visitorCount', 'galleryData'));
    }

    public function contribute(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để gửi ảnh!');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'history' => 'required|string',
        ]);

        $path = $request->file('image')->store('contributions', 'public');

        Contribution::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'category' => $request->category,
            'image_path' => $path,
            'description' => $request->description,
            'history' => $request->history,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Ảnh đã gửi, chờ admin duyệt!');
    }

    public function feedback(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $existing = Storage::exists('feedback.json') ? json_decode(Storage::get('feedback.json'), true) : [];
        $existing[] = $request->only('name', 'email', 'message');
        Storage::put('feedback.json', json_encode($existing));

        return back()->with('success', 'Phản hồi đã gửi!');
    }
}