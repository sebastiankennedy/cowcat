<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\UploadService;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.file.index');
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $uploadService = new UploadService($file, config('cowcat.uploads'));

        try {
            $result = $uploadService->upload();

            if ($result['status'] == 0) {
                return $this->responseJson($result);
            }
        }
        catch (\Exception $e) {
        }
    }
}
