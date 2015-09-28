<?php
class Other extends User {

    protected $table = 'others';
    protected $primaryKey = 'others_id';

    public static $rules = array(
        'email'=>'alpha',
        'name'=>'alpha',
        'surname'=>'alpha',
        'country'=>'alpha',
        'city'=>'alpha'
    );

    protected $fillable = array(

        'others_email',
        'others_name',
        'others_surname',
        'others_country',
        'others_city'
    );


}