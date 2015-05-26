@extends('layouts.master')

@section('title')
{{ $forum->name }}
@stop

@section('description')
{{ $forum->name }}, {{ $forum->text }}. Forum de la communauté LegiPix.
@stop

@section('content')
    <div class="breadcrumb">
        <span>
            {!! link_to_route('index', 'Accueil') !!}<i class="separator"></i>
            {!! link_to_route('f.index', 'Forum') !!}<i class="separator"></i>
            {{ ucfirst($forum->name) }}
        </span>
    </div>

    <div id="parallax" class="parallax" style="background-image: url({{ asset('uploads/banner/' . $forum->banner) }})">
        <h1 class="parallax__title">{{ $forum->name }}</h1>
        <div class="parallax__meta">{{ $forum->topics }} Sujets&nbsp;&nbsp;-&nbsp;&nbsp;{{ $forum->posts }} Messages</div>
        <div class="parallax__buttons">
            @if (Auth::check())
            <a href="#new" class="parallax__btn">Nouveau Sujet</a>
            @endif
            {!! $topics->render() !!}
        </div>
    </div>

    <div class="topics__header" style="border: none">
        <div class="topics__header__info">
            <div class="topics__info__last-post">Dernier Post</div>
            <div class="topics__info__info">Statistiques</div>
        </div>
    </div>

    @if ($topics->isEmpty())
    <div class="empty__page">
        <h1 class="empty__page__smiley">:'(</h1>
        <div class="empty__page__message">
            <h3>C'est très gênant..</h3>
            <p>Il semblerait que ce forum ne contienne pas encore de sujets de discussion.<br>Pourquoi ne pas commencer par en créer un vous même ?</p>
        </div>
    </div>
    @else
    <ul class="topics">
        @foreach ($topics as $topic)
            <li class="topic">
                <img src="{!! asset('uploads/avatar/' . $topic->author->avatar) !!}" alt="avatar-{{ $topic->author->name }}" class="topic__author-avatar" title="Auteur">
                <img src="{!! asset('uploads/avatar/' . $topic->lastPost->author->avatar) !!}" alt="avatar-{{ $topic->author->name }}" class="topic__author-avatar" title="Dernier">

                <div class="topic__main">
                    <h3 class="topic__main__title new">{!! link_to_route('f.topic', $topic->name, [(int) $forum->id . '-' . e($forum->slug), (int) $topic->id, e($topic->slug)]) !!}</h3>
                    <div class="topic__main__info">
                        <span class="topic__main__author">Par
                            @if (Auth::check() && Auth::id() == $topic->user_id)
                            <strong>vous</strong>,
                            @else
                            <strong>{{ $topic->author->name }}</strong>,
                            @endif
                        </span>
                        <span class="topic__main__date">{!! $topic->parsedDate() !!}</span>
                    </div>
                </div>

                @if($topic->locked)
                    <span class="topic__tag" title="Verrouillé"><i class="icon-locked"></i></span>
                @endif

                @if(Auth::check() && Auth::id() != $topic->user_id)
                    <span class="topic__tag" title="Nouveau"><i class="icon-new"></i></span>
                @endif

                @if($topic->pinned)
                    <span class="topic__tag" title="Épinglé"><i class="icon-pin"></i></span>
                @endif

                <div class="topic__info">
                    <dl class="topic__info__major">
                        <dt>Messages : </dt>
                        <dd>{{ $topic->posts }}</dd>
                    </dl>
                    <dl class="topic__info__minor">
                        <dt>Vues : </dt>
                        <dd>{{ $topic->views }}</dd>
                    </dl>
                </div>

                <a href="{{ route('f.topic', [(int) $forum->id . '-' . e($forum->slug), (int) $topic->id, e($topic->slug)]) }}?page={!! ceil($topic->posts / $topic->per_page) !!}#message-{{ $topic->last_post_id }}" class="topic__last-post" title="Accéder au dernier message">
                    <div class="topic__last-post__user">
                        @if(Auth::check() && Auth::id() == $topic->lastPost->user_id)
                            Vous
                        @else
                            {{ $topic->lastPost->author->name }}
                        @endif
                    </div>
                    <div class="topic__last-post__date">{!! $topic->lastPost->parsedDate() !!}</div>
                </a>
            </li>
        @endforeach
    </ul>
    @endif

    @if(Auth::check())
       <div class="editor__header" id="new">
       </div>
       <p class="post__help--alt">Créer un nouveau sujet de discussions dans le forum <strong>{{{ $forum->name }}}</strong>.</p>
       {{ Form::open(array('route' => 'f.index')) }}
       <p class="post__header">
          {{ Form::label('title', 'Titre du Sujet') }} {{ Form::text('title') }}
          @if($forum->tag)
             {{ Form::checkbox('tag', 1, false, array('id' => 'tag', 'class' => 'no-smartphone')) }} {{ Form::label('tag', '(optionnel) '.$forum->tag, array('class' => 'no-smartphone')) }}
          @endif
       </p>
          <div class="post__editor">
             <div class="post__editor__bar">
                <a href="#" data-tag="b" class="editor-btn" title="Texte gras"><i class="icon-bold"></i></a>
                <a href="#" data-tag="i" class="editor-btn" title="Texte italique"><i class="icon-italic"></i></a>
                <a href="#" data-tag="u" class="editor-btn" title="Texte souligné"><i class="icon-underline"></i></a>
                <a href="#" data-tag="s" class="editor-btn" title="Texte barré"><i class="icon-strike"></i></a>
                <a href="#" data-tag="sup" class="no-smartphone editor-btn" title="Texte en exposant"><i class="icon-superscript"></i></a>
                <a href="#" data-tag="sub" class="no-smartphone editor-btn" title="Texte en indice"><i class="icon-subscript"></i></a>
                <a href="#" data-tag="quote" class="editor-btn" title="Citation"><i class="icon-quote"></i></a>
                <a href="#" data-tag="note" class="editor-btn" title="Bloc de note"><i class="icon-note"></i></a>
                <a href="#" data-tag="alert" class="editor-btn" title="Bloc d'alerte"><i class="icon-alert"></i></a>
                <a href="#" data-tag="table" class="no-smartphone editor-btn" title="Tableau"><i class="icon-table"></i></a>
                <a href="#" data-tag="list" class="editor-btn" title="Liste"><i class="icon-list-bullet"></i></a>
                <a href="#" data-tag="olist" class="editor-btn" title="Liste ordonnée"><i class="icon-list-numbered"></i></a>
                <a href="#" data-tag="li" class="no-smartphone editor-btn" title="Element"><i class="icon-bullet"></i></a>
                <a href="#" data-tag="url" class="editor-btn" title="Lien externe"><i class="icon-link"></i></a>
                <a href="#" data-tag="img" class="editor-btn" title="Image externe"><i class="icon-picture"></i></a>
                <a href="#" data-tag="youtube" class="editor-btn" title="Vidéo YouTube"><i class="icon-video"></i></a>
                <a href="#" id="editor-smiley-list" title="Liste des Smileys"><i class="icon-smile"></i></a>
             </div>
             <div class="post__editor__bar--smileys" id="smiley-bar">
                <a href="#" data-smiley="angry" class="editor-btn">{{ Html::image('img/smiley/angry.png', 'smiley-angry', $attributes = array()) }}</a>
                <a href="#" data-smiley="confused" class="editor-btn">{{ Html::image('img/smiley/confused.png', 'smiley-confused', $attributes = array()) }}</a>
                <a href="#" data-smiley="cool" class="editor-btn">{{ Html::image('img/smiley/cool.png', 'smiley-cool', $attributes = array()) }}</a>
                <a href="#" data-smiley="evil" class="editor-btn">{{ Html::image('img/smiley/evil.png', 'smiley-evil', $attributes = array()) }}</a>
                <a href="#" data-smiley="grin" class="editor-btn">{{ Html::image('img/smiley/grin.png', 'smiley-grin', $attributes = array()) }}</a>
                <a href="#" data-smiley="happy" class="editor-btn">{{ Html::image('img/smiley/happy.png', 'smiley-happy', $attributes = array()) }}</a>
                <a href="#" data-smiley="neutral" class="editor-btn">{{ Html::image('img/smiley/neutral.png', 'smiley-neutral', $attributes = array()) }}</a>
                <a href="#" data-smiley="sad" class="editor-btn">{{ Html::image('img/smiley/sad.png', 'smiley-sad', $attributes = array()) }}</a>
                <a href="#" data-smiley="shocked" class="editor-btn">{{ Html::image('img/smiley/shocked.png', 'smiley-shocked', $attributes = array()) }}</a>
                <a href="#" data-smiley="smiley" class="editor-btn">{{ Html::image('img/smiley/smiley.png', 'smiley-smiley', $attributes = array()) }}</a>
                <a href="#" data-smiley="tongue" class="editor-btn">{{ Html::image('img/smiley/tongue.png', 'smiley-tongue', $attributes = array()) }}</a>
                <a href="#" data-smiley="wink" class="editor-btn">{{ Html::image('img/smiley/wink.png', 'smiley-wink', $attributes = array()) }}</a>
                <a href="#" data-smiley="wondering" class="editor-btn">{{ Html::image('img/smiley/wondering.png', 'smiley-wondering', $attributes = array()) }}</a>
             </div>
             @{{ Form::textarea('answer', $value = null, $attributes = array('id' => 'answer', 'class' => 'post__editor__area', 'rows' => '8')); }}
             {{ Form::submit('Envoyer la réponse', $attributes = array('class' => 'post__editor__btn')) }}
          </div>
       {{ Form::close() }}
       <p class="post__help">
          Nous rappelons que tout message posté dans nos forums sont soumis à la charte d'utilisation du site de la communauté LegiPix.<br>
          Nous vous conseillons un titre concis et résumant le contenu ou le thème global de votre sujet.<br>
          Besoin d'aide dans l'utilisation des BBCodes ? Vous pouvez en apprendre plus sur <a href="#">cette page</a>.
       </p>

    @endif

@stop

@section('scripts')
{!! Html::script('js/forum.js') !!}
@stop
