<?php

    namespace app\admin\controller;

    use think\Controller;

    class Upload extends Controller {

        public function index() {

            $file = $this->request->file('file');

            if($file) {

                $info = $file->move(ROOT_PATH.'public'.DS.'uploads');

                if($info) {

                    // echo $info->getExtension();

                    // echo $info->getSaveName();

                    // echo $info->getFilename();

                    $imgpath = \date('Ymd').'/'.$info->getFilename();

                    return json([
                        'code' => 200,
                        'msg' => '图片上传成功',
                        'status' => 'success',
                        'imgpath' => '/public/uploads/'.$imgpath,
                    ]);

                } else {

                    // echo $file->getError();

                    return json([
                        'code' => 404,
                        'status' => 'error',
                        'msg' => $file->getError(),
                    ]);

                }

            }

        }

    }
