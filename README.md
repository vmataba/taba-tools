# Welcome to Taba Tools powered Libraries

1. Date formating
```
$date has to be informat: yyy-mm-dd h:i:s

$includeTime can either be true or false, default value is false
it's just an option that show wether time should be included or not

Example: 2019-05-10 12:45:32

<?= Date::getFormattedDate($date,$includeTime)?>

or 

<?php echo Date::getFormattedDate($date,$includeTime);?>


```

2. File Upload
```
In a controller
use libs\FileUploader;

In an action within a controller

$inputFileName is the name attribute of file input within the views

example
<input type="file" name="inputFile" .. />

$destinationPath is path to a directory to which the file will be uploaded

$includeTimestamp is an option which tells wether to append timestamp to filename
or not default value is false

uploadFile($inputFileName, $destinationPath, $includeTimeStamp) 

The function will return success or an error response

success response will look as:

{
  type: 1,
  typeDescription: "Success",
  completePath: "uploads/Reports-19-06-10 12:56:56.pdf",
  usedName: "Reports-19-06-10 12:56:56.pdf",
  fileInput: {
    name: "Reports.pdf",
    type: "application/pdf",
    tmp_name: "/tmp/phpHKsE3q",
    error: 0,
    size: 65021
  }
}

error response will look as

{
  type: 0,
  typeDescription: "Error",
  message: "Upload Process failed",
  fileInput: {
    name: "",
    type: "",
    tmp_name: "",
    error: 4,
    size: 0
  }
}



```
