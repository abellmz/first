<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\UploadException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //
    public function uploader(Request $request){
        //点击头像时触发
//        dd('11');
//        dd(storage_path(''));//  "D:\Ruanjian\wampserver\www\laravel\storage"
//        dd($_FILES);接收文件信息
//        dd(public_path());"D:\Ruanjian\wampserver\www\laravel\public"
//        dd($request);
            $file=$request->file('file');
            $this->checkSize($file);
            $this->checkType($file);
        //第一个attachment意思上传文件存储目录
        //第二个attachment对应config/filesystem.php中disk选项中attachment
//        if ($file->getSize() > 200){
//            return  ['message' =>'上传文件过大', 'code' => 403];
//        }
            if ($file){
                //上传文件存储目录   指定磁盘(对应config/filesystem.php中disk)
                $path=$file->store('attachment','attachment');
                auth()->user()->attachment()->create([
//                    获取客户端原始文件名
                    'name'=>$file->getClientOriginalName(),
                    'path'=>url($path)
                ]);
            }
            //hdjs要求的参数
            return ['file'=>url($path),'code'=>0];

    }
//图片大小
    private function checkSize($file){
//        dd($file->getSize());
        //$path = $request->file('上传表单name名')->store('上传文件存储目录','指定磁盘(对应config/filesystem.php中disk)');
//        if ($file->getSize()>hd_config('upload.size')){
        if ($file->getSize()>10000000){
            throw new UploadException('上传文件过大');//注意引用的 异常抛出
        }
    }
//图片类型
    private function checkType($file){
//        if(!in_array(strtolower($file->getClientOriginalExtension()),explode('|',hd_config('upload.type')))){
        if(!in_array(strtolower($file->getClientOriginalExtension()),explode('|','jpg|png'))){
            throw new UploadException('类型不允许');
        };
    }
    //图片列表  点击头像触动
    public function filesLists(){
        //                 关联附件
        $files=auth()->user()->attachment()->paginate(2);
        $data=[];
        foreach ($files as $file){
            $data[]=[
                'url'=>$file['path'],
                'path'=>$file['path']
            ];
        }
//        dd($data);
        return [
            'data'=>$data,
            'page'=>$files->links().'',
            'code'=>0
        ];
    }

}
