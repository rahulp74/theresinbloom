<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()   { return view('pages.about'); }
    public function faq()     { return view('pages.faq'); }
    public function gallery() { return view('pages.gallery'); }
    public function customized() { return view('pages.customized'); }
    public function contact() { return view('pages.contact'); }

    public function contactSubmit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:2000',
        ]);
        $text = "Hello " . config('brand.name') . "!\n\nName: {$data['name']}\nEmail: {$data['email']}\nSubject: {$data['subject']}\n\n{$data['message']}";
        $url = 'https://wa.me/' . config('brand.whatsapp') . '?text=' . urlencode($text);
        return redirect()->away($url);
    }
}
