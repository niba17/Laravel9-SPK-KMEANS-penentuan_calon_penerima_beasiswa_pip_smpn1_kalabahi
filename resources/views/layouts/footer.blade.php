<footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
        {{-- <div class="row">
            <div class="col my-1">
                <p class="m-0">Copyright &copy; <a href="https://codedthemes.com/" target="_blank">Codedthemes</a></p>
            </div>
            <div class="col-auto my-1">
                <ul class="list-inline footer-link mb-0">
                    <li class="list-inline-item"><a href="https://codedthemes.com/" target="_blank">Home</a></li>
                    <li class="list-inline-item"><a href="https://codedthemes.com/privacy-policy/"
                            target="_blank">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="https://codedthemes.com/contact/" target="_blank">Contact
                            us</a></li>
                </ul>
            </div>
        </div> --}}
    </div>
</footer>
<!-- Required Js -->
<script src="{{ asset('template') }}/dist/assets/js/plugins/popper.min.js"></script>
<script src="{{ asset('template') }}/dist/assets/js/plugins/simplebar.min.js"></script>
<script src="{{ asset('template') }}/dist/assets/js/plugins/bootstrap.min.js"></script>
<script src="{{ asset('template') }}/dist/assets/js/config.js"></script>
<script src="{{ asset('template') }}/dist/assets/js/pcoded.js"></script>

<!-- [Page Specific JS] start -->
<!-- Apex Chart -->
{{-- <script src="{{ asset('template') }}/dist/assets/js/plugins/apexcharts.min.js"></script> --}}
{{-- <script src="{{ asset('template') }}/dist/assets/js/pages/dashboard-default.js"></script> --}}
<!-- [Page Specific JS] end -->

