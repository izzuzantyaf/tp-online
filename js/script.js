// your JS script goes here
$(function () {
    let BASEURL = "";
    switch (location.hostname) {
        case 'labfisdas.epizy.com':
            BASEURL = "http://" + location.hostname;
            break;
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


    // upload soal
    function append_soal() {
        let input_soal_form = $("#input_soal");
        input_soal_form.html('');

        let giliran = $("select[name=giliran]").val();
        let modul = $("select[name=modul]").val();

        // get soal TP
        let array_soal_kunci = [];
        $.getJSON(`${BASEURL}/admin/get_soal/${giliran}/` + modul.toLowerCase(), function (data) {
            // delete unecessary prop
            delete data.id;
            delete data.giliran;
            delete data.modul;

            for (const key in data) {
                if (data.hasOwnProperty(key)) {
                    array_soal_kunci.push(data[key]);
                }
            }

            for (let index = 0; index < array_soal_kunci.length; index++) {
                array_soal_kunci[index] = [
                    array_soal_kunci[index],
                    array_soal_kunci[index + 1],
                    array_soal_kunci[index + 2],
                    array_soal_kunci[index + 3]
                ];
                array_soal_kunci.splice(index + 1, 3);
            }
            console.log(array_soal_kunci);

            if (array_soal_kunci.length === 0) {

            } else {
                $("select#jumlah_soal").attr('disabled', 'disabled');
                for (let index = 0; index < array_soal_kunci.length; index++) {
                    const element = array_soal_kunci[index];
                    input_soal_form.append( /*html*/ `
                        <div class="col-sm-6">
                            <div div div class = "form-group soal${index+1}" id="soal${index+1}">
                                <label>Soal no ${index+1}</label>
                                <br>
                                <div class="btn-group mb-2">
                                    <button type="button" class="btn btn-default text_form">
                                        <i class="fas fa-align-left"></i>
                                    </button>
                                    <button type="button" class="btn btn-default img_form">
                                        <i class="far fa-file-image"></i>
                                    </button>
                                    <input type="hidden" name="jenis_soal${index+1}" value="${element[1]}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div div div class = "form-group kunci${index+1}"
                            id="kunci${index+1}">
                                <label>Kunci Jawaban no ${index+1}</label>
                                <br>
                                <div class="btn-group mb-2">
                                    <button type="button" class="btn btn-default text_form">
                                        <i class="fas fa-align-left"></i>
                                    </button>
                                    <button type="button" class="btn btn-default img_form">
                                        <i class="far fa-file-image"></i>
                                    </button>
                                    <input type="hidden" name="jenis_kunci${index+1}" value="${element[3]}">
                                </div>
                            </div>
                        </div>
                `);

                    switch (element[1]) {
                        case 'gambar':
                            $(".soal" + (index + 1)).append( /*html*/ `
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="${BASEURL}/files/soal_tp/${giliran}/${modul}/${element[0]}" alt="Card image cap">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="soal${index+1}" name="soal${index+1}" value='${element[0]}'>
                    </div>
                    `);
                            break;
                        default:
                            $(".soal" + (index + 1)).append( /*html*/ `
                    <textarea name="soal${index+1}" class="form-control" rows="3" placeholder="Enter ...">${element[0]}</textarea>
                    `);
                            break;
                    }

                    switch (element[3]) {
                        case 'gambar':
                            $(".kunci" + (index + 1)).append( /*html*/ `
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="${BASEURL}/files/soal_tp/${giliran}/${modul}/${element[2]}" alt="Card image cap">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="kunci${index+1}" name="kunci${index+1}">
                    </div>
                    `);
                            break;

                        default:
                            $(".kunci" + (index + 1)).append( /*html*/ `
                    <textarea name="kunci${index+1}" class="form-control" rows="3" placeholder="Enter ...">${element[2]}</textarea>
                    `);
                            break;
                    }

                }
            }

            let current_val;

            $('.img_form').on('click', function () {
                let ancestor_info = $(this).parent().parent().attr('id');
                current_val = $("textarea[name=" + ancestor_info + "]").html();
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
            <textarea name="${ancestor_info}" class="form-control" rows="3" placeholder="Enter ...">${current_val}</textarea>
            `);
                $(this).offsetParent().next().next().remove();

                $(this).offsetParent().children('input').attr('value', 'tulisan');
            });
        });
    }
    append_soal();

    $("select#jumlah_soal").on("click", function () {
        // ambil value yang baru
        jumlah_soal = parseInt($("#jumlah_soal").val());
        // hapus semua form soal sebelumnya
        input_soal_form.html("");
        // lakukan pengulangan insert form input soal
        for (let index = 1; index <= jumlah_soal; index++) {
            append_form_soal(index);
        }

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

    $("select[name=giliran], select[name=modul]").on('click', function () {
        append_soal();
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