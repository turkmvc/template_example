@extends('example_template._layouts.application')



@foreach(['navigation','content_bottom','footer_top','content_top','header_top','header_right','header_left','header_bottom','content_left','content_main','content_right','footer'] as $field_name)
@section($field_name)
    @if(array_key_exists($field_name,$field_details))
        @foreach($field_details[$field_name] as $item)
            @if($item['type']=="content")
                @if(in_array($user_role_id,unserialize($item['data']['access'])))
                    @include('template_name._layouts.content._content',['content'=>$item['data']])
                @endif
            @elseif($item['type']=="component-file")
                @include($item['data']['component']['folder'].".".$item['data']['file'])
            @elseif($item['type']=="block")
                @include('template_name._layouts.block._block',['item'=>$item['data']])
            @elseif($item['type']=="main-content")
                @if($item['data']['content_type']=="content")
                    @include('template_name._layouts.content._content',['content'=>$item['data']['content']])
                @elseif($item['data']['content_type']=="component")
                    @include($item['data']['component']['component']['folder'].".".$item['data']['component']['file'])
                @endif
            @endif
        @endforeach
    @endif
@endsection
@endforeach
