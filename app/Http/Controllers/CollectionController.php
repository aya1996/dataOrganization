<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\ErrorHandler\Collecting;

class CollectionController extends Controller
{
    public $posts;

    public function __construct()
    {
        $json = Http::get('https://www.reddit.com/r/MechanicalKeyboards.json')->json();
        $this->posts = collect($json['data']['children']);
    }

    public function index()
    {
        return view('collections.index')->with('posts', $this->posts);
    }

    public function filter()
    {
        $posts = $this->posts->filter(function ($post, $key) {
            if ($post['data']['post_hint'] != 'image') {
                return false;
            }
            return \Str::contains($post['data']['url'], 'i.redd.it');
        });
        return view('collections.filter')->with('posts', $this->posts);
    }

    public function pluck()
    {
        $images = $this->posts->filter(function ($post, $key) {
            if ($post['data']['post_hint'] != 'image') {
                return false;
            }
            return \Str::contains($post['data']['url'], 'i.redd.it');
        })
            ->pluck('data.url')
            ->all();
        return view('collections.pluck')->with('images', $images);
    }

    public function contains()
    {
        if (!$this->posts->contains(key: 'data.post_hint', operator: 'image')) {
            return view('collections.contains-empty');
        }
        $images = $this->posts->filter(function ($post, $key) {
            if ($post['data']['post_hint'] != 'image') {
                return false;
            }
            return \Str::contains($post['data']['url'], 'i.redd.it');
        })
            ->pluck('data.url')
            ->all();
        return view('collections.contains')->with('images', $images);
    }

    public function groupby()
    {
        $posts = $this->posts->filter(function ($post, $key) {

            return in_array($post['data']['post_hint'], ['self', 'image']);
        })
            ->groupby('data.post_hint')
            ->toArray();
        return view('collections.groupby')->with('posts', $posts);
    }

    public function sortby()
    {
        $posts = $this->posts->filter(function ($post, $key) {

            return $post['data']['post_hint'] = 'image';
        })
            ->sortby('data.title')
            ->values()
            ->all();
        return view('collections.sortby')->with('posts', $posts);
    }

    public function partition()
    {
        list($PopularPosts, $RegularPosts) = $this->posts->partition(function ($post) {
            return $post['data']['ups'] > 1000;
        });

        return view('collections.partition', [
            'PopularPosts' => $PopularPosts->sortbyDesc('data.ups'),
            'RegularPosts' => $RegularPosts->sortbyDesc('data.ups')
        ]);
    }

    public function reject()
    {
        $posts = $this->posts->reject(function ($post, $key) {

            return $post['data']['ups'] < 1000;
        });
        return view('collections.reject')->with('posts', $this->posts->sortByDesc('data.ups'));
    }


    public function wherein()
    {
        $posts = $this->posts->whereIn('data.post_hint', ['self', 'image'])
            ->groupby('data.post_hint')
            ->toArray();
        return view('collections.wherein')->with('posts', $posts);
    }

    public function chunk()
    {
        $posts = $this->posts->chunk(size: 2);


        return view('collections.chunk')->with('posts', $posts);
    }

    public function count()
    {
        $posts = $this->posts->reject(function ($post, $key) {

            return $post['data']['ups'] < 1000;
        });
        return view('collections.count')->with('posts', $this->posts->sortByDesc('data.ups'));
    }

    public function first()
    {
        // $firstposts = $this->posts->first(function ($post, $key) {

        //     return $post['data']['ups'] > 1000;
        // });
        $firstposts = $this->posts->firstWhere(key: 'data.ups', operator: '>', value: '1000');
        return view('collections.first')->with('post', $firstposts);
    }

    public function tap()
    {
        $posts = $this->posts->filter(function ($post, $key) {

            return $post['data']['post_hint'] = 'image';
        })
            ->sortby('data.title')
            ->tap(function ($collection) {
                \Log::info('IDS from' . $collection->count() . 'posts' . $collection->pluck('data.id'));
            })
            ->values()

            ->all();
        return view('collections.tap')->with('posts', $posts);
    }
}
