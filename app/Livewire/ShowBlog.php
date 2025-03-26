<?php
namespace App\Livewire;

use App\Models\Article;
use App\Models\Genres;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class ShowBlog extends Component
{
    use WithPagination;

    #[Url]
    public $categorySlug = null;

    public function render()
    {
        $categories = Genres::all();
        $latestArticles = Article::orderBy('created_at', 'DESC')->limit(3)->get();

        if (!empty($this->categorySlug)) {
            $category = Genres::where('slug', $this->categorySlug)->first();

            if (empty($category)) {
                abort(404);
            }

            $articles = Article::whereHas('game', function($query) use ($category) {
                $query->whereHas('genres', function($q) use ($category) {
                    $q->where('genres.id', $category->id);
                });
            })->orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $articles = Article::orderBy('created_at', 'DESC')->paginate(10);
        }

        return view('livewire.show-blog', [
            'articles' => $articles,
            'categories' => $categories,
            'latestArticles' => $latestArticles
        ]);
    }
}
