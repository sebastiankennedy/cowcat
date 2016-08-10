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

        Mail::send('emails.test', ['user' => $user], function ($email) use ($user) {
            $someOne = '2794408425@qq.com';
            $email->to($someOne)->subject('文字邮件标题');
        });

        echo "已发送邮件,请注意查收";
    }

    public function sendPicture(Request $request, $id)
    {
        $user = UserRepository::find($id);
        $icon = "http://o93kt6djh.bkt.clouddn.com/Laravel-SendEmaillaravel-200x50.png";
        $image = "http://o93kt6djh.bkt.clouddn.com/Laravel-SendEmaillaravel-600x300.jpg";

        Mail::send('emails.image', ['name' => $user->name, 'icon' => $icon, 'image' => $image], function ($email) {
            $someOne = '2794408425@qq.com';
            $email->to($someOne)->subject('图文邮件标题');
        });

        echo "已发送邮件,请注意查收";
    }
}
