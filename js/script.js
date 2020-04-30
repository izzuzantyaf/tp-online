// your JS script goes here
$(function () {
    let BASEURL = "";
    switch (location.hostname) {
        case 'tponline.epizy.com':
            BASEURL = "http://" + location.hostname;
            break;
        default:
            BASEURL = "http://" + location.hostname + "/tponline";
            break;
    }
    const ATURAN_SET = {
        A: [2, 6, 9, 10, 12],
        B: [1, 3, 7, 11, 13],
        C: [4, 5, 8, 10, 12],
        D: [0, 6, 7, 11, 13]
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

        $("form#hapus_tp").attr('action', `${BASEURL}/admin/hapus_soal/${modul}/${giliran}/`);

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

            if (array_soal_kunci.length === 0) {
                // hilangkan tombol delete
                $("button#delete_soal").remove();
                // lakukan pengulangan insert form input soal
                for (let index = 0; index < 14; index++) {
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
                                    <input type="hidden" name="jenis_soal${index+1}" value="tulisan">
                                </div>
                                <textarea name="soal${index+1}" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
                                    <input type="hidden" name="jenis_kunci${index+1}" value="tulisan">
                                </div>
                                <textarea name="kunci${index+1}" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                        </div>
                `);
                }

                let current_val;

                $('.img_form').on('click', function () {
                    let ancestor_info = $(this).parent().parent().attr('id');
                    let current_type = $(this).offsetParent().children('input').attr('value');
                    if (current_type === "gambar") {

                    } else {
                        current_val = $("textarea[name=" + ancestor_info + "]").val();
                        // console.log(ancestor_info);
                        $(this).offsetParent().next().replaceWith( /*html*/ `
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="${ancestor_info}" name="${ancestor_info}">
                        </div>
                        `);
                    }

                    $(this).offsetParent().children('input').attr('value', 'gambar');
                });

                $('.text_form').on('click', function () {
                    let ancestor_info = $(this).parent().parent().attr('id');
                    let current_type = $(this).offsetParent().children('input').attr('value');
                    // console.log(ancestor_info);
                    if (current_type === "tulisan") {

                    } else {
                        $(this).offsetParent().next().replaceWith( /*html*/ `
                        <textarea name="${ancestor_info}" class="form-control" rows="3" placeholder="Enter ...">${current_val}</textarea>
                        `);
                    }

                    $(this).offsetParent().children('input').attr('value', 'tulisan');
                });

            } else {
                $("select#jumlah_soal").parent().attr('style', 'display:none;');
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
                    <div class="card" style="width: 100%;">
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
                    <div class="card" style="width: 100%;">
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

                    let current_val = "";

                    $('.img_form').on('click', function () {
                        let current_type = $(this).offsetParent().children('input').attr('value');
                        if (current_type === 'gambar') {

                        } else {
                            let ancestor_info = $(this).parent().parent().attr('id');
                            current_val = $("textarea[name=" + ancestor_info + "]").val();
                            // console.log(ancestor_info.search("ci"));
                            let inner_index;
                            if (ancestor_info.search('soal') !== -1) {
                                inner_index = 0;
                            }
                            if (ancestor_info.search('kunci') !== -1) {
                                inner_index = 2;
                            }
                            // console.log(ancestor_info);
                            $(this).offsetParent().next().replaceWith( /*html*/ `
                            <div class="card" style="width: 100%;">
                                <img class="card-img-top" src="${BASEURL}/files/soal_tp/${giliran}/${modul}/${element[inner_index]}" alt="Card image cap">
                            </div>
                                <div class="form-group">
                                    <input type="file" class="form-control-file" id="${ancestor_info}" name="${ancestor_info}">
                                </div>
                            `);

                            $(this).offsetParent().children('input').attr('value', 'gambar');
                        }
                    });

                    $('.text_form').on('click', function () {
                        let current_type = $(this).offsetParent().children('input').attr('value');
                        if (current_type === 'tulisan') {

                        } else {
                            let ancestor_info = $(this).parent().parent().attr('id');
                            // current_val = $("textarea[name=" + ancestor_info + "]").html();
                            // console.log(ancestor_info);
                            $(this).offsetParent().next().replaceWith( /*html*/ `
                                <textarea name="${ancestor_info}" class="form-control" rows="3" placeholder="Enter ...">${current_val}</textarea>
                            `);
                            $(this).offsetParent().next().next().remove();

                            $(this).offsetParent().children('input').attr('value', 'tulisan');
                        }
                    });
                }
            }
        });
    }
    append_soal();

    $("select[name=giliran], select[name=modul]").on('click', function () {
        append_soal();
    });
    // upload soal

    // kerjakan soal
    function append_soal_ke_praktikan() {
        let input_jawaban_form = $("#input_jawaban");
        input_jawaban_form.html('');

        let giliran = $("select#giliran").val();
        let modul = $("select#modul").val();
        let set_soal = $("select#set_soal").val();

        let array_soal = [];
        $.getJSON(`${BASEURL}/praktikan/get_soal/${giliran}/` + modul.toLowerCase(), function (data) {
            delete data.id;
            delete data.giliran;
            delete data.modul;

            for (const key in data) {
                if (data.hasOwnProperty(key) && (key.search('soal') !== -1 || key.search('jenis_soal') !== -1)) {
                    array_soal.push(data[key]);
                }
            }

            for (let index = 0; index < array_soal.length; index++) {
                array_soal[index] = [
                    array_soal[index],
                    array_soal[index + 1]
                ];
                array_soal.splice(index + 1, 1);
            }

            array_soal = array_soal.filter((element, index) => {
                if (ATURAN_SET[set_soal].includes(index))
                    return element;
            });

            if (array_soal.length === 0) {

            } else {
                for (let index = 0; index < array_soal.length; index++) {
                    const element = array_soal[index];
                    input_jawaban_form.append( /*html*/ `
                            <div class="col-sm-6">
                                <div class = "form-group soal${index+1}" id="soal${index+1}">
                                    <label>Soal no ${index+1}</label>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class = "form-group jawaban${index+1}"
                                id="jawaban${index+1}">
                                    <label>Jawaban no ${index+1}</label>
                                    <br>
                                    <div class="btn-group mb-2">
                                        <button type="button" class="btn btn-default text_form">
                                            <i class="fas fa-align-left"></i>
                                        </button>
                                        <button type="button" class="btn btn-default img_form">
                                            <i class="far fa-file-image"></i>
                                        </button>
                                        <input type="hidden" name="jenis_jawaban${index+1}" value="tulisan">
                                    </div>
                                    <textarea name="jawaban${index+1}" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                    `);

                    switch (element[1]) {
                        case 'gambar':
                            $(".soal" + (index + 1)).append( /*html*/ `
                        <div class="card" style="width: 100%;">
                            <img class="card-img-top" src="${BASEURL}/files/soal_tp/${giliran}/${modul}/${element[0]}" alt="Card image cap">
                        </div>
                        `);
                            break;
                        default:
                            $(".soal" + (index + 1)).append( /*html*/ `
                        <textarea name="soal${index+1}" class="form-control" rows="3" placeholder="Enter ..." disabled>${element[0]}</textarea>
                        `);
                            break;
                    }

                    let current_val;

                    $('.img_form').on('click', function () {
                        let current_type = $(this).offsetParent().children('input').attr('value');
                        if (current_type === 'gambar') {

                        } else {
                            let ancestor_info = $(this).parent().parent().attr('id');
                            current_val = $("textarea[name=" + ancestor_info + "]").val();
                            console.log(current_val);
                            let inner_index;
                            if (ancestor_info.search('jawaban') !== -1) {
                                inner_index = 2;
                            }
                            // console.log(ancestor_info);
                            $(this).offsetParent().next().replaceWith( /*html*/ `
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" id="${ancestor_info}" name="${ancestor_info}">
                                    </div>
                                `);

                            $(this).offsetParent().children('input').attr('value', 'gambar');
                        }
                    });

                    $('.text_form').on('click', function () {
                        let current_type = $(this).offsetParent().children('input').attr('value');
                        if (current_type === 'tulisan') {

                        } else {
                            let ancestor_info = $(this).parent().parent().attr('id');

                            $(this).offsetParent().next().replaceWith( /*html*/ `
                                <textarea name="${ancestor_info}" class="form-control" rows="3" placeholder="Enter ...">${current_val}</textarea>
                            `);
                            $(this).offsetParent().next().next().remove();

                            $(this).offsetParent().children('input').attr('value', 'tulisan');
                        }
                    });

                }
            }
        });

    }
    append_soal_ke_praktikan();

    $("select#giliran, select#modul, select#set_soal").on('click', function () {
        append_soal_ke_praktikan();
    });

    // kerjakan soal


    // koreksi
    $("select#giliran, select#kelas, select#kelompok, select#modul, select#nim").on('click', function () {
        const giliran = $("select#giliran").val();
        const kelas = $("select#kelas").val();
        const kelompok = $("select#kelompok").val();
        const modul = $("select#modul").val();
        const nim = $("select#nim").val(); // isinya NIM

        let area_koreksi = $("#area_koreksi");
        area_koreksi.html('');

        $.getJSON(`${BASEURL}/asisten/get_jawaban/${giliran}/${kelas}/${kelompok}/${modul}/${nim}`, function (data) {
            let prepared_data = [];
            // delete unecessary data
            delete data.id;
            delete data.nama;
            delete data.nim;
            delete data.kelompok;
            delete data.kelas;
            delete data.modul;
            delete data.set_soal;
            delete data.pengoreksi;
            delete data.nilai;

            console.log(data);

            for (const key in data) {
                if (data.hasOwnProperty(key)) {
                    prepared_data.push(data[key]);
                }
            }
            // console.log(prepared_data);

            let new_prep_data = [];
            for (let index = 0; index < 10; index += 2) {
                new_prep_data.push(prepared_data[index]);
                new_prep_data.push(prepared_data[index + 1]);
                new_prep_data.push(prepared_data[index + 10]);
                new_prep_data.push(prepared_data[index + 11]);
            }
            delete prepared_data;

            for (let index = 0; index < new_prep_data.length; index++) {
                new_prep_data[index] = [
                    new_prep_data[index],
                    new_prep_data[index + 1],
                    new_prep_data[index + 2],
                    new_prep_data[index + 3],
                ];
                new_prep_data.splice(index + 1, 3);
            }

            console.log(new_prep_data);

            for (let index = 0; index < new_prep_data.length; index++) {
                const element = new_prep_data[index];
                switch (element[1]) {
                    case 'gambar':
                        area_koreksi.append( /*html*/ `
                            <div class="col-sm-5">
                            <label>Jawaban no ${index+1}</label>
                            <div class="card" style="width: 100%;">
                                <img class="card-img-top" src="${BASEURL}/files/jawaban/${giliran}/${modul}/${element[0]}" alt="Card image cap">
                            </div>
                        </div>
                        `);
                        break;

                    default:
                        area_koreksi.append( /*html*/ `
                        <div class="col-sm-5">
                            <label>Jawaban no ${index+1}</label>
                            <textarea id="jawaban${index+1}" disabled name="jawaban${index+1}" class="form-control" rows="3" placeholder="Enter ...">${element[0]}</textarea>
                        </div>
                        `);
                        break;
                }
                switch (element[3]) {
                    case 'gambar':
                        area_koreksi.append( /*html*/ `
                            <div class="col-sm-5">
                            <label>Kunci jawaban ${index+1}</label>
                            <div class="card" style="width: 100%;">
                                <img class="card-img-top" src="${BASEURL}/files/soal_tp/${giliran}/${modul}/${element[2]}" alt="Card image cap">
                            </div>
                            </div>
                        `);
                        break;

                    default:
                        area_koreksi.append( /*html*/ `
                        <div class="col-sm-5">
                            <label>Kunci jawaban ${index+1}</label>
                            <textarea id="kunci_${index+1}" disabled name="kunci_${index+1}" class="form-control" rows="3" placeholder="Enter ...">${element[2]}</textarea>
                        </div>
                        `);
                        break;
                }
                area_koreksi.append( /*html*/ `
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Nilai no ${index+1}</label>
                        <input id="nilai${index+1}" name="nilai${index+1}" class="form-control" rows="3" placeholder="Enter ..."></input>
                    </div>
                </div>
                `);
            }
        });
    });

    $("select#kelas, select#kelompok").on('click', function () {
        const kelas = $("select#kelas").val();
        const kelompok = $("select#kelompok").val();
        $.getJSON(`${BASEURL}/asisten/get_praktikan/${kelas}/${kelompok}`, function (data) {
            console.log(data);
            $("select#nim").html('');
            if (data.length !== 0) {
                for (let index = 0; index < data.length; index++) {
                    $("select#nim").append( /*html*/ `
                        <option value="${data[index].nim}">${data[index].nama}</option>
                    `);
                }
            }
        });
    });
    // koreksi

});