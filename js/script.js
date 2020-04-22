// your JS script goes here
$(function () {
    let BASEURL = "";
    switch (location.hostname) {
        default:
            BASEURL = "http://" + location.hostname + "/tponline";
            break;
    }
    // halaman login asisten behaviour
    let section_id = $("section").attr("id");
    if (section_id === "login_asisten") {
        $("#login_asisten_link").remove();
    }
    // halaman login asisten behaviour
    $.getJSON(BASEURL + "/admin/get_soal/1/glb", function (data) {
        console.log(data);
    });

    // upload soal
    let input_soal_form = $("#input_soal");
    // let giliran =  $("#giliran").val();
    // let modul = $("#modul").attr('value');

    function append_form_soal(jumlah_soal = 1) {
        for (let i = 1; i <= jumlah_soal; i++) {
            input_soal_form.append( /*html*/ `
                    <div class="col-sm-6">
                            <div class="form-group" id="soal${i}">
                                <label>Soal no ${i}</label>
                                <br>
                                <div class="btn-group mb-2">
                                    <button type="button" class="btn btn-default text_form">
                                        <i class="fas fa-align-left"></i>
                                    </button>
                                    <button type="button" class="btn btn-default img_form">
                                        <i class="far fa-file-image"></i>
                                    </button>
                                    <input type="hidden" name="jenis_soal${i}" value="tulisan">
                                </div>
                                <textarea name="soal${i}" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group" id="kunci${i}">
                                <label>Kunci Jawaban no ${i}</label>
                                <br>
                                <div class="btn-group mb-2">
                                    <button type="button" class="btn btn-default text_form">
                                        <i class="fas fa-align-left"></i>
                                    </button>
                                    <button type="button" class="btn btn-default img_form">
                                        <i class="far fa-file-image"></i>
                                    </button>
                                    <input type="hidden" name="jenis_kunci${i}" value="tulisan">
                                </div>
                                <textarea name="kunci${i}" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                        </div>
            `);
        }
    }
    append_form_soal();

    $("select#jumlah_soal").on("click", function () {
        // ambil value yang baru
        jumlah_soal = parseInt($("#jumlah_soal").val());
        // hapus semua form soal sebelumnya
        input_soal_form.html("");
        // lakukan pengulangan insert form input soal
        append_form_soal(jumlah_soal);

        $('.img_form').on('click', function () {
            let ancestor_info = $(this).parent().parent().attr('id');
            // console.log(ancestor_info);
            $(this).offsetParent().next().replaceWith( /*html*/ `
            <div class="form-group">
                <input type="file" class="form-control-file" id="${ancestor_info}" name="${ancestor_info}">
            </div>
            `);

            $(this).offsetParent().children('input').attr('value', 'gambar');
        });

        $('.text_form').on('click', function () {
            let ancestor_info = $(this).parent().parent().attr('id');
            // console.log(ancestor_info);
            $(this).offsetParent().next().replaceWith( /*html*/ `
            <textarea name="${ancestor_info}" class="form-control" rows="3" placeholder="Enter ..."></textarea>
            `);

            $(this).offsetParent().children('input').attr('value', 'tulisan');
        });
    });
    // upload soal


    //Date range picker with time picker
    // $('#reservationtime').daterangepicker({
    //     timePicker: true,
    //     timePickerIncrement: 30,
    //     locale: {
    //         format: 'MM/DD/YYYY hh:mm A'
    //     }
    // });
});