<script src="//ulogin.ru/js/ulogin.js"></script>
<ul id="uLogin" class="login__soc-net"
    data-ulogin="display=buttons;theme={{config('ulogin.theme')}};fields={{config('ulogin.fields')}};providers={{config('ulogin.providers')}};redirect_uri={{config('ulogin.redirect_uri')}};hidden=;mobilebuttons={{config('ulogin.mobilebuttons')}};">
    @foreach(config('ulogin.custom_btn') as $btn)
        {!! $btn !!}
    @endforeach
</ul>