
<?php $this->load->view('parts/head.php');?>
<div class="row">
    <div class="col-12">
        <div class="my-5">
            <h3><?= match ($USER->type){
                    "0" => "Kullanıcılar",
                    default => "Profilim",
                }?></h3>
            <hr>
        </div>


        <?php if ($USER->type == "0"){?>
        <div class="">
            <table class="table table-borderless table-striped text-center">
                <thead>
                <th>id</th>
                <th>Ad Soyad</th>
                <th>Mail Adresi</th>
                <th>Kullanıcı Adı</th>
                <th>Şifre</th>
                <th>Hesap Türü</th>
                <th>#</th>
                </thead>
                <tbody>
                <?php foreach ($INFOS as $info){ ?>
                    <tr>
                        <td class="align-middle"><?=$info['id']?></td>
                        <td class="align-middle"><?=$info['name']?></td>
                        <td class="align-middle"><?=$info['mail']?></td>
                        <td class="align-middle"><?=$info['username']?></td>
                        <td class="align-middle"><?=$info['password']?></td>
                        <td class="align-middle"><?=match ($info['type']){
                            "0" => "Yönetici",
                            "1" => "Akademisyen",
                            "2" => "Öğrenci",
                            }?></td>
                        <td class="align-middle">
                            <?php if ($info['type'] !== "0"){ ?>
                                <a href="<?=base_url('User/Delete/' . $info['id'])?>">
                                    <i class="fa-solid fa-2x text-danger fa-xmark"></i>
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                <form action="<?=base_url('User/adduser')?>" method="post">
                    <tr>
                        <td></td>
                        <td><input type="text" name="name" placeholder="Ad Soyad" class="form-control" required></td>
                        <td><input type="mail" name="mail" placeholder="Mail Adresi" class="form-control" required></td>
                        <td><input type="text" name="username" placeholder="Kullanıcı Adı" class="form-control" required></td>
                        <td><input type="text" name="password" placeholder="Şifre" class="form-control" required></td>
                        <td>
                            <select name="type" id="type" class="form-control" required>
                                <option selected disabled>Hesap Türü Seçin</option>
                                <option value="1">Akademisyen</option>
                                <option value="2">Öğrenci</option>
                            </select>
                        </td>
                        <td><button class="btn btn-success" type="submit" name="addUser">Ekle</button></td>
                    </tr>
                </form>
                </tbody>
            </table>
        </div>
        <?php }else{ ?>
            <div class="row mb-5" style="justify-content:center;">
                <div class="col-6">
                    <form action="<?=base_url('User/updateMe')?>" method="post">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="ad">Ad Soyad :</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?=$INFOS['name']?>">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="username">Kullanıcı Adı :</label>
                                <input type="text" class="form-control" value="<?=$INFOS['username']?>" disabled>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="mail">Mail Adresi :</label>
                                <input type="email" class="form-control" id="mail" name="mail" value="<?=$INFOS['mail']?>">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="password">Şifreniz :</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?=$INFOS['password']?>">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-outline-success">Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>








    </div>
</div>

<?php $this->load->view('parts/foot.php');?>