<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ApiFreelanceGet extends Controller
{
    //
    public function __invoke(Request $request): Collection
    {
        return User::query()
            ->select('users.id', 'users.name', 'categories.name as category_name')
            ->join('freelances', 'users.id', '=', 'freelances.user_id')
            ->join('categories', 'freelances.category_id', '=', 'categories.id')
            ->orderBy('users.name')
            ->when(
                $request->search,
                fn (Builder $query) =>
                $query->where('users.name', 'like', "%{$request->search}%")
                    ->orWhere('categories.name', 'like', "%{$request->search}%")

            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();
    }
}