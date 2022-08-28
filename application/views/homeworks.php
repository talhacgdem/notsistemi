<?php $this->load->view('parts/head.php'); ?>

<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<a href="<?=base_url('Lessons')?>" class="text-danger"><p><i class="fa-solid fa-circle-arrow-left"></i> Derslere Geri Dön</p></a>
    <h1>Ders : <?=$HW['lesson']['name']?></h1>
    <h3>Ödev : <?=$HW['caption']?></h3>
    <h3>Akademisyen : <?=$HW['academic']['name']?></h3>


<div class="mt-4">
    <h5>Ödev İçeriği</h5>
    <p><?=$HW['description']?></p>
</div>




<?php if ($USER->type == "1"){ $docs = $HW['docs'];?>
    <div id="uploadedHw" class="mt-5" style="overflow-x: scroll;">
        <h5>Gönderilen ödevler</h5>
        <table class="table table-borderless table-striped text-center">
            <thead>
            <th class="text-nowrap">Not</th>
            <th class="text-nowrap">Öğrenci Adı</th>
            <th class="text-nowrap">Öğrenci Mail</th>
            <th class="text-nowrap">Ödev Dosyası</th>
            <th class="text-nowrap">Gönderim Zamanı</th>
            </thead>
            <tbody>
            <?php if (count($docs) > 0){ ?>
                <?php foreach ($docs as $doc){ ?>
                    <form action="<?=base_url('Lessons/gradeHw')?>" method="post">
                        <input type="hidden" name="docid" value="<?=$doc['id']?>">
                        <input type="hidden" name="hwid" value="<?=$HW['id']?>">
                        <tr>
                            <td class="align-middle">
                                <div class="input-group">
                                    <input type="number" class="form-control text-center w-auto" aria-describedby="button-addon2" min="0" max="100" name="note" value="<?=$doc['note'] == -1 ? '0' : $doc['note']?>" required>
                                    <button class="btn btn-success" type="submit" id="button-addon2">Not Ver</button>
                                </div>
                            </td>
                            <td class="align-middle"><?=$doc['stu']['name']?></td>
                            <td class="align-middle"><?=$doc['stu']['mail']?></td>
                            <td class="align-middle"><a href="<?=base_url('uploaded/') . $doc['path']?>" target="_blank"><?=$doc['path']?></a></td>
                            <td class="align-middle"><?=$this->notify->dateFormat('j F Y H:i:s', $doc['date']);?></td>
                        </tr>
                    </form>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="5" class="bg-danger text-center text-white">Henüz gönderim yapılmamış</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>
<?php }elseif($USER->type == "2") {

    $data = array(
        'USER' => $USER,
        'HomeWorkID' => $HW['id'],
        'isUploaded' => $isUploadedHw
    );
    $this->load->view('docupload', $data);

}
?>


<?php $this->load->view('parts/foot.php'); ?>

