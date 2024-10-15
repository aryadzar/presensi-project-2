@unless ($breadcrumbs->isEmpty())
    <div class=" breadcrumbs text-sm font-bold ">
        <ul class="">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li class=""><a href="{{ $breadcrumb->url }}"><i class="fa-solid fa-house mr-2"></i>
                            {{ $breadcrumb->title }}</a></li>
                @else
                    <li class=" font-semibold">{{ $breadcrumb->title }}</li>
                @endif
            @endforeach
        </ul>
    </div>
@endunless
