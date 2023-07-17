<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class NewsController extends Controller
{


function get_news(Request $request) {
    $news = News::all();
    $news = News::paginate(7);
    // $categories = News::distinct('category')->pluck('category');
    $categories = DB::table('news')
                ->select('category', DB::raw('COUNT(*) as post_count'))
                ->groupBy('category')
                ->orderByDesc('post_count')
                ->get();
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
    return view('frontend_views.vesti', ['news' => $news, 'categories' => $categories]);


    }

    function show_news($id)
    {
        $newsItem = News::findOrFail($id);
         // Increment the visitors count
        $newsItem->increment('visitors');

        return view('frontend_views.news_show', ['newsItem' => $newsItem]);
    }

    function showByCategory($category)
    {

          $news = News::where('category', function ($query) use ($category) {
        $query->where('category', $category);
    })->get();

        return view('frontend_views.kategorija', ['news' => $news]);
    }
}
