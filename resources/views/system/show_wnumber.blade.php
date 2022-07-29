@foreach($wns as $wns_row)
{{$wns_row->wn_number}},
@endforeach

{{$wns->links()}}