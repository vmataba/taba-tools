<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileUploader
 *
 * @author Victor Mataba <vmataba0@gmail.com>
 */

namespace libs\file_uploader;

class FileUploader {

    public static function uploadFile($inputFileName, $destinationPath, $includeTimeStamp) {
        if (isset($_FILES[$inputFileName])) {
            $fileName = $_FILES[$inputFileName]['name'];

            $fileExtension = explode('.', $fileName)[sizeof(explode('.', $fileName)) - 1];

            $finalFileName = $fileName;

            if ($includeTimeStamp) {
                $finalFileName = explode('.', $fileName)[0] . '-' . date('y-m-d h:i:s') . '.' . $fileExtension;
            }

            $completePath = $destinationPath . $finalFileName;

            if (move_uploaded_file($_FILES[$inputFileName]['tmp_name'], $completePath)) {
                return [
                    'type' => 1,
                    'typeDescription' => 'Success',
                    'completePath' => $completePath,
                    'usedName' => $finalFileName,
                    'fileInput' => $_FILES[$inputFileName]
                ];
            }

            return [
                'type' => 0,
                'typeDescription' => 'Error',
                'message' => 'Upload Process failed',
                'fileInput' => $_FILES[$inputFileName]
            ];
        }
    }

    public static function widget() {
        return \Yii::$app->controller->renderPartial('@app/libs/file_uploader/views/widget');
    }

}
