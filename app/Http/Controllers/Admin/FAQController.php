<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FAQRequest;
use App\Models\FAQ;

class FAQController extends Controller {
    public function index() {
        $data = FAQ::all();
        return view('back.faq.index', compact('data'));
    }

    public function create() {
        return view('back.faq.create');
    }

    public function store(FAQRequest $request) {
        FAQ::create([
            'question' => $request->question,
            'answer' => $request->answer
        ]);
        return redirect()->route('admin.faq.index');
    }

    public function edit($id) {
        $faq = FAQ::whereId($id)->first();
        return view('back.faq.edit', compact('faq'));
    }

    public function update(FAQRequest $request, $id) {
        FAQ::whereId($id)->update([
            'question' => $request->question,
            'answer' => $request->answer
        ]);
        return redirect()->route('admin.faq.index');
    }

    public function delete($id) {
        FAQ::whereId($id)->delete();
    }
}
