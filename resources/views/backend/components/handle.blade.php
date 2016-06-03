<div class="row">
    <div class="col-md-12">
        @forelse ($handle as $link)
            <a href="{{route($link['route'])}}" class="btn btn-box btn-{{$link['class']}} btn-flat">
                <i class="fa fa-{{$link['icon']}}"></i>
                {{$link['title']}}
            </a>
        @empty
        @endforelse
    </div>
</div>