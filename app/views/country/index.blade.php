@section('content')
<div class="row">
    <h1>All Countries</h1>
    <a class="btn btn-success" href="{{ url('country/create') }}">New</a>
</div>
<div class="row">
    {{ $countries->links() }}
</div>
<div class="row">
    <table class="table">
        <thead>
        
        </thead>
        <tbody>
        @foreach($countries as $country)
        <tr>
            
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop
