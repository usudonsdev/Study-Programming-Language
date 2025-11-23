<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\HomeBudget;

class HomebudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $budgets = HomeBudget::all();

        // 3. ビューに渡す（'budgets' を追加する）
        return view('homebudget.index', compact("categories", 'budgets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
        // 【検問1】そもそもここまでデータが届いているか？
        // dd($request->all()); 

            $validated = $request->validate([
                'date' => 'required|date',
                'category'=> 'required|numeric',
                'price'=> 'required|numeric',
            ]);

            // 【検問2】バリデーション（入力チェック）を突破できたか？

            // ↓ 修正済みの保存コード
            $result = HomeBudget::create([
                'date' => $request->date,
                'category_id' => $request->category, // ← ★ここが category_id になっているか再確認
                'price' => $request->price
            ]);

            // 【検問3】保存が成功したか？
            //dd('保存成功！作成されたデータ:', $result);

            if (!empty($result)) {
                session()->flash('flash_message','支出を登録しました');
            } else {
                session()->flash('flash_error_message','支出を登録できませんでした');
            }

            return redirect('/');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
