$(function () {
  $(".tampilModalUbah").on("click", function () {
    $("#formModalLabel").html("Ubah Data Barang");
    $(".modal-footer button[type=submit]").html("Simpan");

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/pc/skripsi-inventory-bengkel/public/barang/getubah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id").val(data.id);
        $("#qty_history").val(data.qty_history);
        $("#qty_history").attr({
          min: data.qty_history - data.qty,
        });
      },
    });
  });

  $(".modalSupplier").on("click", function () {
    $("#formLabelSupplier").html("Ubah Data Supplier");
    $(".ubahsupplier button[type=submit]").html("Simpan");

    const kd = $(this).data("id");

    $.ajax({
      url: "http://localhost/pc/skripsi-inventory-bengkel/public/supplier/getubah",
      data: { kd: kd },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#supplierCodeUbah").val(data.kode_supplier);
        $("#supplierNameUbah").val(data.nama_supplier);
        $("#supplierAddressUbah").val(data.alamat);
        $("#kontakSupplierUbah").val(data.kontak);
      },
    });
  });

  $(".tambahModalKaryawan").on("click", function () {
    $("#formLabelKaryawan").html("Tambah Data Karyawan");
    $(".modal-footer button[type=submit]").html("Simpan");
    $(".modal-body form").attr(
      "action",
      "http://localhost/pc/skripsi-inventory-bengkel/public/karyawan/tambah"
    );
    $("#id").val("");
    $("#karyawanName").val("");
    $("#notelKaryawan").val("");
    $("#karyawanAddress").val("");
  });

  $(".modalKaryawan").on("click", function () {
    $("#formLabelKaryawan").html("Ubah Data Karyawan");
    $(".modal-footer button[type=submit]").html("Simpan");
    $(".modal-body form").attr(
      "action",
      "http://localhost/pc/skripsi-inventory-bengkel/public/karyawan/ubah"
    );

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/pc/skripsi-inventory-bengkel/public/karyawan/getubah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id").val(data.id_karyawan);
        $("#karyawanName").val(data.nama_karyawan);
        $("#notelKaryawan").val(data.no_telpon);
        $("#karyawanAddress").val(data.alamat);
      },
    });
  });

  $(".tambahModalPelanggan").on("click", function () {
    $("#formLabelPelanggan").html("Tambah Data Pelanggan");
    $(".modal-footer button[type=submit]").html("Simpan");
    $(".modal-body form").attr(
      "action",
      "http://localhost/pc/skripsi-inventory-bengkel/public/pelanggan/tambah"
    );
    $("#id").val("");
    $("#pelangganName").val("");
    $("#notelPelanggan").val("");
  });

  $(".modalPelangganUbah").on("click", function () {
    $("#formLabelPelanggan").html("Ubah Data Pelanggan");
    $(".modal-footer button[type=submit]").html("Simpan");
    $(".modal-body form").attr(
      "action",
      "http://localhost/pc/skripsi-inventory-bengkel/public/pelanggan/ubah"
    );

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/pc/skripsi-inventory-bengkel/public/pelanggan/getubah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id").val(data.id);
        $("#pelangganName").val(data.nama);
        $("#notelPelanggan").val(data.no_tlp);
      },
    });
  });

  $(".modalPembelian").on("click", function () {
    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/pc/skripsi-inventory-bengkel/public/laporan/getdetailpembelian",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#tanggal").html(data.tanggal_barang_masuk);
        $("#kodesupplier").html(data.kode_supplier);
        $("#namasupplier").html(data.nama_supplier);
        $("#kodebarang").html(data.kode_barang);
        $("#namabarang").html(data.nama_barang);
        $("#qty").html(data.qty_history);
        $("#harga").html(hrgsat(data.harga_beli));
        $("#total").html(rupiah3(data.total));
      },
    });
  });


  $(".modalPenjualan").on("click", function () {

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/pc/skripsi-inventory-bengkel/public/laporan/getdetailpenjualan",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $('.modal-title').html(data[0].id_transaksi + ' / ' + data[0].tggl_transaksi + ' / ' + data[0].kasir + ' / ' + data[0].pelanggan);
        var table = document.getElementById("dataPenjualan");
        var no = 1;
        for (var i = 0; i < data.length; i++) {
          var row = `<tr>
                            <td>${no++}</td>
							<td>${data[i].kode_barang}</td>
							<td style="text-align:left">${data[i].nama_barang}</td>
							<td>${data[i].jumlah_pembelian}</td>
							<td style="text-align:right">${hrgsat(data[i].harga_satuan)}</td>
							<td style="text-align:right">${rupiah3(data[i].total_harga)}</td>
					  </tr>`;
          table.innerHTML += row;
        }
      },
    });
  });

  $(".modalPenjualan").on("click", function () {
    var table = document.getElementById("dataPenjualan");
    table.innerHTML = "";
  });


  $(".modalRiwayat").on("click", function () {

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/pc/skripsi-inventory-bengkel/public/laporan/getdetailpenjualan",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $('.modal-title').html(data[0].id_transaksi + ' / ' + data[0].tggl_transaksi + ' / ' + data[0].kasir + ' / ' + data[0].pelanggan);
        var table = document.getElementById("dataRiwayat");
        var no = 1;
        for (var i = 0; i < data.length; i++) {
          var row = `<tr>
                            <td>${no++}</td>
							<td>${data[i].kode_barang}</td>
							<td style="text-align:left">${data[i].nama_barang}</td>
							<td>${data[i].jumlah_pembelian}</td>
							<td style="text-align:right">${hrgsat(data[i].harga_satuan)}</td>
							<td style="text-align:right">${rupiah3(data[i].total_harga)}</td>
					  </tr>`;
          table.innerHTML += row;
        }
      },
    });
  });

  $(".modalRiwayat").on("click", function () {
    var table = document.getElementById("dataRiwayat");
    table.innerHTML = "";
  });


  const rupiah3 = (number) => {
    return new Intl.NumberFormat("id-ID", {
      maximumFractionDigits: 0,
      style: "currency",
      currency: "IDR",
    }).format(number);
  };

  const hrgsat = (number) => {
    return new Intl.NumberFormat("id-ID", {
      maximumFractionDigits: 0,
    }).format(number);
  };
});
