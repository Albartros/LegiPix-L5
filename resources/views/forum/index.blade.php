@extends('layouts.master')

@section('title', 'Forum')

@section('description', 'Forums de la communauté LegiPix.')

@section('content')
    <div class="breadcrumb">
        <span>
            {!! link_to_route('index', 'Accueil') !!}<i class="separator"></i>
            Forum
        </span>
    </div>

    @forelse ($categories as $category)
        <div class="category__name">
           <h2 class="category__name__title">{{ $category->name }}</h2>
           <div class="category__name__description">{{ $category->text }}</div>
        </div>

        <div class="category">
           @forelse ($category->forums as $forum)
               <div class="forum">
                   <a href="{!! route('f.forum', [$forum->id, e($forum->slug)]) !!}" class="forum__link">
                        <img src="{{ asset('uploads/forum/' . $forum->thumbnail) }}" alt="thumbnail-{{ $forum->slug }}" class="forum__thumbnail">
                        <div class="forum__info">
                            <h3 class="forum__info__title">{{ $forum->name }}</h3>
                            <span class="forum__info__description">{{ $forum->text }}</span><br>
                            <span class="forum__info__meta">{{ $forum->topics }} sujets / {{ $forum->posts }} messages</span>
                        </div>
                   </a>
               </div>
            @empty
                <p style="text-align: center">Pas de forums</p>
            @endforelse
        </div>
    @empty
        <p style="text-align: center">Pas de catégories</p>
    @endforelse
@stop
