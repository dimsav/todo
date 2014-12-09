<div class="form-group @if($errors->has('email'))has-feedback has-error @endif">
    {{ Form::text('email', null, array('placeholder' => 'Enter your email', 'class' => 'form-control login-field')) }}
    <label class="login-field-icon fui-user" for="login-email"></label>
    @include('partials.form-errors', array('field' => 'email'))
</div>

<div class="form-group @if($errors->has('password'))has-feedback has-error @endif">
    <input class="form-control login-field" value="" name="password" placeholder="Password" id="login-pass" type="password">
    <label class="login-field-icon fui-lock" for="login-pass"></label>
    @include('partials.form-errors', array('field' => 'password'))
</div>