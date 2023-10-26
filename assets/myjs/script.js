document.body.style = "background-color: var(--bs-dark);transition: 0.5s;"
const sun = "https://www.uplooder.net/img/image/55/7aa9993fc291bc170abea048589896cf/sun.svg";
const moon = "https://www.uplooder.net/img/image/2/addf703a24a12d030968858e0879b11e/moon.svg"

var theme = "light";
const body = document.querySelector("body");
const root = document.querySelector(":root");
const container = document.getElementsByClassName("theme-container")[0];
const themeIcon = document.getElementById("theme-icon");
if (container) {
    container.addEventListener("click", setTheme);
    function setTheme() {
        switch (theme) {
            case "dark":
                setLight();
                theme = "light";
                break;
            case "light":
                setDark();
                theme = "dark";
                break;
        }
    }

    function setDark() {
        body.classList.add("dark-mode");
        root.style.setProperty("--bs-dark", "#212529");
        container.classList.remove("shadow-light");
        setTimeout(() => {
            container.classList.add("shadow-dark");
            themeIcon.classList.remove("change");
        }, 300);
        themeIcon.classList.add("change");
        themeIcon.src = moon;
    }
    function setLight() {
        body.classList.remove("dark-mode");
        root.style.setProperty(
            "--bs-dark",
            "linear-gradient(318.32deg, #c3d1e4 0%, #dde7f3 55%, #d4e0ed 100%)"
        );
        container.classList.remove("shadow-dark");
        setTimeout(() => {
            container.classList.add("shadow-light");
            themeIcon.classList.remove("change");
        }, 300);
        themeIcon.classList.add("change");
        themeIcon.src = sun;
    }
}

// ========================= SweatAlert FlashData ==========================
const message = $('.flashData').data('message');
const tittle = $('.flashData').data('tittle');
const icon = $('.flashData').data('icon');
const flash = document.querySelector('.flashData')

if (message && tittle && icon) {

    Swal.fire({
        icon: icon,
        title: tittle,
        text: message,
        showConfirmButton: false,
        timer: 4000
    })

    flash.remove()

}
// ========================= END SweatAlert FlashData ==========================

// ================== SWEETALERT BUTTON DELETE ==============================
$('table tbody').on('click', '.btnDelete', function (e) {

    e.preventDefault();

    const href = $(this).attr('href');

    const Delete = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger cancelBtn'
        },
        buttonsStyling: false
    })


    Delete.fire({
        title: 'Kamu yakin?',
        text: "Data yang sudah dihapus tidak bisa kembali!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Delete.fire(
                'Cancelled',
                'Data tidak jadi dihapus!',
                'error'
            )
        }
    })

    const cancelBtn = document.querySelector('.cancelBtn');
    cancelBtn.style.marginRight = "15px";
});
// ================== SWEETALERT BUTTON DELETE ==============================

// ================== SWEETALERT BUTTON CHANGE REKENING ==============================
$('#rekening').on('click', '.btnGantiRekening', function (e) {
    var form = $('#rekening');
    console.log(form);
    e.preventDefault();

    const Delete = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger cancelBtn'
        },
        buttonsStyling: false
    })


    Delete.fire({
        title: 'Kamu yakin?',
        text: "Rekening akan diubah",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, change it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Delete.fire(
                'Cancelled',
                'Rekening tidak jadi diubah!',
                'error'
            )
        }
    })

    const cancelBtn = document.querySelector('.cancelBtn');
    cancelBtn.style.marginRight = "15px";
});
// ================== SWEETALERT BUTTON CHANGE REKENING ==============================

// =========================== TYPE DATA CURRENCY ===============================
$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "Rp " + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "Rp " + input_val;
    
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}
// =========================== END TYPE DATA CURRENCY ===============================

