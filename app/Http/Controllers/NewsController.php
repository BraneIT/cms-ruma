<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class NewsController extends Controller
{


function get_news(Request $request) {
    $news = News::all();
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
            ->view('frontend_views.blog-default', ['news' => $news])
            ->cookie($cookie);
    }

    // Continue with the rest of your code for returning the news view
    return view('frontend_views.blog-default', ['news' => $news]);


    }
    function show_news($id)
    {
        $newsItem = News::findOrFail($id);
         // Increment the visitors count
        $newsItem->increment('visitors');

        return view('frontend_views.news_show', ['newsItem' => $newsItem]);
    }
}
