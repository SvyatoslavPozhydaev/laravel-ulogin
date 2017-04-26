<?php
//
return [
    'theme' => 'flat',
    'fields' => 'first_name,last_name',
    'providers' => 'facebook,vkontakte',
    'mobilebuttons' => 0,
    'redirect_uri' => '/ulogin/form',
    'confirm_form_uri' => '/ulogin/save',
    'custom_btn' => [
        '<li class="login__item  login__fb">
            <a data-uloginbutton="facebook" href="#">
                <img src="/vendor/ulogin/images/facebook_ulogin_icon.png" alt="">
            </a>
        </li>',
        '<li class="login__item  login__fb">
            <a data-uloginbutton="vkontakte" href="#">
                <img src="/vendor/ulogin/images/vkontakte_ulogin_ico.png" alt="">
            </a>
        </li>'
    ],
    'request_rules' => [
        'email' => 'required|email',
        'phone' => 'required',
    ],
    'confirm_inputs' => [
        'email' => [
            'label' => 'enter email',
            'class' => 'input'
        ],
        'phone' => [
            'label' => 'enter phone',
            'class' => 'input'
        ],
    ],
];