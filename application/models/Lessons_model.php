<?php

class Lessons_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLessons($academicid)
    {
        $resarr = array();
        $arr = $this->db->get_where('lessons', array('academic' => $academicid))->result_array();

        foreach ($arr as $item) {
            $item['homeworks'] = $this->getHomeworks($item['id']);
            $item['students'] = $this->getLessonStudents($item['id']);
            $resarr[] = $item;
        }
        return $resarr;
    }

    public function getLessonStudents($id)
    {
        $res = $this->db->get_where('lessonforstu', array('lessonid' => $id))->result_array();
        return $this->clearArray($res);
    }

    public function clearArray($res)
    {
        $resarr = array();
        foreach ($res as $re) {
            $resarr[] = $re['studentid'];
        }
        return $resarr;
    }

    public function getLessonsAll($id)
    {
        $derslistesi = $this->db->select('lessonid')->get_where('lessonforstu', array('studentid' => $id))->result_array();
        if (count($derslistesi) > 0){
            foreach ($derslistesi as $item) {
                $arr = $this->db->get_where('lessons',array('id' => $item['lessonid']))->result_array();
            }

            $resarr = array();



            foreach ($arr as $item) {
                $item['academic'] = $this->getAcademicName($item['academic']);
                $item['homeworks'] = $this->getHomeworks($item['id']);
                $resarr[] = $item;
            }
            return $resarr;

        }else{
            return array();
        }
    }

    private function getAcademicName($academicID)
    {
        return $this->db->get_where('uye', array('id' => $academicID))->result_array()[0]['name'];
    }

    public function getHomeworks($lessonid)
    {
        return $this->db->get_where('homeworks', array('lessonid' => $lessonid))->result_array();
    }

    public function addLesson($id, $name)
    {
        return $this->db->insert('lessons', array('name' => $name, 'academic' => $id));
    }

    public function deleteLesson($lessonID)
    {
        return $this->db->where('id', $lessonID)->delete('lessons');
    }

    public function addHomework($data)
    {
        return $this->db->insert('homeworks', $data);
    }

    public function getDocsForHws($hws_array)
    {
        $resArr = array();
        foreach ($hws_array as $hws) {
            $hws['count'] = $this->db->select("COUNT(*) as count")->from('docs')->where('hwid', $hws['id'])->get()->result_array()[0]['count'];
            $resArr[] = $hws;
        }
        return $resArr;
    }

    public function getHWDetail($hwid, $type)
    {
        $hw = $this->db->get_where('homeworks', array('id' => $hwid))->result_array()[0];

        if ($type == "1") {
            $hw['docs'] = $this->db->get_where('docs', array('hwid' => $hw['id']))->result_array();
            $tempdocs = array();
            foreach ($hw['docs'] as $doc) {
                $doc['stu'] = $this->db->get_where('uye', array('id' => $doc['studentid']))->result_array()[0];
                $tempdocs[] = $doc;
            }
            unset($hw['docs']);
            $hw['docs'] = $tempdocs;
        }

        $hw['lesson'] = $this->db->get_where('lessons', array('id' => $hw['lessonid']))->result_array()[0];
        $hw['academic'] = $this->db->get_where('uye', array('id' => $hw['lesson']['academic']))->result_array()[0];
        return $hw;
    }

    public function gradeHw($docid, $note)
    {
        return $this->db->where('id', $docid)->update('docs', array('note' => $note));
    }

    public function checkUploaded($userid, $hwid)
    {
        $arr = $this->db->get_where('docs', array('studentid' => $userid, 'hwid' => $hwid));
        if ($arr->result_id->num_rows > 0) {
            return $arr->result_array()[0];
        } else {
            return array();
        }
    }

    public function getStudents()
    {
        return $this->db->get_where('uye', array('type' => '2'))->result_array();
    }

    public function deleteStudentsFromLesson($lessonid)
    {
        return $this->db->where('lessonid', $lessonid)->delete('lessonforstu');
    }

    public function applyStudentsToLesson($data)
    {
        return $this->db->insert_batch('lessonforstu', $data);
    }
}