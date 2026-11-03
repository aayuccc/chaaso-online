<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SearchRepository;

class SearchController extends Controller
{
    private $searchRepository;

    public function __construct(SearchRepository $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    // results for the term kept in session, so the url stays /search
    public function index()
    {
        $term = session('search_term', '');

        $posts = $term !== '' ? $this->searchRepository->search($term) : null;

        return view('frontend.search', [
            'term' => $term,
            'posts' => $posts,
            'payload' => (object) ['updated_at' => now()],
            'payloadMeta' => [],
        ]);
    }

    // search form submit
    public function store(Request $request)
    {
        return $this->remember($request, $request->input('q'));
    }

    // trending chips
    public function term(Request $request, $term)
    {
        return $this->remember($request, $term);
    }

    private function remember(Request $request, ?string $term)
    {
        $term = $this->searchRepository->normalize($term);

        if ( $term !== '' ) {
            $this->searchRepository->log($term, $request->ip(), $this->searchRepository->search($term, 1)->total());
        }

        session(['search_term' => $term]);

        return redirect()->route('frontend.search');
    }
}
