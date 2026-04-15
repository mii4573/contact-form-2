@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

<style>

.admin__pagination svg {
    width: 20px !important;
    height: 20px !important;
    display: inline-block !important;
    vertical-align: middle !important;
}


.admin__pagination nav div p {
    display: none !important;
}


.admin__pagination nav > div:last-child {
    display: flex !important;
    justify-content: center !important;
    width: 100% !important;
}


.admin__pagination a, 
.admin__pagination span {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    margin: 0 2px !important;       /* ← ボタン同士の間に隙間を作る */
    padding: 8px 12px !important;
    min-width: 40px !important;      /* ← ボタンの幅が狭くなりすぎるのを防ぐ */
    height: 40px !important;         /* ← 高さを揃えて正方形に近くする */
    border: 1px solid #e0dfde !important;
    background-color: #fff !important;
    color: #8b7969 !important;
    text-decoration: none !important;
    box-sizing: border-box !important;
}

/* 現在のページ番号だけ色を反転させて目立たせる（任意） */
.admin__pagination span[aria-current="page"] > span {
    background-color: #8b7969 !important;
    color: #fff !important;
    border: none !important;
}
</style>
@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>

    <div class="admin__search">
        <form class="search-form" action="/admin/" method="get">
            @csrf
            <div class="search-form__item">
                <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください"
                value="{{ request('keyword') }}">
            </div>
            <div class="search-form__item">
                <select class="search-form__item-select" name="gender">
                    <option value="0">性別（全て）</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
            </div>
            <div class="search-form__item">
                <select class="search-form__item-select" name="category_id">
                    <option value="" selected disabled>お問い合わせの種類</option>
                    @foreach($categories as $category)
                　　　　<option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    　　　　{{ $category->content }}
                    　　</option>
                    @endforeach
                </select>
            </div>

            <div class="search-form__item">
                <input class="search-form__item-input" type="date" name="date" value="{{ request('date') }}">
            </div>

            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>

            <div class="search-form__reset">
               <a href="/admin" class="search-form__reset-button" style="text-decoration: none; display: inline-block;">リセット</a> 
            </div>
        </form>
    </div>

    <div class="admin__table-container">
        <table class="admin__table">
            <tr class="admin__row">
                <th class="admin__label">お名前</th>
                <th class="admin__label">性別</th>
                <th class="admin__label">メールアドレス</th>
                <th class="admin__label">お問い合わせの種類</th>
                <th class="admin__label"></th>
            </tr>
            @foreach ($contacts as $contact)
            <tr class="admin__row">
                <td class="admin__data">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td class="admin__data">
                    {{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}
                </td>
                <td class="admin__data">{{ $contact->email }}</td>
                <td class="admin__data">{{ $contact->category->content }}</td>
                <td class="admin__data">
                    <button class="admin__detail-btn">詳細</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="admin__pagination">
        {{ $contacts->links() }}
    </div>
</div>
@endsection