// ================================ AJAX EDIT PERMOHONAN =================================
$('table tbody').on('click', '.editpermohonan', function () {
    var id_permohonan = $(this).data('idpermohonan');
    console.log(id_permohonan);

    const changeAction = document.querySelector('#modal-edit-permohonan .modal-body form');
    changeAction.setAttribute('action', base_url + 'user/edit-permohonan/' + id_permohonan)

    $.ajax({
        // mengirim data berupa id ke url dibawah dengan method post dan dikembalikan dengan type data JSON
        url: base_url + 'user/getDataModalEditPermohonan',
        data: { id_permohonan: id_permohonan },
        method: 'post',
        dataType: 'JSON',

        // Jika semua diatas sudah dilakukan maka jalankan function berikut
        success: function (data) {
            console.log(data);
            $('#email').val(data.email);
            $('#nama').val(data.nama);
            $('#telepon').val(data.telepon);
            $('#alamat').val(data.alamat);
            $('#namafile').html(data.file_legalisir);
        }
    })

})
// ================================ END AJAX EDIT PERMOHONAN =================================

// ================================ AJAX EDIT PEMBAYARAN =================================
$('table tbody').on('click', '.pembayaran', function () {
    var id_permohonan = $(this).data('idpermohonan');
    console.log(id_permohonan);

    const changeAction = document.querySelector('#modal-pembayaran .modal-body form');
    changeAction.setAttribute('action', base_url + 'user/pembayaran/' + id_permohonan)

    $.ajax({
        // mengirim data berupa id ke url dibawah dengan method post dan dikembalikan dengan type data JSON
        url: base_url + 'user/getDataModalPembayaran',
        data: { id_permohonan: id_permohonan },
        method: 'post',
        dataType: 'JSON',

        // Jika semua diatas sudah dilakukan maka jalankan function berikut
        success: function (data) {
            console.log(data);
            $('#bayar').val(new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(data.payment));
            if (data.file_pembayaran === '') {
                $('#namafilepembayaran').html("Choose File");
            } else {
                $('#namafilepembayaran').html(data.file_pembayaran);
            }
        }
    })

})
// ================================ END AJAX EDIT PEMBAYARAN =================================

// ================================ AJAX EDIT PERMINTAAN =================================
$('table tbody').on('click', '.editpermintaan', function () {
    var id_permohonan = $(this).data('idpermohonan');
    console.log(id_permohonan);

    const changeAction = document.querySelector('#modal-edit-permintaan .modal-body form');
    changeAction.setAttribute('action', base_url + 'admin/edit-permintaan/' + id_permohonan)

    $.ajax({
        // mengirim data berupa id ke url dibawah dengan method post dan dikembalikan dengan type data JSON
        url: base_url + 'admin/getDataModalEditPermintaan',
        data: { id_permohonan: id_permohonan },
        method: 'post',
        dataType: 'JSON',

        // Jika semua diatas sudah dilakukan maka jalankan function berikut
        success: function (data) {
            $('#nama').val(data.nama);
            $('#alamat').val(data.alamat);
            $('#nomor_ijazah').val(data.nomor_ijazah);
            console.log(data);
            $('#status option[value="'+data.status+'"]').prop('selected', true);
            if (data.payment > 0) {
                $('#estimasi_biaya').val(data.payment);
            } else {
                $('#estimasi_biaya').val("");
            }
            
        }
    })

})
// ================================ END AJAX EDIT PERMINTAAN =================================

// ================================ AJAX EDIT USER =================================
$('table tbody').on('click', '.edituser', function () {
    var id_user = $(this).data('iduser');
    console.log(id_user);

    const changeAction = document.querySelector('#modal-edit-user .modal-body form');
    changeAction.setAttribute('action', base_url + 'admin/edit-user/' + id_user)

    $.ajax({
        // mengirim data berupa id ke url dibawah dengan method post dan dikembalikan dengan type data JSON
        url: base_url + 'admin/getDataModalEditUser',
        data: { id_user: id_user },
        method: 'post',
        dataType: 'JSON',

        // Jika semua diatas sudah dilakukan maka jalankan function berikut
        success: function (data) {
            $('#nama').val(data.name);
            $('#email').val(data.email);
            console.log(data);
            $('#role option[value="'+data.role+'"]').prop('selected', true);
        }
    })

})
// ================================ END AJAX EDIT USER =================================