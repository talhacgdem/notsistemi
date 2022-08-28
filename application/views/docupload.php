

    <style>
        #upload-main-area {
        }

        .upload-form .file {
            width: 50vw;
            height: 20vh;
            border: 4px dashed #222;
            position: relative;
        }

        .upload-form .drop-text {
            text-align: center;
            margin: 0;
            color: #222;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .upload-form input[type=file] {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
        }

        /* -----------------------------------------------------
    CSS Progress Bars
 -------------------------------------------------------- */
        .cssProgress {
            width: 100%;
        }

        .cssProgress .progress1,
        .cssProgress .progress2,
        .cssProgress .progress3 {
            position: relative;
            overflow: hidden;
            width: 100%;
            font-family: "Roboto", sans-serif;
        }

        .cssProgress .cssProgress-bar {
            display: block;
            float: left;
            width: 0%;
            height: 100%;
            background: #3798d9;
            box-shadow: inset 0px -1px 2px rgba(0, 0, 0, 0.1);
            -webkit-transition: width 0.8s ease-in-out;
            transition: width 0.8s ease-in-out;
        }

        .cssProgress .cssProgress-label {
            position: absolute;
            overflow: hidden;
            left: 0px;
            right: 0px;
            color: rgba(0, 0, 0, 0.6);
            font-size: 0.7em;
            text-align: center;
            text-shadow: 0px 1px rgba(0, 0, 0, 0.3);
        }

        .cssProgress .cssProgress-info {
            background-color: #9575cd !important;
        }

        .cssProgress .cssProgress-danger {
            background-color: #ef5350 !important;
        }

        .cssProgress .cssProgress-success {
            background-color: #66bb6a !important;
        }

        .cssProgress .cssProgress-warning {
            background-color: #ffb74d !important;
        }

        .cssProgress .cssProgress-right {
            float: right !important;
        }

        .cssProgress .cssProgress-label-left {
            margin-left: 10px;
            text-align: left !important;
        }

        .cssProgress .cssProgress-label-right {
            margin-right: 10px;
            text-align: right !important;
        }

        .cssProgress .cssProgress-label2 {
            display: block;
            margin: 2px 0;
            padding: 0 8px;
            font-size: 0.8em;
        }

        .cssProgress .cssProgress-label2.cssProgress-label2-right {
            text-align: right;
        }

        .cssProgress .cssProgress-label2.cssProgress-label2-center {
            text-align: center;
        }

        .cssProgress .cssProgress-stripes,
        .cssProgress .cssProgress-active,
        .cssProgress .cssProgress-active-right {
            background-image: -webkit-linear-gradient(135deg, rgba(255, 255, 255, 0.125) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.125) 50%, rgba(255, 255, 255, 0.125) 75%, transparent 75%, transparent);
            background-image: linear-gradient(-45deg, rgba(255, 255, 255, 0.125) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.125) 50%, rgba(255, 255, 255, 0.125) 75%, transparent 75%, transparent);
            background-size: 35px 35px;
        }

        .cssProgress .cssProgress-active {
            -webkit-animation: cssProgressActive 2s linear infinite;
            -ms-animation: cssProgressActive 2s linear infinite;
            animation: cssProgressActive 2s linear infinite;
        }

        .cssProgress .cssProgress-active-right {
            -webkit-animation: cssProgressActiveRight 2s linear infinite;
            -ms-animation: cssProgressActiveRight 2s linear infinite;
            animation: cssProgressActiveRight 2s linear infinite;
        }

        @-webkit-keyframes cssProgressActive {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 35px 35px;
            }
        }

        @-ms-keyframes cssProgressActive {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 35px 35px;
            }
        }

        @keyframes cssProgressActive {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 35px 35px;
            }
        }

        @-webkit-keyframes cssProgressActiveRight {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: -35px -35px;
            }
        }

        @-ms-keyframes cssProgressActiveRight {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: -35px -35px;
            }
        }

        @keyframes cssProgressActiveRight {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: -35px -35px;
            }
        }

        .progress3 {
            width: auto !important;
            padding: 4px;
            background-color: rgba(0, 0, 0, 0.1);
            box-shadow: inset 0px 1px 2px rgba(0, 0, 0, 0.2);
            border-radius: 3px 0 0 3px;
        }

        .progress3 .cssProgress-bar {
            height: 16px;
            border-radius: 3px;
        }

        .progress3 .cssProgress-label {
            line-height: 16px;
        }

        #percent-span {
            width: auto !important;
            background-color: rgba(0, 0, 0, 0.1);
            box-shadow: inset 0px 1px 2px rgba(0, 0, 0, 0.2);
            border-radius: 0 3px 3px 0;
        }

    </style>

