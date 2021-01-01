<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Material;
use App\Models\User;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderByDesc('created_at')->get();

        if (request('search')) {
            $items = $items->filter(function ($item, $key) {
                if (stripos($item->name, request('search')) !== false) {
                    return true;
                }
                return false;
            });
        }

        if (request('order') === 'random') {
            $items = $items->shuffle();
        } else if (request('order') === 'price') {
            $items = $items->sortByDesc('price');
        }

        $cats = Category::all();
        return view('items.index', compact(['items', 'cats']));
    }
    public function itemsByCat(Category $category){
        $cats = Category::all();
        $items = Item::where('category_id', $category->id)->get();

        return view('items.index', compact(['items', 'cats']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('item-permission');

        $cats = Category::all();
        $materials = Material::all();
        return view('items.create', compact(['cats', 'materials']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('item-permission');

        $item = new Item();
        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->size = $request->input('size');
        $item->brand = $request->input('brand');

        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = 'img/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $item->image = $filePath;
        }

        // $item->user_id = User::pluck('id')->random();
        // $item->user_id = auth()->user()->id;
        $item->category_id = $request->input('category_id');

        $item->save();

        $item->materials()->attach($request->input('materials'));

        return redirect()->route('items.index')->with('success', "Your question has been saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $reviews = Review::where('item_id', $item->id)->orderByDesc('created_at')->get();

        return view('items.details', compact('item', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $this->authorize('item-permission');

        $cats = Category::all();
        $materials = Material::all();
        return view('items.edit', compact(['item', 'cats', 'materials']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $this->authorize('item-permission');

        $item->update($request->only('name', 'price','size','brand', 'category_id'));

        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = 'img/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $item->image = $filePath;
        }

        $item->save();

        $item->materials()->detach(Material::all());
        $item->materials()->attach($request->input('materials'));

        return redirect()->route('items.index')->with('success', "Your question has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $this->authorize('item-permission');

        $item->delete();
        return redirect()->route('items.index')->with('success', "Your question has been deleted");
    }
}
