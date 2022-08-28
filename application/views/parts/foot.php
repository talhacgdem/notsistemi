</div>
</main>
<footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-end small">
                    <div class="text-muted">Copyright &copy; Muhammed Veysel Yavuz <script>document.write(new Date().getFullYear())</script></div>

                </div>
            </div>
        </footer>
    </div>
</div>
<script src="<?=base_url('depends/js/jquery.js')?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?=base_url('depends/')?>js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?=base_url('depends/')?>js/datatables-simple-demo.js"></script>
<script src="https://kit.fontawesome.com/0f11fb3fb1.js" crossorigin="anonymous"></script>
<script src="<?=base_url('depends/')?>js/bootstrap.bundle.js"></script>
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>

<?php
$url = $this->uri->segment(1);
$url2 = $this->uri->segment(2);
if ($url == "Lessons" && $url2 != "homework"){
    ?>
<script>
    var homeworkModal = new bootstrap.Modal(document.getElementById('addHomeworkModal'));
    $('.addHomework').on('click', function (){
        var id = $(this).attr('data-lessonid');
        var name = $(this).attr('data-lesson');
        $('#addHomeworkModalLabel').text(name + " adlı derse yeni ödev ekle");
        $('#lessonid').val(id);
        homeworkModal.show();
    });
</script>

    <script>
        $('.homeworks-click').on('click', function (){
            if ($(this).text().trim() !== "0"){
                var lessonID = $(this).attr("data-lessonid");
                var lesson = $(this).attr("data-lesson");

                $('#lessonname').text(lesson + " için Ödevler");

                $.ajax({
                    method: "POST",
                    url: "<?=base_url('Lessons/getHomeworks')?>",
                    data: { lessonid: lessonID },
                    contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                })
                    .done(function( hws ) {
                        var hws_arr = JSON.parse(hws);
                        var html = "";
                        $.each(hws_arr,function(k,v){
                            html += "<tr><td>"+v.caption+"</td><td>"+v.description+"</td><td>"+v.lastdate+"</td><td>"+v.count+"</td><td><a href='<?=base_url('Lessons/homework/')?>"+v.id+"'>Detay</a></td></tr>";
                        })
                        $('#homework-table').html(html);
                        $('.homeworks-area').fadeIn();
                    });
            }
        });
    </script>

    <script>
        var editStudentModal = new bootstrap.Modal(document.getElementById('editStudentModal'));
        $('.editStudent').on('click', function (){
            var checks = $('.stuID');
            var id = $(this).attr('data-lessonid');
            var name = $(this).attr('data-lesson');

            $.each(checks, function(k,v){
                var lessons = $(this).attr('data-lessons').split(",");
                if ($.inArray(id, lessons) !== -1){
                    $(this).prop('checked', true);
                }else{
                    $(this).prop('checked', false);
                }
            });

            $('#editStudentModalLabel').text(name + " adlı dersin öğrenci listesi");
            $('#lessonid2').val(id);
            editStudentModal.show();
        });
    </script>

<?php } ?>

</body>
</html>


