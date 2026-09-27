<?php

namespace App\Http\Controllers;

use App\Models\User;

class EloquentController extends Controller
{
    public function index()
    {
        // 1. where()
        $where = User::where('name', 'reza')->get();

        // 2. orWhere()
        $orWhere = User::where('name', 'reza')
            ->orWhere('email', 'syafira@gmail.com')
            ->get();

        // 3. whereBetween()
        $whereBetween = User::whereBetween('id', [1, 10])->get();

        // 4. whereIn()
        $whereIn = User::whereIn('id', [5, 6, 7])->get();

        // 5. whereNull()
        $whereNull = User::whereNull('email_verified_at')->get();

        // 6. whereNotNull()
        $whereNotNull = User::whereNotNull('email')->get();

        // 7. when()
        $nama = 'reza';

        $when = User::when($nama, function ($query, $nama) {
            return $query->where('name', $nama);
        })->get();

        // 8. One to Many
        $usersWithPosts = User::with('posts')->get();

        // 9. One to One
        $usersWithProfiles = User::with('profile')->get();

        // 10. Many to Many
        $usersWithRoles = User::with('roles')->get();

        // 11. Query Scope
        $activeUsers = User::active()->get();

        // 12. Soft Deletes
        // Mengambil semua data termasuk yang sudah dihapus
        $allUsers = User::withTrashed()->get();

        // Mengambil data yang sudah dihapus
        $deletedUsers = User::onlyTrashed()->get();

        return view('eloquent.index', compact(
            'where',
            'orWhere',
            'whereBetween',
            'whereIn',
            'whereNull',
            'whereNotNull',
            'when',
            'usersWithPosts',
            'usersWithProfiles',
            'usersWithRoles',
            'activeUsers',
            'allUsers',
            'deletedUsers'
        ));
    }
}