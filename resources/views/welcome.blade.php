@extends('layouts.master')

@section('title', 'Accueil')

@section('description', 'Bienvenue sur le site de la communauté LegiPix.')

@section('section', 'index')

@section('content')

<div class="index-articles">
    @if ( ! $articles->isEmpty())
        @foreach ($articles as $article)
            <div class="index-article">
                <div class="index-ratio-keeper"></div>
                <a href="{!! $article->getLink() !!}" class="index-article__link-block" style="background-image: url({!! asset('uploads/article/' . e($article->thumbnail)) !!})">
                    <div class="corner-ribbon">nouveau</div>
                    <div class="index-article__news">
                        <span class="index-article__news__title">{{ $article->name }}</span>
                        <div class="index-article__news__resume">{!! $article->unparsedText() !!}</div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
        <p style="text-align: center">Pas d'articles à afficher</p>
    @endif
</div>

<div class="index-contents">
    <h2 class="headline">Vidéos à voir et à revoir</h2>
    <div class="index-contents-video">
        @if ($videos->count() >= 2)
            @for ($i = 0; $i < 2; ++$i)
                <div class="index-video">
                    <div class="videoWrapper">
                        <iframe class="index-video__video" src="https://www.youtube-nocookie.com/embed/{{ $videos[$i]->video_id }}?rel=0&amp;vq=hd720&amp;modestbranding=1&amp;showinfo=0&amp;html5=1" allowfullscreen player.setPlaybackQuality(hd720)></iframe>
                    </div>
                    <h2 class="index-video__name">{{ $videos[$i]->name }}</h2>
                </div>
            @endfor
        @else
            <p style="text-align: center; width: 100%">Pas de vidéos à afficher</p>
        @endif
    </div>
</div>

<div class="index-contents">
<h2 class="headline">En direct de nos forums</h2>
<ul class="index-topics">
    <li class="index-topic">
        <a class="index-topic__link" href="#">
            <img class="index-topic__avatar" src="http://placehold.it/61x61&amp;text=A"></img>
            <div class="index-topic__info">
                <p><span class="index-topic__title">Lorem ipsum dolor sit amet, consectetur adipisicing.</span></p>
                <p><span class="index-topic__forum">Auberge de Jeux NES</span><span class="index-topic__author">Albartros</span></p>
            </div>
        </a>
    </li>
    <div class="index-topic__bloc">
        <div class="index-post">
            <span class="index-post__separator"></span>
            <div class="index-post-info">
                <img class="index-post__avatar" src="http://placehold.it/45x45&amp;text=A"></img><br>
                Albartros, le 12 novembre à 12h15
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium repudiandae numquam voluptas in sint exercitationem voluptates reprehenderit inventore cum ratione aspernatur, amet, totam asperiores temporibus, esse molestias, minima necessitatibus maxime quaerat repellendus illum natus impedit quidem! Suscipit esse aut eos minus eligendi commodi unde assumenda qui. Minima beatae qui accusantium possimus numquam, natus incidunt dignissimos inventore ducimus illo tempore aliquam porro, facilis maxime impedit consequatur culpa quae et omnis repellat iure sit. Vitae quaerat enim ratione excepturi sint laboriosam, aut, at esse? Architecto recusandae possimus iusto ipsa optio, mollitia ut libero, nihil culpa a, distinctio commodi. Amet aliquid aut nemo blanditiis aperiam numquam corrupti dolorem quis adipisci, enim quibusdam suscipit voluptatum animi neque placeat, ipsum eius impedit repellendus. Incidunt a, nam placeat eum provident esse perspiciatis necessitatibus atque eaque saepe officiis, dolor aut, maiores, sed dignissimos laboriosam consequuntur sit nulla quaerat delectus culpa ut. Sed labore, mollitia autem quo, voluptatum quidem. Provident amet doloremque illo repudiandae nostrum a velit, commodi corporis iure possimus odit. Atque ipsam voluptatibus aliquam molestiae modi architecto cumque sunt nobis accusantium reprehenderit quos earum nam maiores expedita reiciendis numquam aperiam blanditiis, qui culpa harum sapiente, corporis. Reiciendis accusamus itaque alias veritatis dolores, excepturi suscipit magni repellendus.</p>
        </div>
    </div>

    <li class="index-topic">
        <a class="index-topic__link" href="#">
            <img class="index-topic__avatar" src="http://placehold.it/61x61&amp;text=A"></img>
            <div class="index-topic__info">
                <p><span class="index-topic__title">Lorem ipsum dolor sit amet, consectetur adipisicing.</span></p>
                <p><span class="index-topic__forum">Auberge de Jeux NES</span><span class="index-topic__author">Albartros</span></p>
            </div>
        </a>
    </li>
    <div class="index-topic__bloc">
        <div class="index-post">
            <span class="index-post__separator"></span>
            <div class="index-post-info">
                <img class="index-post__avatar" src="http://placehold.it/45x45&amp;text=A"></img><br>
                Albartros, le 12 novembre à 12h15
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium repudiandae numquam voluptas in sint exercitationem voluptates reprehenderit inventore cum ratione aspernatur, amet, totam asperiores temporibus, esse molestias, minima necessitatibus maxime quaerat repellendus illum natus impedit quidem! Suscipit esse aut eos minus eligendi commodi unde assumenda qui. Minima beatae qui accusantium possimus numquam, natus incidunt dignissimos inventore ducimus illo tempore aliquam porro, facilis maxime impedit consequatur culpa quae et omnis repellat iure sit. Vitae quaerat enim ratione excepturi sint laboriosam, aut, at esse? Architecto recusandae possimus iusto ipsa optio, mollitia ut libero, nihil culpa a, distinctio commodi. Amet aliquid aut nemo blanditiis aperiam numquam corrupti dolorem quis adipisci, enim quibusdam suscipit voluptatum animi neque placeat, ipsum eius impedit repellendus. Incidunt a, nam placeat eum provident esse perspiciatis necessitatibus atque eaque saepe officiis, dolor aut, maiores, sed dignissimos laboriosam consequuntur sit nulla quaerat delectus culpa ut. Sed labore, mollitia autem quo, voluptatum quidem. Provident amet doloremque illo repudiandae nostrum a velit, commodi corporis iure possimus odit. Atque ipsam voluptatibus aliquam molestiae modi architecto cumque sunt nobis accusantium reprehenderit quos earum nam maiores expedita reiciendis numquam aperiam blanditiis, qui culpa harum sapiente, corporis. Reiciendis accusamus itaque alias veritatis dolores, excepturi suscipit magni repellendus.</p>
        </div>
    </div>
