<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $users = DB::table('users')->get();
        return response()->json($users);
    }

    // 1) Insert Data
    public function store()
    {
        $timestamp = time();

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'johndoe' . $timestamp . '@example.com',
            'password' => bcrypt('password123'),
        ]);

        $id = DB::table('users')->insertGetId([
            'name' => 'Jane Doe',
            'email' => 'janedoe' . $timestamp . '@example.com',
            'password' => bcrypt('password123'),
        ]);

        return "Insert berhasil! ID baru: " . $id;
    }

    // 2) Ambil Data dengan berbagai kondisi
    public function getData()
    {
        $allUsers = DB::table('users')->get();

        $userByEmail = DB::table('users')->first();

        $selectedColumns = DB::table('users')->select('id', 'name')->get();

        $multiCondition = DB::table('users')
            ->where('id', '>', 0)
            ->where('name', '!=', '')
            ->get();

        return response()->json([
            'all_users'        => $allUsers,
            'user_by_email'    => $userByEmail,
            'selected_columns' => $selectedColumns,
            'multi_condition'  => $multiCondition,
        ]);
    }

    // 3) Update Data
    public function updateData()
    {
        DB::table('users')
            ->where('name', 'John Doe')
            ->update(['name' => 'John Doe Updated']);

        return "Update berhasil!";
    }

    // 4) Hapus Data
    public function deleteData()
    {
        DB::table('users')
            ->where('name', 'Jane Doe')
            ->delete();

        return "Data berhasil dihapus!";
    }

    // 5) Pluck
    public function pluckData()
    {
        $names = DB::table('users')->pluck('name');
        $emailAsKey = DB::table('users')->pluck('name', 'email');

        return response()->json([
            'names'        => $names,
            'email_as_key' => $emailAsKey,
        ]);
    }

    // 6) Agregat
    public function aggregateData()
    {
        $totalUsers = DB::table('users')->count();
        $totalProducts = DB::table('products')->count();
        $avgPrice = DB::table('products')->avg('price');
        $maxPrice = DB::table('products')->max('price');
        $minPrice = DB::table('products')->min('price');

        return response()->json([
            'total_users'    => $totalUsers,
            'total_products' => $totalProducts,
            'avg_price'      => $avgPrice,
            'max_price'      => $maxPrice,
            'min_price'      => $minPrice,
        ]);
    }

    // 7) Join
    public function joinData()
    {
        $innerJoin = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.name as product_name', 'categories.name as category_name')
            ->get();

        $leftJoin = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->get();

        return response()->json([
            'inner_join' => $innerJoin,
            'left_join'  => $leftJoin,
        ]);
    }

    // 8) Order, Limit, Offset
    public function orderLimitData()
    {
        $ordered = DB::table('products')->orderBy('name', 'asc')->get();
        $limited = DB::table('products')->limit(5)->get();
        $paginated = DB::table('products')->offset(5)->limit(5)->get();

        return response()->json([
            'ordered'   => $ordered,
            'limited'   => $limited,
            'paginated' => $paginated,
        ]);
    }

    // 9) Subquery
    public function subqueryData()
    {
        $result = DB::table('categories')
            ->select('name')
            ->selectSub(function ($query) {
                $query->from('products')
                    ->selectRaw('count(*)')
                    ->whereColumn('products.category_id', 'categories.id');
            }, 'product_count')
            ->get();

        return response()->json($result);
    }

    // 10) Raw Query
    public function rawData()
    {
        $groupedRaw = DB::table('products')
            ->selectRaw('COUNT(*) as total_products, category_id')
            ->groupBy('category_id')
            ->get();

        $whereRaw = DB::table('products')
            ->whereRaw('price > ?', [10000])
            ->get();

        return response()->json([
            'grouped_raw' => $groupedRaw,
            'where_raw'   => $whereRaw,
        ]);
    }
}