<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tools\Rsa;

class InterFaceController extends Controller
{
    public function rsa()
    {
        $obj = new Rsa();
        $keys = $obj->new_rsa_key();
        $privkey = $keys['privkey'];
        $pubkey = $keys['pubkey'];
        $obj->init($privkey,$pubkey,TRUE);
        $data = '傻逼蔺昕宇';
        $encode = $obj->priv_encode($data);
        dump($encode);
        $res = $obj->pub_decode($encode);
        dump($res);
        $decode = $obj->pub_encode($data);
        dump($decode);
        $ret = $obj->priv_decode($decode);
        dump($ret);
    }
}