<li class="index-topic--new">
        <a class="index-topic__link" href="#">
            <img class="index-topic__avatar" src="http://placehold.it/61x61&amp;text=A"></img>
            <div class="index-topic__info">
                <p><span class="index-topic__title">Lorem ipsum dolor sit amet, consectetur adipisicing.</span></p>
                <p><span class="index-topic__forum">Auberge de Jeux NES</span><span class="index-topic__author">Albartros</span></p>
            </div>
        </a>
    </li>
    <div class="index-topic__bloc">
        <div class="index-post--new">
            <span class="index-post__separator"></span>
            <div class="index-post-info">
                <img class="index-post__avatar" src="http://placehold.it/45x45&amp;text=A"></img><br>
                Albartros, le 12 novembre à 12h15
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium repudiandae numquam voluptas in sint exercitationem voluptates reprehenderit inventore cum ratione aspernatur, amet, totam asperiores temporibus, esse molestias, minima necessitatibus maxime quaerat repellendus illum natus impedit quidem! Suscipit esse aut eos minus eligendi commodi unde assumenda qui. Minima beatae qui accusantium possimus numquam, natus incidunt dignissimos inventore ducimus illo tempore aliquam porro, facilis maxime impedit consequatur culpa quae et omnis repellat iure sit. Vitae quaerat enim ratione excepturi sint laboriosam, aut, at esse? Architecto recusandae possimus iusto ipsa optio, mollitia ut libero, nihil culpa a, distinctio commodi. Amet aliquid aut nemo blanditiis aperiam numquam corrupti dolorem quis adipisci, enim quibusdam suscipit voluptatum animi neque placeat, ipsum eius impedit repellendus. Incidunt a, nam placeat eum provident esse perspiciatis necessitatibus atque eaque saepe officiis, dolor aut, maiores, sed dignissimos laboriosam consequuntur sit nulla quaerat delectus culpa ut. Sed labore, mollitia autem quo, voluptatum quidem. Provident amet doloremque illo repudiandae nostrum a velit, commodi corporis iure possimus odit. Atque ipsam voluptatibus aliquam molestiae modi architecto cumque sunt nobis accusantium reprehenderit quos earum nam maiores expedita reiciendis numquam aperiam blanditiis, qui culpa harum sapiente, corporis. Reiciendis accusamus itaque alias veritatis dolores, excepturi suscipit magni repellendus.</p>
        </div>
        <div class="index-post--new">
            <span class="index-post__separator"></span>
            <div class="index-post-info">
                <img class="index-post__avatar" src="http://placehold.it/45x45&amp;text=A"></img><br>
                Albartros, le 12 novembre à 12h15
            </div>
            <p>Laudantium repudiandae numquam voluptas in sint exercitationem voluptates reprehenderit inventore cum ratione aspernatur, amet, totam asperiores temporibus, esse molestias, minima necessitatibus maxime quaerat repellendus illum natus impedit quidem! Suscipit esse aut eos minus eligendi commodi unde assumenda qui. Minima beatae qui accusantium possimus numquam, natus incidunt dignissimos inventore ducimus illo tempore aliquam porro, facilis maxime impedit consequatur culpa quae et omnis repellat iure sit. Vitae quaerat enim ratione excepturi sint laboriosam, aut, at esse? Architecto recusandae possimus iusto ipsa optio, mollitia ut libero, nihil culpa a, distinctio commodi. Amet aliquid aut nemo blanditiis aperiam numquam corrupti dolorem quis adipisci, enim quibusdam suscipit voluptatum animi neque placeat, ipsum eius impedit repellendus. Incidunt a, nam placeat eum provident esse perspiciatis necessitatibus atque eaque saepe officiis, dolor aut, maiores, sed dignissimos laboriosam consequuntur sit nulla quaerat delectus culpa ut. Sed labore, mollitia autem quo, voluptatum quidem. Provident amet doloremque illo repudiandae nostrum a velit, commodi corporis iure possimus odit. Atque ipsam voluptatibus aliquam molestiae modi architecto cumque sunt nobis accusantium reprehenderit quos earum nam maiores expedita reiciendis numquam aperiam blanditiis, qui culpa harum sapiente, corporis. Reiciendis accusamus itaque alias veritatis dolores, excepturi suscipit magni repellendus.</p>
        </div>
    </div>
