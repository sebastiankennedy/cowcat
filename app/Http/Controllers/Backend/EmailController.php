<?php

namespace App\Http\Controllers\Backend;

use App\Facades\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Mail;

class EmailController extends Controller
{
    public function send(Request $request, $id)
    {
        $user = UserRepository::find($id);

        $result = Mail::send('emails.test', ['user' => $user], function ($email) use ($user) {
            $email->to('2794408425@qq.com')->subject('Hello World');
        });

        if($result){
            echo '发送邮件成功';
        } else {
            echo '发送邮件失败';
        }
    }
}
