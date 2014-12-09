@foreach(Session::get('error_messages', []) as $message)
    <p class="message btn btn-block btn-lg btn-danger">{{ $message }}</p>
@endforeach