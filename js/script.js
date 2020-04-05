// your JS script goes here
$(function () {

    // halaman login asisten behaviour
    let section_id = $("section").attr("id");
    console.log(section_id);
    if (section_id === "login_asisten") {
        $("#login_asisten_link").remove();
    }
});