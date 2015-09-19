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

    public function Itemupdate($id)
    {
        dd($id);
        //return View::make('/hello');
    }

    public function show($id)
    {

    }

    public function getAll()
    {
        $data = Other::all();
        //$others = $data->all();
        return $data;
    }
}