<script>
    $('.dashnum-card').on('mouseenter', function() {
        $(this).removeClass('bg-blue-600')
        $(this).addClass('bg-blue-900')
    })

    $('.dashnum-card').on('mouseleave', function() {
        $(this).removeClass('bg-blue-900')
        $(this).addClass('bg-blue-600')
    })

    $('#myTable').DataTable();
    $('#myTable2').DataTable();
    $('#myTable3').DataTable();
    $('#myTable4').DataTable();
    $('#myTable5').DataTable();
    $('#myTable6').DataTable();
    $('#myTable7').DataTable();
    $('#myTable8').DataTable();
    $('#myTable9').DataTable();
    $('#myTable10').DataTable();
    $('#myTable11').DataTable();
    $('#myTable12').DataTable();
    $('#myTable13').DataTable();
    $('#myTable14').DataTable();
    $('#myTable15').DataTable();
    $('#myTable16').DataTable();
    $('#myTable17').DataTable();
    $('#myTable18').DataTable();
    $('#myTable19').DataTable();
    $('#myTable20').DataTable();

    $("#siswa_id_siswa").change(function() {
        var idSiswa = $(this).val();
        $.ajax({
            url: "{{ route('siswa-request') }}",
            method: 'GET',
            cache: false,
            dataType: 'json',
            success: function(data) {
                var html = "";
                data[0].forEach(elementSis => {
                    if (elementSis.id == idSiswa) {
                        if (elementSis.siswa_sub_kriteria !== null) {
                            data[1].forEach(elementKrit => {
                                var valid = true
                                elementSis.siswa_sub_kriteria.forEach(
                                    elementSiswaSubKrit => {

                                        if (elementKrit.id ==
                                            elementSiswaSubKrit.kriteria_id) {
                                            valid = false
                                        }
                                    })
                                if (valid == false) {
                                    html += '<option class="text-danger" value="' +
                                        elementKrit
                                        .id + '"disabled>' + elementKrit.nama +
                                        ' (kriteria sudah ada!)</option>'
                                } else {
                                    html += '<option value="' + elementKrit
                                        .id + '">' + elementKrit.nama +
                                        '</option>'
                                }

                            })
                        }
                    }
                })
                $("#kriteria_id_siswa").html(
                    '<option value="" selected disabled>Pilih Kriteria ...</option>' + html);
            }
        })
    })

    // $("#kriteria_id_siswa").change(function() {
    //     var idKriteria = $(this).val();
    //     $.ajax({
    //         url: "{{ route('kriteria_siswa-request') }}",
    //         method: 'GET',
    //         cache: false,
    //         dataType: 'json',
    //         success: function(data) {
    //             var html = "";
    //             data[0].forEach(elementKrit => {
    //                 if (elementKrit.id == idKriteria) {
    //                     if (elementKrit.kriteria_sub_kriteria !== null) {
    //                         var valid = true
    //                         data[1].forEach(elementSubKrit => {
    //                             elementSubKrit.kriteria_sub_kriteria.forEach(
    //                                 elementKritSubKrit => {
    //                                     if (elementKrit.id == elementKritSubKrit
    //                                         .kriteria_id) {

    //                                         html += '<option value="' +
    //                                             elementSubKrit
    //                                             .id + '">' + elementSubKrit
    //                                             .nama +
    //                                             '</option>'
    //                                     }

    //                                 });
    //                         })
    //                     }
    //                 }
    //             })
    //             $("#sub_kriteria_id").html(
    //                 '<option value="" selected disabled>Pilih Sub Kriteria ...</option>' + html);
    //         }
    //     })
    // })

    // $("#kriteria_id").change(function() {
    //     var idKriteria = $(this).val();
    //     $.ajax({
    //         url: "{{ route('kriteria-request') }}",
    //         method: 'GET',
    //         cache: false,
    //         dataType: 'json',
    //         success: function(data) {
    //             console.log(data)
    //             var html = "";
    //             data[0].forEach(element => {
    //                 if (element.id == idKriteria) {
    //                     if (element.kriteria_sub_kriteria !== null) {
    //                         data[1].forEach(elementSubKrit => {
    //                             var valid = true
    //                             element.kriteria_sub_kriteria.forEach(
    //                                 elementKritSubKrit => {
    //                                     if (elementSubKrit.id ==
    //                                         elementKritSubKrit
    //                                         .sub_kriteria_id) {
    //                                         valid = false
    //                                     }
    //                                 })
    //                             if (valid == false) {
    //                                 html += '<option class="text-danger" value="' +
    //                                     elementSubKrit
    //                                     .id + '"disabled>' + elementSubKrit.nama +
    //                                     ' (sub kriteria sudah ada!)</option>'
    //                             } else {
    //                                 html += '<option value="' + elementSubKrit
    //                                     .id + '">' + elementSubKrit.nama +
    //                                     '</option>'
    //                             }

    //                         })
    //                     }
    //                 }
    //             })
    //             $("#sub_kriteria_id").html(
    //                 '<option value="" selected disabled>Pilih Kriteria ...</option>' + html);
    //         }
    //     })
    // })

    $("#kecamatan_id").change(function() {
        var idKecamatan = $(this).val();
        $.ajax({
            url: "{{ route('kecamatan-request') }}",
            method: 'GET',
            cache: false,
            dataType: 'json',
            success: function(data) {
                console.log(data)
                var html = "";
                data[0].forEach(element => {
                    if (element.id == idKecamatan) {
                        if (element.kecamatan_kelurahan !== null) {
                            data[1].forEach(elementKelurahan => {
                                var valid = true
                                element.kecamatan_kelurahan.forEach(
                                    elementKecKel => {
                                        if (elementKelurahan.id ==
                                            elementKecKel
                                            .kelurahan_id) {
                                            valid = false
                                        }
                                    })
                                if (valid == false) {
                                    html += '<option class="text-danger" value="' +
                                        elementKelurahan
                                        .id + '"disabled>' + elementKelurahan.nama +
                                        ' (kriteria sudah ada!)</option>'
                                } else {
                                    html += '<option value="' + elementKelurahan
                                        .id + '">' + elementKelurahan.nama +
                                        '</option>'
                                }

                            })
                        }
                    }
                })
                $("#kelurahan_id").html(
                    '<option value="" selected disabled>Pilih Kelurahan ...</option>' + html);
            }
        })
    })

    $("#siswa_kriteria_id").change(function() {
        var idKriteria = $(this).val();
        $.ajax({
            url: "{{ route('siswa_kriteria-request') }}",
            method: 'GET',
            cache: false,
            dataType: 'json',
            success: function(data) {
                console.log(data)
                var html = "";
                data[0].forEach(element => {
                    if (element.id == idKriteria) {
                        if (element.siswa_kriteria !== null) {
                            data[1].forEach(elementSis => {
                                var valid = true
                                element.siswa_kriteria.forEach(
                                    elementKrit => {
                                        if (elementSis.id == elementKrit
                                            .siswa_id) {
                                            valid = false
                                        }
                                    })
                                if (valid == false) {
                                    html += '<option class="text-danger" value="' +
                                        elementSis
                                        .id + '"disabled>' + elementSis.nama +
                                        ' (kriteria sudah ada!)</option>'
                                } else {
                                    html += '<option value="' + elementSis
                                        .id + '">' + elementSis.nama +
                                        '</option>'
                                }

                            })
                        }
                    }
                })
                $("#siswa_id").html(
                    '<option value="" selected disabled>Pilih Siswa ...</option>' + html);
            }
        })
    })

    $("#kecamatan_id_siswa").change(function() {
        var idKecamatan = $(this).val();
        $.ajax({
            url: "{{ route('kecamatan-request') }}",
            method: 'GET',
            cache: false,
            dataType: 'json',
            success: function(data) {
                //  console.log(data[0])
                var html = "";
                data[0].forEach(elementKec => {
                    if (elementKec.id == idKecamatan) {
                        if (elementKec.kecamatan_kelurahan !== null) {
                            elementKec.kecamatan_kelurahan.forEach(elementKecKel => {
                                data[1].forEach(elementKel => {
                                    if (elementKecKel.kelurahan_id ==
                                        elementKel.id) {
                                        html += '<option value="' +
                                            elementKel
                                            .id + '">' + elementKel.nama +
                                            '</option>'
                                    }
                                });
                            })
                        }
                    }
                })
                //  console.log(html)
                $("#kelurahan_id").html(
                    '<option value="" selected disabled>Pilih Kelurahan ...</option>' + html);
            }
        })
    })

    $("#tingkat_id_siswa").change(function() {
        var idTingkat = $(this).val();
        $.ajax({
            url: "{{ route('tingkat-request') }}",
            method: 'GET',
            cache: false,
            dataType: 'json',
            success: function(data) {
                // console.log(data)
                var html = "";
                data[0].forEach(elementTing => {
                    if (elementTing.id == idTingkat) {
                        if (elementTing.tingkat_kelas !== null) {
                            elementTing.tingkat_kelas.forEach(elementTingKel => {
                                data[1].forEach(elementKels => {
                                    if (elementTingKel.kelas_id ==
                                        elementKels.id) {
                                        html += '<option value="' +
                                            elementKels
                                            .id + '">' + elementKels.nama +
                                            '</option>'
                                    }
                                });
                            })
                        }
                    }
                })
                //  console.log(html)
                $("#kelas_id").html(
                    '<option value="" selected disabled>Pilih Kelas ...</option>' + html);
            }
        })
    })

    $("#tingkat_id").change(function() {
        var idTing = $(this).val();
        $.ajax({
            url: "{{ route('tingkat-request') }}",
            method: 'GET',
            cache: false,
            dataType: 'json',
            success: function(data) {
                // console.log(data)
                var html = "";
                data[0].forEach(elementTing => {
                    if (elementTing.id == idTing) {
                        if (elementTing.tingkat_kelas !== null) {
                            data[1].forEach(elementKels => {
                                var valid = true
                                elementTing.tingkat_kelas.forEach(
                                    elementTingkel => {
                                        if (elementKels.id ==
                                            elementTingkel
                                            .kelas_id) {
                                            valid = false
                                        }
                                    })
                                if (valid == false) {
                                    html += '<option class="text-danger" value="' +
                                        elementKels
                                        .id + '"disabled>' + elementKels.nama +
                                        ' (Kelas sudah ada!)</option>'
                                } else {
                                    html += '<option value="' + elementKels
                                        .id + '">' + elementKels.nama +
                                        '</option>'
                                }

                            })
                        }
                    }
                })
                $("#kelas_id").html(
                    '<option value="" selected disabled>Pilih Kelas ...</option>' + html);
            }
        })
    })

    $(function() {
        $('#datepicker').datepicker();
    });

    $('#login').hover(() => {
        $('#login').toggleClass('text-primary')
    })

    @if (Session::has('succMessage'))
        Swal.fire({
            icon: 'success',
            title: '{{ Session::get('succMessage') }}',
            timer: 3000
        })
    @elseif (Session::has('succKMEANSMessage'))
        Swal.fire({
            icon: 'success',
            title: '{{ Session::get('succKMEANSMessage') }}',
            timer: 3000
        })
    @elseif (Session::has('errKMEANSMessage'))
        Swal.fire({
            icon: 'error',
            title: '{{ Session::get('errKMEANSMessage') }}'
            // timer: 3000
        })
    @elseif (Session::has('errMessage'))
        Swal.fire({
            icon: 'error',
            title: '{{ Session::get('errMessage') }}'
            // timer: 3000
        })
    @elseif (Session::has('warnMessage'))
        Swal.fire({
            icon: 'warning',
            title: '{{ Session::get('warnMessage') }}'
            // timer: 3000
        })
    @elseif (Session::has('logMessage'))
        Swal.fire({
            icon: 'success',
            title: '{{ Session::get('logMessage') }}',
            timer: 3000
        })
    @endif



    function hapus(id, controller) {
        Swal.fire({
            title: 'Yakin ingin Menghapus?',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace('/' + controller + '-destroy/' + id);
            }
        })
    }

    function logout() {
        Swal.fire({
            title: 'Yakin ingin Logout?',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace('/logout');
            }
        })
    }

    function kmeans() {
        Swal.fire({
            title: 'Mulai Perhitungan K-MEANS Clustering?',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Mulai!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace('/perhitungan');
            }
        })
    }
</script>
</body>

<!-- [Body] end -->

</html>
