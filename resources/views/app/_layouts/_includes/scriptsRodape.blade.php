<!-- jQuery -->
<script src="{{ asset('static/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('static/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- DateJS -->
<script src="{{ asset('static/vendors/DateJS/build/date.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('static/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('static/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('static/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('static/build/js/custom.min.js') }}"></script>
<!-- Scripts Mask -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<!-- Script Função MaskMoney -->
<script src="{{ asset('static/build/js/jquery.maskMoney.js') }}"></script>

<script type="text/javascript">
    jQuery(function($) {        
        $("#cpf").mask("999.999.999-99");
    });
    
    $(function() {
        $("#money").maskMoney({
            symbol: '',
            showSymbol: true,
            thousands: '.',
            decimal: ',',
            symbolStay: true
        });
    })
    
</script>