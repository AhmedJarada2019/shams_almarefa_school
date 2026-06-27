<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\JabMember;
use App\Models\Offer;
use App\Models\Sitting;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function home()
    {
        $sittings = Sitting::first();
        $jab_members = JabMember::get();
        $last_articles = Article::latest()->take(4)->get();
        $offers = Offer::get();
        return view('index', compact('sittings', 'jab_members', 'last_articles', 'offers'));
    }

    public function Presidents_speech()
    {
        $sittings = Sitting::first();
        return view('Presidents_speech', compact('sittings'));
    }

    public function all_articles()
    {
        $articles = Article::get();
        $sittings = Sitting::first();
        return view('all_articles', compact('articles', 'sittings'));
    }

    public function single_article($id)
    {
        $article = Article::findOrFail($id);
        $sittings = Sitting::first();
        $last_articles = Article::latest()->take(5)->get();
        return view('single_article', compact('article', 'sittings', 'last_articles'));
    }

    public function setLocale($locale)
    {
        if (array_key_exists($locale, config('app.available_locales', []))) {
            session(['locale' => $locale]);
            return redirect()->route('home');
        }
        return response()->json(['success' => false]);
    }
}
