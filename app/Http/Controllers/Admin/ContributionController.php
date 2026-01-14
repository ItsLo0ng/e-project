<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContributionController extends Controller
{
    public function index()
    {
        $contributions = Contribution::with('user')->get();
        return view('admin.contributions.index', compact('contributions'));
    }

    public function approve($id)
    {
        $contribution = Contribution::findOrFail($id);
        $contribution->status = 'approved';
        $contribution->save();
        return back()->with('success', 'Duyệt thành công!');
    }

    public function reject($id)
    {
        $contribution = Contribution::findOrFail($id);
        $contribution->status = 'rejected';
        $contribution->save();
        return back()->with('success', 'Từ chối!');
    }

    public function destroy($id)
    {
        $contribution = Contribution::findOrFail($id);
        Storage::delete('public/' . $contribution->image_path);
        $contribution->delete();
        return back()->with('success', 'Xóa thành công!');
    }
}