<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;





class ContactController extends Controller
{
    public function index()
    {
        return view ('index');
    }

    public function confirm(ContactRequest $request)
    {
      $contact = $request->only(['last_name','first_name','gender','email', 'tel1','tel2','tel3','address','building','category_id','detail']);

      $categories = [
          '1' => '商品のお届けについて',
          '2' => '商品の交換について',
          '3' => '商品トラブル',
          '4' => 'ショップへのお問い合わせ',
          '5' => 'その他',
      ];

      $category_name = $categories[$request->category_id] ?? '未選択';

      return view('confirm', compact('contact', 'category_name'));
    }

    public function store(ContactRequest $request)
    {
      $tel = $request->tel1 . $request->tel2 . $request->tel3;

      $request->merge(['tel' => $tel ]);

      $contact = [
           'last_name'   => $request->last_name,
           'first_name'  => $request->first_name,
           'gender'      => $request->gender,
           'email'       => $request->email,
           'tel'         => $tel,
           'address'     => $request->address,
           'building'    => $request->building,
           'category_id' => $request->category_id,
           'detail'      => $request->detail,
      ];
       Contact::create($contact);

       return view('thanks');
    }

     public function admin(Request $request)
    {
        
        $query = Contact::with('category');

        if ($request->filled('fullname')) {
        // 全角・半角スペースを除去して検索（「山田 太郎」でも「山田太郎」でヒットするように）
        $fullname = str_replace([' ', '　'], '', $request->fullname);
        $query->whereRaw('CONCAT(last_name, first_name) LIKE ?', ["%{$fullname}%"]);
        }

        if ($request->filled('email')) {
        $query->where('email', 'LIKE', "%{$request->email}%");
        }

        if ($request->filled('gender') && $request->gender != 0) {
        $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
        }

        if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->latest()->paginate(7)->withQueryString();

        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));

    }
}
