// console.log('ok');

$(function () {
  $(".tombolTambahData").on("click", function () {
    // console.log('ok');
    $("#formModalLabel").html("Tambah data mahasiswa");
    $(".modal-footer button[type=submit]").html("Tambah data");
  });
  $(".tampilModalUbah").on("click", function () {
    // console.log('ok');
    $("#formModalLabel").html("Ubah data mahasiswa");
    $(".modal-footer button[type=submit]").html("Ubah data");
    $(".modal-body form").attr("action", "http://localhost/phpmvc/public/mahasiswa/ubah");

    const id = $(this).data("id");
    // console.log(id);

    $.ajax({
      url: "http://localhost/phpmvc/public/mahasiswa/getubah",
      data: {id : id},
      method: "post",
      dataType: 'json',
      success: function (data) {
        // console.log(data);
        $("#nama").val(data.nama);
        $("#nis").val(data.nis);
        $("#email").val(data.email);
        $("#jurusan").val(data.jurusan);
        $("#id").val(data.id);
      }

    });
  });
});
