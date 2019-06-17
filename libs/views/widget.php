<div class="file-uploader-widget">
        <div class="chosenFile">

            <ul class="list-group" id="chosenFileDescriptionContainer" style="display: none">
                <li class="list-group-item" id="chosenFileDescription" style="display: none">
                    <i class="glyphicon glyphicon-file"></i>
                </li>
            </ul>

        </div>
    

    <br>

    <div class="file-attachment pull-right">

        <input type='file' id="nativeFileInput" name="nativeFileInput" style="display: none"/>

        <span>
            <i class="glyphicon glyphicon-paperclip" title="Add a file" style="cursor: pointer"
               id="customFileInput"></i>
        </span>

    </div>

    <script>
        $('#newDocumentBtn').click(() => {
            $('#newDocumentModal').modal('show');
        });

        $('#nativeFileInput').change(() => {
            const nativeFileDom = $('#nativeFileInput');
            const fileName = nativeFileDom[0].files[0].name;
            const fileSize = (nativeFileDom[0].files[0].size / (1024 * 1024)).toFixed(3);
            let fileDescription = `File name: ${fileName}, File size: ${fileSize} MB`;
            const closeButton = `<i class='glyphicon glyphicon-remove pull-right' id='btnRemoveFile' title='Remove this file' onclick='removeFile()'></i>`;
            fileDescription += closeButton;
            $('#chosenFileDescription').html($('#chosenFileDescription').html() + fileDescription);
            $('#chosenFileDescriptionContainer').css('display','block');
            $('#chosenFileDescription').css('display', 'block');
        });

        document.getElementById('customFileInput').onclick = () => {
            const nativeFileDom = $('#nativeFileInput');
            nativeFileDom.click();
        };

        const removeFile = () => {
            $('#nativeFileInput').val('');
            $('#chosenFileDescription').html('');
            $('#chosenFileDescriptionContainer').css('display','none');
            $('#chosenFileDescription').css('display', 'none');
            
        };
    </script>
</div>