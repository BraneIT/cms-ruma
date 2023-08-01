<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class NewsController extends Controller
{


function get_news(Request $request) {
    $news = News::select('news.*', 'categories.category as category_name')
                ->join('categories', 'news.category_id', '=', 'categories.id')
                ->paginate(7);
    
    $newsCountByCategory = News::select('categories.id as category_id','categories.category as category_name', DB::raw('COUNT(*) as news_count'))
                               ->join('categories', 'news.category_id', '=', 'categories.id')
                               ->groupBy('categories.id', 'categories.category')
                               ->get();
    $categories = Categories::all();
    
   
    $cookieName = 'site_visits';

    // Check if the cookie exists
     if ($request->hasCookie($cookieName)) {
        // User has the cookie, indicating a previous visit to the site
        // No action needed in this case
    } else {
        // User does not have the cookie, indicating a new visit to the site
        

        // Create and set the cookie with expiration time at 23:59
        $cookieValue = 1;
        // Set expiration to 23:59 of the current day
        $cookieExpiration = now()->endOfDay()->timestamp; 
        $cookie = Cookie::make($cookieName, $cookieValue, $cookieExpiration);
         // Increment the total_users count in the database
        DB::table('statistics')->increment('total_users');
        return response()
            ->view('frontend_views.vesti', ['news' => $news])
            ->cookie($cookie);
    }
   


    // Continue with the rest of your code for returning the news view
    return view('frontend_views.vesti', ['news' => $news, 'categories' => $categories, 'count'=>$newsCountByCategory]);


    }

    function show_news($id)
    {
        $newsItem = News::findOrFail($id);
         // Increment the visitors count
        $newsItem->increment('visitors');

        return view('frontend_views.news_show', ['newsItem' => $newsItem]);
    }

  

      public function showNewsByCategory($categoryId)
    {
        $newsItems = DB::table('news')
        ->join('categories', 'news.category_id', '=', 'categories.id')
        ->select('news.*', 'categories.category as category_name')
        ->where('news.category_id', '=', $categoryId)
        ->paginate(7);

        // Find the category by its id
        $category = Categories::find($categoryId);
         $newsCountByCategory = News::select('categories.id as category_id','categories.category as category_name', DB::raw('COUNT(*) as news_count'))
                               ->join('categories', 'news.category_id', '=', 'categories.id')
                               ->groupBy('categories.id', 'categories.category')
                               ->get();

        // If category doesn't exist, you may want to return an error or redirect
        if (!$category) {
            // return error or redirect, this is up to you.
            return redirect()->back()->withErrors('Category not found.');
        }

        // If the category exists, get all the related news
        $news = $category->news;

        // Return the news to the view
        return view('frontend_views.kategorija', ['news' => $news, 'count' => $newsCountByCategory, 'newsItems' => $newsItems]);
    }
}
