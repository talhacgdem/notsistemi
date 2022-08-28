<?php

class Lessons extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

/*
 * SESSION KONTROLÜ. Açılmış bir oturum yok ise login sayfasına yönlendirir
 */
        if ($this->session->userdata('USER') == null) {
            redirect(base_url('Login'));
        }
        $this->USER = (object)$this->session->userdata('USER');


//        Bu sayfaya yönetici hesabının girişi engellenir. Yönetici yalnızca kullanıcı yönetimini üstlenir.
        if ($this->USER->type == "0") {
            redirect(base_url('User'));
        }
        $this->load->model('lessons_model');
    }

    private object $USER;

    public function index()
    {


        $data = array(
            'USER' => $this->USER,
            'LESSONS' => match ($this->USER->type) {
                /*
                 * Giriş yapan hesap ;
                 * -> (1) Akademisyen ise kendi açmış olduğu dersler çağırılır
                 * -> (2) Öğrenci ise aldığı dersler çağırılır
                 */
                '1' => $this->lessons_model->getLessons($this->USER->id),
                '2' => $this->lessons_model->getLessonsAll($this->USER->id)
            },
            'STUDENTS' => $this->lessons_model->getStudents(),
        );

        $this->load->view('lessons', $data);
    }


//    Homework sayfası açılır, derse ait ödevler listelenir
    public function homework($id = 0)
    {
        if ($id == 0) {
            $this->notify->setNotify('Önce ödev seçmelisiniz', 'danger');
            redirect(base_url('Lessons'));
        }

        $data = array(
            'USER' => $this->USER,
            'HW' => $this->lessons_model->getHWDetail($id, $this->USER->type),
        );
        if ($this->USER->type == "2") {
            $data['isUploadedHw'] = $this->lessons_model->checkUploaded($this->USER->id, $id);
        }

        $this->load->view('homeworks', $data);
    }

//    Bir ödeve ait notlandırma işlemi yapılır
    public function gradeHw()
    {
        $this->checkAccess();
        $docid = $this->input->post('docid');
        $note = $this->input->post('note');
        $hwid = $this->input->post('hwid');
        if ($this->lessons_model->gradeHw($docid, $note)) {
            $this->notify->setNotify('Not kaydedildi', 'success');
        } else {
            $this->notify->setNotify('Not kaydedilemedi', 'danger');
        }
        redirect(base_url('Lessons/homework/') . $hwid);
    }


//    Yetki kontrolü. Hesap tipi akademisyen değilse notlandırma, ders ekleme gibi işlemler engellenir.
    private function checkAccess()
    {
        if ($this->USER->type !== "1") {
            $this->notify->setNotify('Bu işlem için  yetkili değilsiniz', 'danger');
            redirect(base_url('Lessons'));
        }
    }

//    Ders ekleme işlemi
    public function addLesson()
    {
        $this->checkAccess();
        $name = $this->input->post('name');
        if ($name == "") {
            $this->notify->setNotify('Ders adı boş bırakılamaz', 'danger');
            redirect(base_url('Lessons'));
        } else {
            if ($this->lessons_model->addLesson($this->USER->id, $name)) {
                $this->notify->setNotify('Ders başarıyla eklendi', 'success');
            } else {
                $this->notify->setNotify('Ders kaydedilemedi', 'danger');
            }
            redirect(base_url('Lessons'));
        }
    }

//    Var olan dersi silme işlemi
    public function DeleteLesson($lessonID)
    {
        $this->checkAccess();
        if ($this->lessons_model->deleteLesson($lessonID)) {
            $this->notify->setNotify('Ders başarıyla silindi', 'success');
        } else {
            $this->notify->setNotify('Ders silinemedi', 'danger');
        }
        redirect(base_url('Lessons'));
    }

//    Varolan derse ödev ekleme işlemi
    public function addHomework()
    {
        $caption = $this->input->post('hwCaption');
        $description = $this->input->post('hwDescription');
        $lastdate = $this->input->post('hwLastDate');
        $lessonid = $this->input->post('lessonid');


        $data = array(
            'caption' => $caption,
            'description' => $description,
            'lastdate' => date("Y-m-d 23:59:59", strtotime($lastdate)),
            'lessonid' => $lessonid
        );

        $this->checkAccess();

        if ($this->lessons_model->addHomework($data)) {
            $this->notify->setNotify('Ödev Eklendi', 'success');
        } else {
            $this->notify->setNotify('Ödev Eklenemedi', 'danger');
        }
        redirect(base_url('Lessons'));
        print_r($data);
    }


//    ders idsine göre içerdiği ödev listesi çekilir
    public function getHomeworks()
    {
        $hws = $this->lessons_model->getHomeworks($this->input->post('lessonid'));
        foreach ($hws as $k => $hw) {
            $hw['lastdate'] = $this->notify->dateFormat("j F Y H:i:s");
            $hws[$k] = $hw;
        }
        $hws = $this->lessons_model->getDocsForHws($hws);
        echo json_encode($hws, JSON_UNESCAPED_UNICODE);
    }


//    Öğrencileri derse ekler veya çıkarır
//    public function addStudentToLesson()
//    {
//        $lessonid = $this->input->post('lessonid');
//        $students = $this->input->post('stuID');
//
//        $data = array();
//        foreach ($students as $student) {
//            $data[] = array('studentid' => $student, 'lessonid' => $lessonid);
//        }
//
//        print_r($data);
//
//    }

    //    Öğrencileri derse ekler veya çıkarır
    public function editStudentsOnLesson()
    {
        $data = array();
        $lessonid = $this->input->post('lessonid');
        $students = $this->input->post('stuID');

        $this->lessons_model->deleteStudentsFromLesson($lessonid);
        $this->notify->setNotify('Öğrenci kaydı başarılı', 'success');
        if (is_array($students) && count($students) > 0) {
            foreach ($students as $student) {
                $data[] = array(
                    'lessonid' => $lessonid,
                    'studentid' => $student
                );
            }
            if ($this->lessons_model->applyStudentsToLesson($data)){
                $this->notify->setNotify('Öğrenci kaydı başarılı', 'success');
            }else{
                $this->notify->setNotify('Öğrenci kaydı başarısız', 'success');
            }
        }
        redirect(base_url('Lessons'));
    }


}