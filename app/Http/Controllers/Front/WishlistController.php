<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function delete($id)
    {
        Wishlist::where('id', $id)->delete();
        return redirect()->route('wishlist');
    }

    public function deleteAll()
    {
        Wishlist::where('user_id', auth()->id())->delete();
        return redirect()->route('wishlist');
    }
}
