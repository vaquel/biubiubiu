<?php
namespace App\Controller;

use App\Model\User;
use core\Bootstrap;

class IndexController extends Bootstrap
{
    private $model;

    public function __construct()
    {
//        $this->model = new User();
    }

    public function index()
    {
//        $test = $this->model->where('id', 100)->get()->toArray();

        return view('index', [
            'id' => [
                'name' => 1
            ]
        ]);
    }
}