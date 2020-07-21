<div class="btn-group btn-lang" role="group">
    <button type="button" class="btn btn-default language-{{ strtolower(\App::getLocale()) }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $current_language->locale_name }} <span class="caret"></span>
    </button>
    <ul class="dropdown-menu dropdown-menu-right">
        @if (isset($languages))
            @foreach($languages as $language)
                @if(in_array($language->locale,['en','id']))
                    <li>
                        <a href="/lang/{{$language->locale}}" class="language-{{ $language->locale }}">{{$language->locale_name}}</a>
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
</div>