<li class="index-topic">
        <a class="index-topic__link" href="#">
            <img class="index-topic__avatar" src="http://placehold.it/61x61&amp;text=A"></img>
            <div class="index-topic__info">
                <p><span class="index-topic__title">Lorem ipsum dolor sit amet, consectetur adipisicing.</span></p>
                <p><span class="index-topic__forum">Auberge de Jeux NES</span><span class="index-topic__author">Albartros</span></p>
            </div>
        </a>
    </li>
    <div class="index-topic__bloc">
        <div class="index-post">
            <span class="index-post__separator"></span>
            <div class="index-post-info">
                <img class="index-post__avatar" src="http://placehold.it/45x45&amp;text=A"></img><br>
                Albartros, le 12 novembre à 12h15
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium repudiandae numquam voluptas in sint exercitationem voluptates reprehenderit inventore cum ratione aspernatur, amet, totam asperiores temporibus, esse molestias, minima necessitatibus maxime quaerat repellendus illum natus impedit quidem! Suscipit esse aut eos minus eligendi commodi unde assumenda qui. Minima beatae qui accusantium possimus numquam, natus incidunt dignissimos inventore ducimus illo tempore aliquam porro, facilis maxime impedit consequatur culpa quae et omnis repellat iure sit. Vitae quaerat enim ratione excepturi sint laboriosam, aut, at esse? Architecto recusandae possimus iusto ipsa optio, mollitia ut libero, nihil culpa a, distinctio commodi. Amet aliquid aut nemo blanditiis aperiam numquam corrupti dolorem quis adipisci, enim quibusdam suscipit voluptatum animi neque placeat, ipsum eius impedit repellendus. Incidunt a, nam placeat eum provident esse perspiciatis necessitatibus atque eaque saepe officiis, dolor aut, maiores, sed dignissimos laboriosam consequuntur sit nulla quaerat delectus culpa ut. Sed labore, mollitia autem quo, voluptatum quidem. Provident amet doloremque illo repudiandae nostrum a velit, commodi corporis iure possimus odit. Atque ipsam voluptatibus aliquam molestiae modi architecto cumque sunt nobis accusantium reprehenderit quos earum nam maiores expedita reiciendis numquam aperiam blanditiis, qui culpa harum sapiente, corporis. Reiciendis accusamus itaque alias veritatis dolores, excepturi suscipit magni repellendus.</p>
        </div>
    </div>
