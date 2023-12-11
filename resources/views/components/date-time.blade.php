
<p><small>{{$created->toDayDateTimeString()}} <span class="text-info">({{$created->diffForHumans()}})</span></small></p>
<p class="text-success"><small>{{$created != $updated ? $updated->toDayDateTimeString() . '('.$created->diffForHumans().')' : 'Not updated yet'}}</small></p>
