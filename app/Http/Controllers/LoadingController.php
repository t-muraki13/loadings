<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loading;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class LoadingController extends Controller
{
    public function index()
    {
        $loading = Loading::select('id', 'receiving', 'name', 'number', 'charge', 'issue', 'remarks', 'place')
        ->paginate(10);

        return view('top', compact('loading'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'receiving' => ['required', 'date'],
            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
            'charge' => ['required', 'string', 'max:255'],
            'issue' => ['required', 'date', 'after:receiving'],
            'remarks' => ['required', 'string', 'max:255'],
            'place' =>['required', 'string', 'max:255'],
        ]);

        try {
            DB::transaction(function() use($request) {
                Loading::create([
                    'receiving' => $request->receiving,
                    'name' => $request->name,
                    'number' => $request->number,
                    'charge' => $request->charge,
                    'issue' => $request->issue,
                    'remarks' => $request->remarks,
                    'place' => $request->place,
                ]);
            });
        } catch(Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return redirect()
        ->route('index')
        ->with(['message' => '情報を登録しました。',
        'status' => 'info']);
    }

    public function edit($id)
    {
        $loading = Loading::findOrFail($id);
        //dd($loading);
        return view('edit', compact('loading'));
    }

    public function confirm(Request $request, $id)
    {
        //dd($request, $id);
        $request->validate([
            'receiving' => ['required', 'date'],
            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
            'charge' => ['required', 'string', 'max:255'],
            'issue' => ['required', 'date', 'after:receiving'],
            'remarks' => ['required', 'string', 'max:255'],
            'place' =>['required', 'string', 'max:255'],
        ]);

        $loading = Loading::findOrFail($id);
        $receiving = $request->receiving;
        $name = $request->name;
        $number = $request->number;
        $charge = $request->charge;
        $issue = $request->issue;
        $remarks = $request->remarks;
        $place = $request->place;

        //dd($loading, $receiving, $name, $number, $charge, $issue, $remarks, $place);
        // フラッシュメッセージをセッションに保存
        session()->flash('message', '情報を更新しますか？');
        session()->flash('status', 'confirm');

        return view('confirm', compact('loading', 'receiving', 'name', 'number', 'charge', 'issue', 'remarks', 'place', 'id'));

    }

    public function update(Request $request, $id)
    {
        $loading = Loading::findOrFail($id);
        $loading->receiving = $request->receiving;
        $loading->name = $request->name;
        $loading->number = $request->number;
        $loading->charge = $request->charge;
        $loading->issue = $request->issue;
        $loading->remarks = $request->remarks;
        $loading->place = $request->place;
        $loading->save();

        return redirect()
        ->route('index')
        ->with(['message' => 'データを更新しました。',
        'status' => 'info']);
    }

}