<li class="index-topic">
        <a class="index-topic__link" href="#">
            <img class="index-topic__avatar" src="http://placehold.it/61x61&amp;text=A"></img>
            <div class="index-topic__info">
                <p><span class="index-topic__title">Lorem ipsum dolor sit amet, consectetur adipisicing.</span></p>
                <p><span class="index-topic__forum">Auberge de Jeux NES</span><span class="index-topic__author">Albartros</span></p>
            </div>
        </a>
    </li>
    <div class="index-topic__bloc">
        <div class="index-post">
            <span class="index-post__separator"></span>
            <div class="index-post-info">
                <img class="index-post__avatar" src="http://placehold.it/45x45&amp;text=A"></img><br>
                Albartros, le 12 novembre à 12h15
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium repudiandae numquam voluptas in sint exercitationem voluptates reprehenderit inventore cum ratione aspernatur, amet, totam asperiores temporibus, esse molestias, minima necessitatibus maxime quaerat repellendus illum natus impedit quidem! Suscipit esse aut eos minus eligendi commodi unde assumenda qui. Minima beatae qui accusantium possimus numquam, natus incidunt dignissimos inventore ducimus illo tempore aliquam porro, facilis maxime impedit consequatur culpa quae et omnis repellat iure sit. Vitae quaerat enim ratione excepturi sint laboriosam, aut, at esse? Architecto recusandae possimus iusto ipsa optio, mollitia ut libero, nihil culpa a, distinctio commodi. Amet aliquid aut nemo blanditiis aperiam numquam corrupti dolorem quis adipisci, enim quibusdam suscipit voluptatum animi neque placeat, ipsum eius impedit repellendus. Incidunt a, nam placeat eum provident esse perspiciatis necessitatibus atque eaque saepe officiis, dolor aut, maiores, sed dignissimos laboriosam consequuntur sit nulla quaerat delectus culpa ut. Sed labore, mollitia autem quo, voluptatum quidem. Provident amet doloremque illo repudiandae nostrum a velit, commodi corporis iure possimus odit. Atque ipsam voluptatibus aliquam molestiae modi architecto cumque sunt nobis accusantium reprehenderit quos earum nam maiores expedita reiciendis numquam aperiam blanditiis, qui culpa harum sapiente, corporis. Reiciendis accusamus itaque alias veritatis dolores, excepturi suscipit magni repellendus.</p>
        </div>
    </div>

</ul>
<div class="index-topic__background"></div>


    <div class="countdown">
        <h2 class="headline">Prochaine sortie à suivre</h2>
        <div class="countdown-aligner">
            @if ( ! is_null($countdown))
                <div class="countdown__container">
                    <img src="{!! asset('uploads/countdown/' . $countdown->thumbnail) !!}" class="countdown__image" alt="cover">
                    <div class="countdown__title">
                        <span id="countdown">{{ $countdown->released_at }}</span>
                    </div>
                </div>
            @else
                <p style="text-align: center">Pas de sorties prévues</p>
            @endif
        </div>
    </div>

</div>
<div class="index-contents">
    <h2 class="headline">Les autres articles</h2>
    @if ( ! $news->isEmpty())
        @foreach ($news as $new)
            <div class="index-new">
                <div class="index-ratio-keeper"></div>
                <a href="{{ $new->getLink() }}" class="index-article__link-block" style="background-image: url({!! asset('uploads/article/' . e($article->thumbnail)) !!})">
                    <div class="index-article__news">
                        <span class="index-article__news__title">{{ $new->name }}</span>
                        <div class="index-article__news__resume">{!! $new->unparsedText() !!}</div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
        <p style="text-align: center">Pas d'articles à afficher</p>
    @endif
</div>

<div class="index-contents">
    <h2 class="headline">Encore plus de vidéos</h2>
    <div class="index-contents-video">
        @if ($videos->count() >= 2)
            @for ($i = 2; $i < 4; ++$i)
                <div class="index-video">
                    <div class="videoWrapper">
                        <iframe class="index-video__video" src="https://www.youtube-nocookie.com/embed/{{ $videos[$i]->video_id }}?rel=0&amp;vq=hd720&amp;modestbranding=1&amp;showinfo=0&amp;html5=1" allowfullscreen player.setPlaybackQuality(hd720)></iframe>
                    </div>
                    <h2 class="index-video__name">{{ $videos[$i]->name }}</h2>
                </div>
            @endfor
        @else
            <p style="text-align: center; width: 100%">Pas de vidéos à afficher</p>
        @endif
    </div>
</div>

<div class="index-contents">
    <h2 class="headline">Membres de la communauté</h2>
</div>

@stop
