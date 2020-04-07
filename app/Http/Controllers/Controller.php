<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Service\ResponseService;
use Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $custom_response;
    private $validate_messages;

    public function __construct()
    {
        $this->custom_response=new ResponseService;
    }

    public function validateData($validates,$requests)
    {
        $validator = Validator::make($requests,$validates);
        $this->validate_messages=$validator->messages();
        return $validator->fails()?$validator->messages():false;
    }

    public function showValidateError()
    {
        return response()->json(
            $this->custom_response->create(false,$this->validate_messages)
        );
    }
}
