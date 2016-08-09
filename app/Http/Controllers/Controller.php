<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Base Controller
 *
 * @package App\Http\Controllers
 */
abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Controller constructor.
     */
    public function __construct()
    {

    }

    /**
     * JSON 响应
     *
     * @param     $data
     * @param int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseJson($data, $code = 200)
    {
        return response()->json($data, $code);
    }

    /**
     * 成功时路由跳转
     *
     * @param $route
     * @param $message
     *
     * @return mixed
     */
    public function successRoutTo($route, $message)
    {
        return redirect()->route($route)->withSuccess($message);
    }

    /**
     * 成功时返回当前页
     *
     * @param $message
     *
     * @return mixed
     */
    public function successBackTo($message)
    {
        return redirect()->back()->withSuccess($message);
    }

    /**
     * 失败时路由跳转
     *
     * @param $route
     * @param $message
     *
     * @return $this
     */
    public function errorRouteTo($route, $message)
    {
        return redirect()->route($route)->withErrors($message);
    }

    /**
     * 失败时返回当前页
     *
     * @param $message
     *
     * @return $this
     */
    public function errorBackTo($message)
    {
        return redirect()->back()->withErrors($message)->withInput();
    }

}
