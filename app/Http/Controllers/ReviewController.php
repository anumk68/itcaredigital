<?php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'required|string|max:1000',
        ]);

        Review::create([
            'user_id'    => Auth::guard('user')->user()->id,
            'package_id' => $request->package_id,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
            'status'    => '0',
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    public function reviews_list()
    {
         $data = Review::with('package', 'user')->get();
        return view('admin.reviews.list', compact('data'));
    }
    public function reviews_delete($id)
    {
        $data = Review::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Review deleted successfully!');
    }
    public function reviewsStatusUpdate($id)
    {
        $review         = Review::findOrFail($id);
        $review->status = ! $review->status;
        $review->save();

        return back()->with('success', 'Status updated successfully.');
    }
    
    public function updateDate(Request $request, $id)
{
    $request->validate([
        'created_at' => 'required|date',
    ]);
 
    $item = Review::findOrFail($id);
    $item->created_at = $request->created_at;
    $item->save();
 
    return response()->json([
        'success' => 'Date updated success',
        'new_date' => \Carbon\Carbon::parse($item->created_at)->format('M d, Y'),
    ]);
}

}
