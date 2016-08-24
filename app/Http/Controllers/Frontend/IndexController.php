<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\MessageBoard;
use Mockery\Exception;

/**
 * Class IndexController
 *
 * @package App\Http\Controllers\Frontend
 */
class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index.index');
    }

    public function contactUs(Request $request)
    {
        $data = $request->all();

        try {
            if(MessageBoard::create($data)){
                return $this->responseJson(['status' => 1, 'message' => '留言成功']);
            } else {
                throw new Exception("留言失败");
            }
        }
        catch (\Exception $e) {
            return $this->responseJson(['status' => 0, 'message' => "留言失败"]);
        }
    }
}
