

<a href="{{ url('/piple?').\Illuminate\Support\Arr::query(['active' => '0']) }}"> Active Only </a> <br/>
<a href="{{ url('/piple?').\Illuminate\Support\Arr::query(['sort' => 'asc']) }}"> SORT </a> <br/>
<a href="{{ url('/piple?').\Illuminate\Support\Arr::query(['max_count' => '5']) }}"> MAX COUNT </a> <br/>
<a href="{{ url('/piple?').\Illuminate\Support\Arr::query(['active' => '0','sort' => 'asc','max_count' => '5']) }}"> ALL </a> <br/>
<a href="{{ url('/piple')}}"> BACK TO HOME </a>
<br/>
<br/>
<br/>
<table>
    @foreach($posts as $post)
        <tr>    
            <td>{{ $post->active }} </td>
            <td>{{ $post->title }} </td>
        </tr>
    @endforeach
</table>    

{{ $posts->appends(request()->input())->links() }} 