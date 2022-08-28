<?php $this->load->view('parts/head.php'); ?>
<style>
    .homeworks-click {
        cursor: pointer;
    }
</style>

<div class="d-flex justify-content-between">
    <h1>Derslerim</h1>
    <?php if ($USER->type == "1") { ?>
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addLessonModal">
            <i class="fa-solid fa-plus"></i>
            Ders Ekle
        </button>
    <?php } ?>
</div>


<table class="table table-striped table-borderless text-center">
    <thead>
    <?php if ($USER->type == "1") { ?>
        <th>#</th>
    <?php } ?>
    <th>id</th>
    <th>Ders Adı</th>
    <?php if ($USER->type == "2") { ?>
        <th>Akademisyen</th>
    <?php } ?>
    <th>Ödev Sayısı</th>
    <?php if ($USER->type == "1") { ?>
        <th>Yeni Ödev</th>
        <th>Öğrenci</th>
    <?php } ?>
    </thead>
    <tbody>
    <?php if (count($LESSONS) > 0) {
        foreach ($LESSONS as $lesson) { ?>
            <tr>
                <?php if ($USER->type == "1") { ?>
                    <td class="align-middle">
                        <a href="<?= base_url('Lessons/DeleteLesson/' . $lesson['id']) ?>">
                            <i class="fa-solid fa-2x text-danger fa-xmark"></i>
                        </a>
                    </td>
                <?php } ?>
                <td class="align-middle"><?= $lesson['id'] ?></td>
                <td class="align-middle"><?= $lesson['name'] ?></td>
                <?php if ($USER->type == "2") { ?>
                    <td><?= $lesson['academic'] ?></td>
                <?php } ?>
                <td class="align-middle">
                    <u class="homeworks-click" data-lesson="<?= $lesson['name'] ?>"
                       data-lessonid="<?= $lesson['id'] ?>"><?= count($lesson['homeworks']) ?>
                    </u>
                </td>
                <?php if ($USER->type == "1") { ?>
                    <td class="align-middle">
                        <button class="addHomework btn btn-outline-primary" data-lesson="<?= $lesson['name'] ?>"
                                data-lessonid="<?= $lesson['id'] ?>">Ödev Ekle
                        </button>
                    </td>
                    <td class="align-middle">
                        <button class="editStudent btn btn-outline-success" data-lesson="<?= $lesson['name'] ?>"
                                data-lessonid="<?= $lesson['id'] ?>">Öğrenci Ekle
                        </button>
                    </td>
                <?php } ?>
            </tr>
        <?php }
    } else { ?>
        <tr>
            <td colspan="5" class="bg-danger text-white">Kayıtlı Dersiniz Yok</td>
        </tr>
    <?php } ?>
    </tbody>
</table>


<div class="homeworks-area px-5 mt-5" style="display: none">

    <h4 id="lessonname"></h4>
    <table class="table table-striped table-borderless text-center">
        <thead>
        <th>Ödev Başlığı</th>
        <th>Ödev İçeriği</th>
        <th>Son Tarih</th>
        <th>Toplam Yükleme Sayısı</th>
        <th>Ödev Detay</th>
        </thead>
        <tbody id="homework-table">

        </tbody>
    </table>

</div>


<div class="modal fade" id="addLessonModal" tabindex="-1" aria-labelledby="addLessonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLessonModalLabel">Ders Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('Lessons/addLesson') ?>" method="post">
                <div class="modal-body">
                    <label for="">Ders Adı:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                    <button type="submit" class="btn btn-primary">Ders Ekle</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStudentModalLabel">Öğrenci Ders Kaydı</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('Lessons/editStudentsOnLesson') ?>" method="post">
                <input type="hidden" id="lessonid2" name="lessonid" value="">
                <div class="modal-body">
                    <table class="table table-borderless table-striped">
                        <tbody>
                        <?php foreach ($STUDENTS as $student) {
                            $applyedLes = "";
                            $id = $student['id'];
                            foreach ($LESSONS as $les) {
                                if (is_int(array_search($id, $les['students']))) {
                                    $applyedLes .= $les['id'] . ",";
                                }
                            }
                            $applyedLes = rtrim($applyedLes, ",");

                            ?>
                            <tr>
                                <td><input type="checkbox" data-lessons="<?= $applyedLes ?>" class="stuID form-check-input"
                                           name="stuID[]" value="<?= $student['id'] ?>"></td>
                                <td><?= $student['name'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="addHomeworkModal" tabindex="-1" aria-labelledby="addHomeworkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addHomeworkModalLabel">Ders Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('Lessons/addHomework') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Başlık :</label>
                        <input type="text" class="form-control" name="hwCaption" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Açıklaması :</label>
                        <input type="text" class="form-control" name="hwDescription" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Son Tarih :</label>
                        <input type="date" class="form-control" name="hwLastDate" value="<?= date('Y-m-d') ?>" required>
                    </div>
                    <input type="hidden" id="lessonid" name="lessonid" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                    <button type="submit" class="btn btn-primary">Ödev Ekle</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('parts/foot.php'); ?>

