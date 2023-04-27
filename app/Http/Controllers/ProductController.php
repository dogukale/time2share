<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Borrow;
use App\Models\User;
use App\Models\Review;
use Auth;
use DB;

class ProductController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            return view('products.index', [
                'product' => Product::all()->where('owner', '!=', $user_id)->where('loaned', '==', false),
            ]);
        } else {
            return view('products.index', [
                'product' => Product::all()->where('loaned', '==', false),
            ]);
        }
    }

    public function show($id) {
        return view('products.show',[
            'product' => Product::find($id),
        ]);
    }

    public function create() {
        return view('products.create', [
            'category' => Category::all(),
        ]);
    }

    public function store(Request $request, Product $product) {
        if ($request->hasFile('image')) {
            $product->name = $request->input('name');
            $product->category = $request->input('category');
            $product->description = $request->input('description');
            $product->img_name = $request->file('image')->getClientOriginalName();
            $product->img_path = $request->input('image', '/uploads/' . $product->img_name);

            $path = $request->file('image')->move('./uploads', $product->img_name);

            $product->deadline = $request->input('deadline');
            $product->owner = Auth::user()->id;
        
            $product->save();

            return redirect('/my-products');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Geen Laravel functienamen
    |--------------------------------------------------------------------------
    */

    public function categories() {
        try {
            return view('category', [
                'product' => Product::all(),
                'category' => Category::all()
            ]);
        } catch (Exception $e) {
            return redirect('/category');
        }
    }

    public function category($category, Request $request) {
        $url = "product/filter/" . $category;

        return view('products.index',[
            'url' => $url,
            'product' => Product::where('category', '=', $category)->get(),
            'category' => Product::where('category', '=', $category)->get()->first(),
        ]);
    }
    
    public function ownedProducts() {
        $user_id = Auth::user()->id;
        return view('products.index', [
            'product' => Product::all()->where('owner', $user_id)->where('loaned', '==', false),
            'accept' => Product::all()->where('owner', $user_id)->where('loaned', '==', true),
        ]);
    }

    public function loanedProducts() {
        $user = Auth::user()->id;
        $allProducts = DB::table('products')->join('borrow', 'products.id', '=', 'borrow.id')->get();
        $loanedProduct = $allProducts->where('loaned', '==', true)->where('borrower', '==', $user);
        
        return view('products.index', [
            'product' => $loanedProduct,
        ]);
    }

    public function loaning($id, Borrow $loan, Product $product) {
        $loan->id = Product::find($id)->id;
        $loan->borrower = Auth::user()->id;
        $loan->owner = Product::find($id)->owner;
        $loan->save();

        $product = Product::find($id);
        $product->loaned = true;
        $product->save();

        return redirect('/loaned');
    }

    public function returnProduct($id){
        $id = Borrow::find($id)->id;
        DB::update('UPDATE borrow SET at_borrower = false WHERE id = ?', [$id]);

        return redirect('/loaned');
    }

    public function returnAccepted($id) {
        DB::table('borrow')->where('id', '=', $id)->delete();
        DB::update('UPDATE products SET loaned = false WHERE id = ?', [$id]);

        return view('products.index');
    }

    public function userProfile($id) {
        return view('user.user', [
            'product' => Product::all()->where('owner', '=', $id)->where('loaned', '==', false),
            'user' => User::where('id', '=', $id)->get()->first(),
            'review' => Review::all()->where('user_id', '=', $id)
        ]);
    }

    public function userReview($id) {
        return view('user.reviewForm', [
            'user' => User::where('id', '=', $id)->get()->first()
        ]);
    }

    public function userReviewed(Request $request, Review $review, $id){
        $review->user_id = $id;
        $review->review_by = Auth::user()->name;
        $review->name = $request->input('name');
        $review->description = $request->input('description');
        $review->score = $request->input('score');
        
        try {
            $review->save();
            return redirect('/my-products');
        } catch(Exception $e) {
            return redirect('/my-products');
        }
    }

    public function loanedAll() {
        return view('products.index', [
            'product' => Product::all()->where('loaned', '==', true),
            'user' => Auth::user()->id
        ]);
    }

    public function loanedDelete($id) {
        DB::update('UPDATE products SET loaned = false WHERE id = ?', [$id]);
        return redirect('/all/loaned');
    }

    public function usersAll() {
        $user = Auth::user()->name;
        return view('user.users', [
            'user' => User::all()->where('blocked', '=', false)
        ]);
    }

    public function usersDisable($id) {
        DB::update('UPDATE users SET blocked = true WHERE id = ?', [$id]);
        return redirect('/all/users');
    }
}
