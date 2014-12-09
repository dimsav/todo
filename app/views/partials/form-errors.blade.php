@foreach ($errors->get($field) as $error)
    <span class="help-block error-message"><strong>{{ $error }}</strong></span>
@endforeach