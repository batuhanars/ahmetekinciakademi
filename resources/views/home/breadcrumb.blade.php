<section data-anim="fade" class="breadcrumbs {{ $dark ? 'bg-dark-1' : '' }} text-dark-1"
    style="margin-top: 75px !important;">
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <div class="breadcrumbs__content">
                    @foreach ($items as $item)
                        <div class="breadcrumbs__item {{ $dark ? 'text-dark-3' : '' }}">
                            <a href="{{ $item['link'] }}">{{ $item['title'] }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