<?php if (count($isUploadedHw) > 0){ ?>
    <table class="table table-borderless">
        <tbody>
            <tr>
                <td class="text-end">Dosya Adı : </td>
                <td><a href="<?=base_url('uploaded/'). $isUploadedHw['path']?>" target="_blank"><?=$isUploadedHw['docname']?></a></td>
                <td class="text-end">Tarih :</td>
                <td><?=$this->notify->dateFormat('j F Y H:i:s', $isUploadedHw['date'])?></td>
            </tr>
        <tr>
            <td colspan="2" class="text-end">Not :</td>
            <td colspan="2"><?= $isUploadedHw['note'] > 0 ? $isUploadedHw['note'] : 'Değerlendirme yapılmamış'?></td>
        </tr>
        </tbody>
    </table>
<?php }else{ ?>
    <div id="upload-main-area" class="d-flex justify-content-center align-items-center">
        <form id="uploadForm" class="upload-form" method="post" enctype="multipart/form-data" action="<?=base_url('Upload')?>">
            <input type="hidden" name="hwid" value="<?=$HomeWorkID?>">
            <input type="hidden" name="userid" value="<?=$USER->id?>">


            <div class="file mb-3">

                <p id="drop-text" class="drop-text">Dosyanızı seçin veya sürükleyin</p>
                <input id="file" type="file" style="cursor: pointer" name="file" required>
            </div>

            <div class="d-flex justify-content-end align-items-center mb-3">

                <button id="submitbtn" type="submit" class="btn btn-outline-success">Gönder</button>
            </div>

            <div id="statusarea" class="d-none">
                <div id="uploadStatus" class="d-flex justify-content-center"></div>
                <div class="upload-progress d-flex justify-content-between align-items-center">
                    <div class="cssProgress">
                        <div class="progress3">
                            <div class="cssProgress-bar cssProgress-warning cssProgress-active"
                                 data-percent="55" style="transition: none 0s ease 0s; width: 0%;">
                        <span class="cssProgress-label">
                            <i class="fas fa-cog fa-spin" aria-hidden="true" style="font-size: 1.4em"></i>
                        </span>
                            </div>
                        </div>
                    </div>

                    <div id="percent-span" class="px-2 bg-success text-white font-weight-bolder">
                        <span class="text-nowrap">50 %</span>
                    </div>

                </div>

            </div>
            <div id="res-area" class="w-100 d-none">
                <p id="res" class="m-2 p-1 text-center rounded text-white">Dosyanız yüklendi</p>
            </div>

        </form>


    </div>



<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/0f11fb3fb1.js" crossorigin="anonymous"></script>

<script>



    function btnActive() {
        submitBtn.prop("disabled", false);
    }

    const status = $('#statusarea');
    const progress = $('#progress');
    const uploadresArea = $('#res-area');
    const uploadres = $('#res');
    const submitBtn = $('#submitbtn');
    const fileArea = $('#file');
    const form = $('#uploadForm');
    const progressBar = $(".progress-bar");
    const dropText = $('#drop-text')


    fileArea.on('change', function (){
        if (fileArea[0].files.length > 0) {
            dropText.text(fileArea[0].files[0].name);
        }else{
            dropText.text("Dosyanızı seçin veya sürükleyin");
        }
    });


    form.on('submit', function (e) {
        e.preventDefault();

        uploadres.text("");
        if (fileArea[0].files.length > 0) {
            submitBtn.prop("disabled", true);

            let fd = new FormData;
            fd.append('file', fileArea[0].files[0]);
            fd.append('hwid', <?=$HomeWorkID?>);
            fd.append('userid', <?=$USER->id?>);

            $.ajax({
                // Yükleme yüzdesi veren fonksiyon XHR
                xhr: function () {
                    status.removeClass('d-none');
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = Math.round((evt.loaded / evt.total) * 100);
                            $(".cssProgress-bar").width(percentComplete + '%');
                            $("#percent-span span").text(percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: '<?=base_url('Upload')?>',
                data: fd,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    progressBar.width('0%');
                },
                error: function () {
                    btnActive();
                },
                success: function (x) {
                    console.log(x);
                    var result = JSON.parse(x);

                    window.location.reload();

                }
            });
        } else {
            btnActive();
        }
    });
    </script>

<?php } ?>
