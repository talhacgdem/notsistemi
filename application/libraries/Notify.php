<?php
class Notify {

    public function setNotify($msg, $type){
        $_SESSION['NOTIFY'] = array('msg' => $msg, 'type' => $type);
    }

    public function getNotify(){
        $s = empty($_SESSION['NOTIFY']) ? null : $_SESSION['NOTIFY'];
        unset($_SESSION['NOTIFY']);
        return $s;
    }

    public function dateFormat($format, $datetime = 'now')
    {
        $z = date("$format", strtotime($datetime));
        $gun_dizi = array(
            'Monday' => 'Pazartesi',
            'Tuesday' => 'Salı',
            'Wednesday' => 'Çarşamba',
            'Thursday' => 'Perşembe',
            'Friday' => 'Cuma',
            'Saturday' => 'Cumartesi',
            'Sunday' => 'Pazar',
            'January' => 'Ocak',
            'February' => 'Şubat',
            'March' => 'Mart',
            'April' => 'Nisan',
            'May' => 'Mayıs',
            'June' => 'Haziran',
            'July' => 'Temmuz',
            'August' => 'Ağustos',
            'September' => 'Eylül',
            'October' => 'Ekim',
            'November' => 'Kasım',
            'December' => 'Aralık',
            'Mon' => 'Pts',
            'Tue' => 'Sal',
            'Wed' => 'Çar',
            'Thu' => 'Per',
            'Fri' => 'Cum',
            'Sat' => 'Cts',
            'Sun' => 'Paz',
            'Jan' => 'Oca',
            'Feb' => 'Şub',
            'Mar' => 'Mar',
            'Apr' => 'Nis',
            'Jun' => 'Haz',
            'Jul' => 'Tem',
            'Aug' => 'Ağu',
            'Sep' => 'Eyl',
            'Oct' => 'Eki',
            'Nov' => 'Kas',
            'Dec' => 'Ara',
        );
        foreach ($gun_dizi as $en => $tr) {
            $z = str_replace($en, $tr, $z);
        }
        if (strpos($z, 'Mayıs') !== false && strpos($format, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
        return $z;
    }

}