<ol class="breadcrumb text-muted fs-6 fw-bold mb-10">
    @foreach ($items as $item)
        <li class="breadcrumb-item pe-3" @class(['text-muted' => $item['link'] == ''])>
            @if ($item['link'] != '')
                <a href="{{ $item['link'] }}" class="pe-3">
                    {{ $item['title'] }}
                </a>
            @else
                {{ $item['title'] }}
            @endif
        </li>
    @endforeach
</ol>
