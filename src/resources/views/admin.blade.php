@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>

    <div class="admin__search">
        <form class="search-form" action="/admin/search" method="get">
            @csrf
            <div class="search-form__item">
                <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
            </div>
            <div class="search-form__item">
                <select class="search-form__item-select" name="gender">
                    <option value="" selected disabled>性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
            </div>
            <div class="search-form__item">
                <select class="search-form__item-select" name="category_id">
                    <option value="" selected disabled>お問い合わせの種類</option>
                    </select>
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
            <div class="search-form__reset">
                <button class="search-form__reset-button" type="submit" name="reset">リセット</button>
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