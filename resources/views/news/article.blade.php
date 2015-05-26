@extends('layouts.master')

@section('title')
{{ ucfirst($article->name) }}
@stop

@section('description')
{!! substr($article->unparsedText(), 0, 150) !!}
@stop

@section('content')
    <div class="breadcrumb">
        <span>
            {!! link_to_route('index', 'Accueil') !!}<i class="separator"></i>
            {!! link_to_route('n.index', 'News') !!}<i class="separator"></i>
            {!! link_to_route('n.category', e($article->category->name), [$article->category->id, e($article->category->slug)]) !!}<i class="separator"></i>
            {{ ucfirst($article->name) }}
        </span>
    </div>
    <div class="article__header">
        <div class="article__header__date">
            <span class="article__header__date--day">{!! ucwords($date->format('l j F Y')) !!}</span>
        </div>
        <div class="article__header__title">{{ ucfirst($article->name) }}</div>
        <div class="article__header__meta">
            {!! link_to_route('u.view', e($article->author->name), [$article->author->id, e($article->author->name)]) !!}
            &nbsp;-&nbsp;
            vues {!! $article->views !!}
            &nbsp;-&nbsp;
            <span class="article__header__meta--icons" title="CC 3.0 BY-NC-ND"><i class="icon-cc"></i> <i class="icon-by"></i><i class="icon-nc"></i><i class="icon-nd"></i></span>
        </div>
    </div>
    <article class="article__article">
        {{ $article->text }}
        <div class="share-box" style="width: 100%;">
            <div class="share-box__container" style="display: flex; flex-direction: column; align-items: center; width: 30%; margin: 0 auto;">
                <span style="line-height: 32px;">Partagez cet article à vos amis.</span>
                <div class="share-box__icons">
                    <a onclick="window.open(this.href, 'mywin', 'left=20,top=20,width=608,height=304,toolbar=1,resizable=0'); return false;" href="https://www.facebook.com/sharer/sharer.php?u=http://www.legipix.net/news/article-2-1-bienvenue-en-phase-beta.html" style="margin: 0 2px"><img src="{!! asset('img/share/Facebook.png') !!}"></a>

                    <a onclick="window.open(this.href, 'mywin', 'left=20,top=20,width=600,height=254,toolbar=1,resizable=0'); return false;" href="https://twitter.com/home?status=J'aime un article de @legipix http://www.legipix.net/" style="margin: 0 2px"><img src="{!! asset('img/share/Twitter.png') !!}"></a>

                    <a onclick="window.open(this.href, 'mywin', 'left=20,top=20,width=500,height=481,toolbar=1,resizable=0'); return false;" href="https://plus.google.com/share?url=http://www.legipix.net/" style="margin: 0 2px"><img src="{!! asset('img/share/Google+.png') !!}"></a>

                    <a href="https://pinterest.com/pin/create/button/?url=http://www.legipix.net/&amp;media=http://www.legipix.net/&amp;description=http://www.legipix.net/" style="margin: 0 2px"><img src="{!! asset('img/share/Pinterest.png') !!}"></a>

                    <a href="mailto:?&amp;subject=http://www.legipix.net/&amp;body=http://www.legipix.net/" style="margin: 0 2px"><img src="{!! asset('img/share/Email.png') !!}"></a>
                </div>
            </div>
        </div>
    </article>
@stop
