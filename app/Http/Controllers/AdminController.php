<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Google\Service\Books\Category;

class AdminController extends Controller
{
    public function __construct()
{
    $this->middleware('auth:admins');
}
  
    function show_dashboard(){
         
            $user = Auth::user();
            $fullName = $user->full_name;
            $topPosts = News::orderBy('visitors', 'desc')->take(5)->get();
            return view('admin_views.dashboard')->with('fullName', $fullName)->with('topPosts', $topPosts);
    }
    function news(){
        $user = Auth::user();
        $fullName = $user->full_name;
        $news = News::all();
        $news = News::simplePaginate(5);
        return view('admin_views.news')->with('fullName', $fullName)->with('news', $news);
    }

    function show_public_procurements (){
        $user = Auth::user();
            $fullName = $user->full_name;
        return view('admin_views.public_procurement')->with('fullName', $fullName);
    }
    function show_add_news(){
        $user = Auth::user();
        $fullName = $user->full_name;
        $categories = Categories::all();
        return view('admin_views.add_news')->with('fullName', $fullName)->with('categories', $categories);
    }
    function store_news(Request $request){
        $user = Auth::user();
        $fullName = $user->full_name;
        $formfields= $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('public/images', $imageName);
            $imageRelativePath = str_replace('public/', '', $imagePath);
        } else {
            return redirect()->back()->with('error', 'No image selected.');
        }
       

        $news = new News();
        $news->title = $formfields['title'];
        $news->category_id = $formfields['category_id'];
        $news->image = $imageRelativePath;
        $news->content = $formfields['content'];
        $news->created_by = $fullName;
        $news->save();

        return redirect('/dashboard/news');

    }
    public function edit($id)
    {
        $user = Auth::user();
        $fullName = $user->full_name;
        $news = News::findOrFail($id);
         $date = Carbon::parse($news->created_at);
        $formattedDate = $date->format('d.m.Y');

        $categories = Categories::all();
         return view('admin_views.edit_news', [
        'news' => $news,
        'fullName' => $fullName,
        'formattedDate' => $formattedDate,
        'categories' => $categories, // Pass the categories to the view
    ]);
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
        ]);

        $news->title = $validatedData['title'];
        $news->category = $validatedData['category'];
        $news->content = $validatedData['content'];
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $imagePath = $image->storeAs('public/images', $imageName);
                $imageRelativePath = str_replace('public/', '', $imagePath);
                $news->image = $imageRelativePath;
            }
        $news->save();

        // Redirect or return a response as needed
        return redirect('/dashboard/news')->with('success', 'News updated successfully.');
    }


    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'News deleted successfully.');
    }

    function show_admins (){
        $user = Auth::user();
        $fullName = $user->full_name;
        $admins = Admin::all();

        return view('admin_views.admins')->with('fullName', $fullName)->with('admins', $admins);
    }

    public function search(Request $request)
    {
         $user = Auth::user();
        $fullName = $user->full_name;
        $query = $request->input('query');

        $news = News::where('title', 'like', "%$query%")->get();
        $noResults = $news->count() === 0;

        return view('admin_views.news_search', compact('news', 'noResults'))->with('fullName', $fullName);
    }

    function show_categories(){
         $user = Auth::user();
        $fullName = $user->full_name;

        $categories = Categories::all();
        return view('admin_views.category')->with('fullName', $fullName)->with('categories', $categories);
    }

    function add_categories(){
        $user = Auth::user();
        $fullName = $user->full_name;
        return view('admin_views.add_categories')->with('fullName', $fullName);

    }
    function store_categories(Request $request){
         $formfields= $request->validate([
            'category' => 'required'

        ]);
       
        $categories = new Categories();
        $categories->category = $formfields['category'];
        $categories->save();

        return redirect('/dashboard/categories');
    }
    function show_edit_categories($id){
         $categories = Categories::findOrFail($id);
         $user = Auth::user();
        $fullName = $user->full_name;
        return view('admin_views.show_edit_categories')->with('fullName', $fullName)->with('categories', $categories);
    }
    function edit_categories(Request $request, $id){

        $categories = Categories::findOrFail($id);
         $formfields= $request->validate([
            'category' => 'required'

        ]);
       
        $categories->category = $formfields['category'];
        $categories->save();

        return redirect('/dashboard/categories');
    }

    function destroy_categories($id){
        $categories = Categories::findOrFail($id);
        $categories->delete();

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'News deleted successfully.');
    }
  
}
