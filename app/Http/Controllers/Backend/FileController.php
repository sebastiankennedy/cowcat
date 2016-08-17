<?php

namespace App\Http\Controllers\Backend;

use App\Models\File as FileModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\UploadService;
use Illuminate\Support\Facades\File;
use Mockery\Exception;

/**
 * Class FileController
 *
 * @package App\Http\Controllers\Backend
 */
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FileModel::paginate(config('repository.page-limit'));

        return view('backend.file.index', compact('data'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $file = $request->file('file');
        $uploadService = new UploadService($file, config('cowcat.uploads'));

        try {
            $result = $uploadService->upload();

            if($result['status'] == 0){
                return $this->responseJson($result);
            }

            if(FileModel::create($result['data'])){
                return $this->responseJson($result);
            } else {
                throw new Exception("文件记录失败...");
            }
        }
        catch (\Exception $e) {
            return $this->responseJson($e->getMessage());
        }
    }

    public function download($id)
    {
        $file = FileModel::find($id);

        if( ! $file->exists){
            return $this->errorBackTo("下载文件不存在");
        }

        if(file_exists($file->url)){
            return response()->download($file->url);
        } else {
            return $this->errorBackTo("下载文件出错");
        }
    }

    public function destroy(Request $request)
    {

    }
}
