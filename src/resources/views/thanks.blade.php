@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')

<div class="thanks-content">
    <div class="thanks__heading">
        <h2 class="thanks__title">お問い合わせありがとうございました</h2>
    
        <div class="thanks__button">
            <a href="/" class="thanks__button-link">HOME</a>
        </div>
    </div>
</div>