<?php

namespace App\Http\Controllers\Backend;

use App\Models\File;
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
        $data = File::paginate(config('repository.page-limit'));

        return view('backend.file.index', compact('data'));
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

            if (File::create($result['data'])) {
                return $this->responseJson($result);
            }
        }
        catch (\Exception $e) {
            return $this->responseJson($e->getMessage());
        }
    }
}
