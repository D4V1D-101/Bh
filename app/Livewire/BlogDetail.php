<?php
namespace App\Livewire;

use App\Models\Article;
use App\Models\Genres;
use Livewire\Component;

class BlogDetail extends Component
{
    public $articleId;

    public function mount($id)
    {
        $this->articleId = $id;
    }

    public function render()
    {
        $article = Article::findOrFail($this->articleId);
        $categories = Genres::all();
        $latestArticles = Article::where('id', '!=', $this->articleId)
            ->orderBy('created_at', 'DESC')
            ->limit(3)
            ->get();

        $relatedArticles = Article::where('id', '!=', $this->articleId)
            ->where('game_id', $article->game_id)
            ->orderBy('created_at', 'DESC')
            ->limit(3)
            ->get();

        return view('livewire.blog-detail', [
            'article' => $article,
            'categories' => $categories,
            'latestArticles' => $latestArticles,
            'relatedArticles' => $relatedArticles
        ]);
    }
}
