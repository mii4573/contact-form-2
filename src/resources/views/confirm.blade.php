
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')

<div class="confilm__content">
    <div class="confilm__heading">
        <h2>confilm</h2>
    </div>
    
    <form class="form" action="/thanks" method="POST">
        @csrf

        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お名前</th>
                <td class="confirm-table__text">
                    {{ $contact['last_name'] }} {{ $contact['first_name'] }}
                    <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                    <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__header">性別</th>
                <td class="confirm-table__text">
                    @if($contact['gender'] == '1') 男性 @elseif($contact['gender'] == '2') 女性 @else その他 @endif
                    <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__header">メールアドレス</th>
                <td class="confirm-table__text">
                    {{ $contact['email'] }}
                    <input type="hidden" name="email" value="{{ $contact['email'] }}">
                </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__header">電話番号</th>
                <td class="confirm-table__text">
                    {{ $contact['tel1'] }}-{{ $contact['tel2'] }}-{{ $contact['tel3'] }}
                    <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
                    <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
                    <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
                </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__header">住所</th>
                <td class="confirm-table__text">
                    {{ $contact['address'] }}{{ $contact['building'] }}
                    <input type="hidden" name="address" value="{{ $contact['address'] }}">
                    <input type="hidden" name="building" value="{{ $contact['building'] }}">
                    <input type="hidden" name="building" value="{{ $contact['building'] }}">
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせ種類</th>
                <td class="confirm-table__text">
                   <p class="confirm-table__data">{{ $category_name }}</p>
                 
                 <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせ内容</th>
                <td class="confirm-table__text">
                    <p class="confirm-table__data">{{ $contact['detail'] }}</p>
                    <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                </td>
            </tr>
        </table>

        <div class="form__button-flex">
            <button type="submit" class="form__button-submit">送信する</button>
            <button type="button" class="form__button-back" onclick="history.back()">修正する</button>
        </div>
    </form>
</div>