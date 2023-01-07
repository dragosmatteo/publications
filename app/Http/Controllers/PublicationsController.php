<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Publication;

class PublicationsController extends Controller
{
    protected function getPublications(Request $request)
    {
        $search = $request->query('search', null);
        $filter = $request->query('filter', null);
        $sortBy = $request->query('sort', null);

        if (!empty($search)  &&  !empty($filter) &&  !isset($sortBy)) {
            $publications = Publication::query();
        }

        if ($search !== null) {
            $publications = Publication::whereRaw('LOWER(title) LIKE ? ', ['%' . trim(strtolower($search)) . '%'])->orWhereRaw('LOWER(author) LIKE ? ', ['%' . trim(strtolower($search)) . '%']);
        } else {
            $publications = Publication::query();
        }

        if ($filter !== null) {
            $publications = $publications->where('category', '=', $filter['category']);
        }

        if ($sortBy !== null) {
            $publications = $publications->orderBy($sortBy);
        }

        return $publications->get();
    }

    public function get(Request $request)
    {
        return view('layout', ['publications' => $this->getPublications($request)]);
    }

    public function index(Request $request)
    {
        return $this->getPublications($request);
    }

    public function categories()
    {
        $categories = Publication::select('category')
            ->distinct()
            ->get();

        return $categories;
    }
}
