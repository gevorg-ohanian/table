<?php
class Other extends User {

    protected $table = 'others';

    public static $rules = array(
        'others_email'=>'alpha',
        'others_name'=>'alpha',
        'others_surname'=>'alpha',
        'others_country'=>'alpha',
        'others_city'=>'alpha'
    );

    protected $fillable = array(
        'others_email',
        'others_name',
        'others_surname',
        'others_country',
        'others_city'
    );
}