<?php

namespace App\Services;

use Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadService
{
    protected $file;

    protected $config;

    protected $driver;

    protected $driverConfig;

    public function __construct(UploadedFile $file, $config, $driver = 'local', $driverConfig = null)
    {
        $this->file = $file;
        $this->config = $config;
        $this->driver = $driver;
        $this->driverConfig = $driverConfig;
    }

    public function upload()
    {
        $info = [];
        try {
            if(empty($this->file)){
                return ['message' => '没有上传的文件', 'status' => 0];
            }

            if($this->file->getError()){
                return [
                    'message' => $this->file->getErrorMessage() . 'File Error',
                    'status'  => $this->file->getError(),
                ];
            }

            if($this->config['extension'] && ! in_array($this->file->getClientOriginalExtension(), $this->config['extension'])){
                return ['message' => "上传文件后缀名称非法", 'status' => 0];
            }

            if($this->config['mimes'] && ! in_array($this->file->getClientMimeType(), $this->config['mimes'])){
                return ['message' => '上传文件Mime类型非法', 'status' => 0];
            }

            if($this->file->getClientSize() > $this->config['max_size']){
                return ['message' => '上传文件太大,无法上传', 'status' => 0];
            }

            $saveName = sha1(time() . time() . $this->file->getClientOriginalName()) . "." . $this->file->getClientOriginalExtension();
            $directory = $this->config['save_path'];
            $savePath = $directory . '/' . $saveName;

            if( ! Storage::put($savePath, file_get_contents($this->file->getRealPath()))){
                return ['message' => '上传文件移动保存失败', 'status' => 0];
            }

            if( ! Storage::exists($savePath)){
                return ['message' => '上传文件不存在', 'status' => 0];
            }

            $info['md5'] = md5_file(public_path('uploads') . '/' . $savePath);
            $info['sha1'] = sha1_file(public_path('uploads') . '/' . $savePath);
            $info['size'] = $this->file->getClientSize();
            $info['mime'] = $this->file->getClientMimeType();
            $info['save_name'] = $saveName;
            $info['save_path'] = $savePath;
            $info['extension'] = $this->file->getClientOriginalExtension();
            $info['original_name'] = $this->file->getClientOriginalName();
            if($this->driver == 'local'){
                $info['url'] = '/uploads/' . $savePath;
                $info['location'] = 1;
            }

            return ['message' => '上传文件成功', 'status' => 1, 'data' => $info];
        }
        catch (\Exception $e) {
            return ['message' => $e->getMessage() . 'Catch Error', 'status' => 0];
        }
    }
}