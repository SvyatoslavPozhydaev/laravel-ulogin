<h3 class="section-title  section-title--mar-bot-">Осталось совсем немного</h3>
<div class="register">
    <form method="POST" role="form" action="{{route('uLogin.user.save')}}" >
        {{ csrf_field() }}
        <div class="register-form">
            <div class="register-form__left-block">
                @foreach(config('ulogin.confirm_inputs') as $key => $value)
                    <div class="{{ $errors->has($key) ? ' has-error' : '' }}">
                        <input type="text" value="{{old($key)}}" name="{{$key}}" placeholder="{{$value['label']}}" class="{{$value['class']}}">
                        @if ($errors->has($key))
                            <span class="help-block" style="margin: -25px 0 25px 0;">
                                <strong>{!! $errors->first($key) !!}</strong>
                            </span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="button  button--black  book-session-popup__button">Войти</button>
    </form>
</div>