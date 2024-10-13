<footer class="main-footer">
    <strong>Copyright &copy; 2023-2024 <a href="#">SmartBright International School</a>.</strong>
    All rights reserved.
    <!-- <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div> -->
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- Page specific script -->
<script>
$(function() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
        Toast.fire({
            icon: 'success',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultInfo').click(function() {
        Toast.fire({
            icon: 'info',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultError').click(function() {
        Toast.fire({
            icon: 'error',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultWarning').click(function() {
        Toast.fire({
            icon: 'warning',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultQuestion').click(function() {
        Toast.fire({
            icon: 'question',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });

    $('.toastrDefaultSuccess').click(function() {
        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
        toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
        toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
        toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
        $(document).Toasts('create', {
            title: 'Toast Title',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultTopLeft').click(function() {
        $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'topLeft',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultBottomRight').click(function() {
        $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'bottomRight',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultBottomLeft').click(function() {
        $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'bottomLeft',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultAutohide').click(function() {
        $(document).Toasts('create', {
            title: 'Toast Title',
            autohide: true,
            delay: 750,
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultNotFixed').click(function() {
        $(document).Toasts('create', {
            title: 'Toast Title',
            fixed: false,
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultFull').click(function() {
        $(document).Toasts('create', {
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            icon: 'fas fa-envelope fa-lg',
        })
    });
    $('.toastsDefaultFullImage').click(function() {
        $(document).Toasts('create', {
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            image: '../../dist/img/user3-128x128.jpg',
            imageAlt: 'User Picture',
        })
    });
    $('.toastsDefaultSuccess').click(function() {
        $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultInfo').click(function() {
        $(document).Toasts('create', {
            class: 'bg-info',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultWarning').click(function() {
        $(document).Toasts('create', {
            class: 'bg-warning',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultDanger').click(function() {
        $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultMaroon').click(function() {
        $(document).Toasts('create', {
            class: 'bg-maroon',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
});
</script>
<!-- active -->

<!-- live search -->
<!-- <script>
$(document).ready(function() {
    $('#search').on('keyup', function() {
        let search = $(this).val();
        if (search.length > 0) {
            $.ajax({
                url: 'student_list.php',
                method: 'POST',
                data: {
                    search: search
                },
                dataType: 'json',
                success: function(response) {
                    $('#result').empty().show();
                    if (response.length > 0) {
                        response.forEach(user => {
                            $('#result').append('<div>' + user.name + '</div>');
                        });
                    } else {
                        $('#result').append('<div>No results found</div>');
                    }
                }
            });
        } else {
            $('#result').hide();
        }
    });
});
</script> -->

<!-- livesearch -->
<script>
$(document).ready(function() {
    $('.search').on('keyup', function() {
        var searchTerm = $(this).val().toLowerCase();
        $('#userTbl tbody tr').each(function() {
            var lineStr = $(this).text().toLowerCase();
            if (lineStr.indexOf(searchTerm) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });
});
</script>

<!-- Cookie -->
<script>
$(document).ready(function() {
    $("#username").keyup(function() {
        function getCookie(cookieName) {
            let cookie = {};
            document.cookie.split(';').forEach(function(el) {
                let [key, value] = el.split('=');
                cookie[key.trim()] = value;
            })
            return cookie[cookieName];
        }
        let u = $(this).val();
        if (u !== undefined) {
            $("#password").val(getCookie(u));
        }
    });
});
</script>
<!-- <script>
$(document).ready(function() {
    $("#username").keyup(function() {
        var user = $("#username").val();

        if (user == ) {
            $("#password").val("<?php echo $_COOKIE['Tii']; ?>");
        }

    });
})
</script> -->
</body>

</html>