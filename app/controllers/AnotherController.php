<?php

/**
 * Created by PhpStorm.
 * User: Grigor
 * Date: 28.09.2015
 * Time: 16:25
 */
class AnotherController extends BaseController
{

    private $column_list = array(
        'others_id',
        'others_email',
        'others_name',
        'others_surname',
        'others_country',
        'others_city'
    );
    public function index()
    {
        $sort = false;

        if(Input::get('sort_by'))
        {
            $sort = Input::get('sort_by');
        }

        $others = $this->getAll($sort);
        return View::make('/another')->with('others',$others)
            ->with('sort_by', $sort);
    }

    public function edit($id)
    {

    }

    public function update($id)
    {
        $input = Input::all();
        if($input['value']==''){
            $input['value']=Other::where('others_id','=',$id)->get(array($input['name']));
            return $input['value'];
        }
        else {
            $other = Other::where('others_id','=',$id)->update(array($input['name']=>$input['value']));
            $val = Other::where('others_id','=',$id)->get(array($input['name']));
            return json_encode($val);

        }

    }

    public function show($id)
    {

    }

    public function getAll($sort)
    {
        $pagination = ($sort) ? Other::orderBy($sort)->paginate(3,$this->column_list) : Other::paginate(3,$this->column_list);
        return $pagination;
    }

    public function showModal()
    {
        return View::make('modals.modal');
    }


}