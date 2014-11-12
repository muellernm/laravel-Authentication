@section('content')
<div class="row">
    <h2>Edit country</h2>
</div>
<div class="row">
    {{ Form::model($country, array('route' => array('country.update', $country->id), 'method' => 'PUT')) }}

    

    {{ Form::submit('Edit Country', array('class' => 'btn btn-success')) }}

    {{Form::close()}}
</div>
@stop

