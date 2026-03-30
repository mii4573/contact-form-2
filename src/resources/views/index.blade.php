@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
      </div>
<div class="form-content">
    <form class="form" action="/contacts/confirm" method="POST" novalidate>
        @csrf

        <div class="form__group">
            <div class="form__group-label">
                <label>お名前 <span class="form__required">※</span></label>
            </div>
            <div class="form__input-flex">
                <div class="form__input--text">
                    <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                </div>
                @error('last_name')
                   <div class="form__error">{{ $message }}</div>
                @enderror
                <div class="form__input--text">
                    <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
                </div>
                @error('first_name')
                   <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-label">
                <label>性別 <span class="form__required">※</span></label>
            </div>
            <div class="form__input-flex">
                <div class="form__input--radio">
                    <input type="radio" name="gender" id="male" value="1" {{ old('gender') == '1' ? 'checked' : '' }}>
                    <label for="male">男性</label>
                </div>
                <div class="form__input--radio">
                    <input type="radio" name="gender" id="female" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>
                    <label for="female">女性</label>
                </div>
                <div class="form__input--radio">
                    <input type="radio" name="gender" id="other" value="3" {{ old('gender') == '3' ? 'checked' : '' }}>
                    <label for="other">その他</label>
                </div>
            </div>
            @error('gender')
               <div class="form__error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form__group">
            <div class="form__group-label">
                <label>メールアドレス <span class="form__required">※</span></label>
            </div>
            <div class="form__input--text">
                <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
            </div>
            @error('email')
                <div class="form__error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form__group">
            <div class="form__group-label">
                <label>電話番号 <span class="form__required">※</span></label>
            </div>
            <div class="form__input-flex tel-group">
                <div class="form__input--text">
                    <input type="tel" name="tel1" maxlength="5" value="{{ old('tel1') }}">
                </div>
                <span class="form__separator">-</span>
                <div class="form__input--text">
                    <input type="tel" name="tel2" maxlength="5" value="{{ old('tel2') }}">
                </div>
                <span class="form__separator">-</span>
                <div class="form__input--text">
                    <input type="tel" name="tel3" maxlength="5" value="{{ old('tel3') }}">
                </div>
            </div>
            @error('tel')
               <div class="form__error">{{ $message }}</div>
            @enderror   
        </div>

        <div class="form__group">
            <div class="form__group-label">
                <label>住所 <span class="form__required">※</span></label>
            </div>
            <div class="form__input--text">
                <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
            </div>
            @error('address')
               <div class="form__error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form__group">
            <div class="form__group-label">
                <label>建物名</label>
            </div>
            <div class="form__input--text">
                <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-label">
                <label>お問い合わせ種類 <span class="form__required">※</span></label>
            </div>
            <div class="form__input--select">
                <select name="category_id">
                    <option value="">選択してください</option>
                    <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>商品のお届けについて</option>
                    <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }}>商品の交換について</option>
                    <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }}>商品トラブル</option>
                    <option value="4" {{ old('category_id') == '4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                    <option value="5" {{ old('category_id') == '5' ? 'selected' : '' }}>その他</option>
                </select>           
            </div>
            @error('category_id')
               <div class="form__error">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form__group">
            <div class="form__group-label">
                <label>お問い合わせ内容 <span class="form__required">※</span></label>
            </div>
            <div class="form__input--textarea">
                <textarea name="detail" rows="5">{{ old('detail') }}</textarea>
            </div>
            @error('detail')
               <div class="form__error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form__button">
            <button type="submit" class="form__button-submit">確認画面へ</button>
        </div>
    </form>
</div>
          
 @endsection 