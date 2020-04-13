// your JS script goes here
$(function () {

    // halaman login asisten behaviour
    let section_id = $("section").attr("id");
    if (section_id === "login_asisten") {
        $("#login_asisten_link").remove();
    }

    // upload soal
    let jumlah_soal = parseInt($("#jumlah_soal").val());
    let input_soal_form = $("#input_soal");

    $("select#jumlah_soal").on("click", function () {
        // ambil value yang baru
        jumlah_soal = parseInt($("#jumlah_soal").val());
        // hapus semua form soal sebelumnya
        input_soal_form.html("");
        // lakukan pengulangan insert form input soal
        for (let i = 1; i <= jumlah_soal; i++) {
            input_soal_form.append( /*html*/ `
                    <div class="col-sm-6">
                            <label>Soal no ${i}</label>
                            <br>
                            <div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
                                <label class="btn btn-light active">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked="">
                                    <i class="fas fa-align-left"></i>
                                </label>
                                <label class="btn btn-light">
                                    <input type="radio" name="options" id="option3" autocomplete="off">
                                    <i class="far fa-file-image"></i>
                                </label>
                            </div>
                            <textarea id="soal${i}" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kunci Jawaban no ${i}</label>
                            <br>
                            <div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
                                <label class="btn btn-light active">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked="">
                                    <i class="fas fa-align-left"></i>
                                </label>
                                <label class="btn btn-light">
                                    <input type="radio" name="options" id="option3" autocomplete="off">
                                    <i class="far fa-file-image"></i>
                                </label>
                            </div>
                            <textarea id="kunci${i}" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
            `);
        }
    });

    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
    })

});