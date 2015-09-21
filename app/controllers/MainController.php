<?php
class MainController extends BaseController
{
    public function index()
    {
        $others = $this->getAll();
        return View::make('/main_page')->with('others',$others);
    }

    public function edit($id)
    {

    }

    public function update($id)
    {
        $input = Input::all();
        $input['name'] = 'others_'.$input['name'];
        //dd($input);
        $other = Other::where('others_id','=',$id)->update(array($input['name']=>$input['value']));
        dd($other);

    }

    public function show($id)
    {

    }

    public function getAll()
    {
        $data = Other::all();
        //dd($data);
        //$others = $data->all();
        return $data;
    }
}