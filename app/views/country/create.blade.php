@section('content')
<div class="row">
    <h2>New Country</h2>
</div>
<div class="row">
    {{ Form::open(array('url' => 'country')) }}

    

    {{ Form::submit('Add Country', array('class' => 'btn btn-success')) }}

    {{ Form::close() }}
</div>
@stop