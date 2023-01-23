@section('Table')
<table>
    <thead>
        <tr>
            <th>link zum Download</th>
            <th>link zum Perview</th>
            <th>Gültig ab</th>
            <th>Gültig Bis</th>
            <th>Beschreibung</th>
        </tr>
    </thead>
    <tbody>
     @isset($links)
            @foreach($links as $row)
                <tr>
                    <td class="link"><a href="{{$row->Download}}">{{$row->Download}}</a></td>
                    <td class="link"><a href={{$row->preview}}>{{$row->preview}} </a></td>
                    <td>{{ date ('Y-m-d',strtotime($row->GultigAb))}}</td>
                    <td>{{date('Y-m-d',strtotime($row->GultigBis))}}</td>
                    <td>{{$row->inhaltsbeschreibung}}</td>
                </tr>
           @endforeach
    @endisset
    </tbody>
</table>
@endsection







