@extends('layouts.admin')

@section('title', 'ダッシュボード')

@section('content')
    <h2>ダッシュボード</h2>
    {{-- <div class="dashboard-widgets">
        <div class="widget">
            <h3>ページ閲覧数</h3>
            <p class="widget-value">1,234</p>
        </div>
        <div class="widget">
            <h3>新規ユーザー</h3>
            <p class="widget-value">56</p>
        </div>
        <div class="widget">
            <h3>総ページ数</h3>
            <p class="widget-value">42</p>
        </div>
    </div> --}}
    <div class="recent-activity">
        <h3>管理者からのお知らせ <span class="last-access">最終アクセス日時：{{ session('last_access')}}</span></h3>
        @foreach ($information as $info)
            @if(date('Y/m/d H:i:s', strtotime(session('last_access'))) >= date('Y/m/d H:i:s', strtotime($info->INS_DATE)))
                <div class="admin-info-area ">
                    <div class="admin-info-title">{{ $info->TITLE }}</div>
                    @php
                        $convert = new App\Services\PlanetextToUrl;
                        $info->CONTENT = $convert->convertLink($info->CONTENT);
                    @endphp
                    <div class="admin-info-content">{!! nl2br($info->CONTENT) !!}</div>
                    <div class="admin-info-date">{{ $info->POST_DATE }}</div>
                </div>
            @else
                <div class="admin-info-area unread">
                    <div class="admin-info-title">{{ $info->TITLE }}</div>
                    @php
                        $convert = new App\Services\PlanetextToUrl;
                        $info->CONTENT = $convert->convertLink($info->CONTENT);
                    @endphp
                    <div class="admin-info-content">{!! nl2br($info->CONTENT) !!}</div>
                    <div class="admin-info-date">{{ $info->POST_DATE }}</div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
