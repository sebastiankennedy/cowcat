<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <form class="form-inline" action="{{route($search['route'])}}" method="GET">
                    @forelse ($search['inputs'] as $input)
                        <div class="form-group">
                            @if($input['type'] == 'text')
                                <input class="form-control" name="{{$input['name']}}" type="text" value="{{old($input['name'])}}" placeholder="{{$input['placeholder']}}">
                            @elseif($input['type'] == 'select')
                                <select class="form-control select2" name="{{$input['name']}}" style="width: 100%">
                                    @forelse ($input['options'] as $value => $title)
                                        <option
                                                value="{{$value}}"
                                                @if($value == old($input['name']))
                                                selected
                                                @endif
                                        >
                                            {{trans($title)}}
                                        </option>
                                    @empty
                                    @endforelse
                                </select>
                            @elseif($input['type'] == 'date')
                                <input class="form-control" id="{{$input['name']}}" name="{{$input['name']}}" type="text" value="{{old($input['name'])}}">
                            @endif
                        </div>
                    @empty
                    @endforelse
                    <div class="form-group">
                        <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-filter"></i> 筛选
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
