@section('content')
<div class="row">
    <h1>Viewing country</h1>
    <a class="btn btn-primary" href="{{ url('country/'.$country->id .'/edit') }}">Edit</a>
    {{ Form::open(array('url' => 'country/' . $country->id, 'method' => 'DELETE')) }}
    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
    {{ Form::close() }}
</div>
<div class="row">
    <table class="table">
        
    </table>
</div>
@stop
