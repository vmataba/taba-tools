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

namespace libs;

class FileUploader {

    public static function uploadFile($inputFileName, $destinationPath, $includeTimeStamp) {

        if ($inputFileName === null) {
            $inputFileName = 'nativeFileInput';
        }


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

     public static function uploadMultipleFiles($inputFileName, $destinationPath, $includeTimeStamp) {
        if (isset($_FILES[$inputFileName])) {



            $files = $_FILES['files'];
            //Original files' names
            $fileNames = $files['name'];
            //File Types
            $fileTypes = $files['type'];
            //Temporary file names
            $fileTempNames = $files['tmp_name'];
            //File sizes
            $fileSizes = $files['size'];
            //File Errors
            $fileErrors = $files['error'];

            //Has final response for each file
            $successResponse = [];

            for ($index = 0; $index < sizeof($fileNames); $index++) {


                //Start
                $fileName = $fileNames[$index];

                $fileExtension = explode('.', $fileName)[sizeof(explode('.', $fileName)) - 1];

                $finalFileName = $fileName;

                if ($includeTimeStamp) {
                    $finalFileName = explode('.', $fileName)[0] . '-' . date('y-m-d h:i:s') . '.' . $fileExtension;
                }

                $completePath = $destinationPath . $finalFileName;

                if (move_uploaded_file($fileTempNames[$index], $completePath)) {


                    array_push($successResponse, [
                        'type' => 1,
                        'typeDescription' => 'Success',
                        'completePath' => $completePath,
                        'usedName' => $finalFileName,
                        'fileInput' => [
                            'name' => $fileNames[$index],
                            'type' => $fileTypes[$index],
                            'tempName' => $fileTempNames[$index],
                            'size' => $fileSizes[$index],
                            'error' => $fileErrors[$index]
                        ]
                    ]);
                } else {
                    //Handling upload errors
                }
            }
        }
        return $successResponse;
    }

    public static function widget() {
        return \Yii::$app->controller->renderPartial('@vendor/taba/tools/libs/views/widget');
    }

}
