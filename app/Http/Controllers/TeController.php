<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class TeController extends Controller
{
    public function index(Request $req){
        $user_id = 1;
        $data = Order::find($user_id);
        $data->status='paid';
        $data->save();
    }
}
