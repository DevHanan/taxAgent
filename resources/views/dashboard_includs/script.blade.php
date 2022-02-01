

<!--begin::Global Theme Bundle -->
<script src="{{asset('dashboard/js/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/js/scripts.bundle.js')}}" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->
<!--end::Page Vendors -->

<!--begin::Page Scripts -->
<script src="{{asset('dashboard/js/dashboard.js')}}" type="text/javascript"></script>

<script src="{{asset('dashboard/js/select2.js')}}" type="text/javascript" ></script>

{{--<script>

    $(document).ready(function() {
        $('#select_1').select2({
            placeholder: "اختر السنة",
            dir: "rtl",

            language: {
                "noResults": function () {
                    return "لا توجد نتائج";
                }
            }
        });


        $('#select_2').select2({
            placeholder: "اختر السنة",
            dir: "rtl",

            language: {
                "noResults": function () {
                    return "لا توجد نتائج";
                }
            }
        });
        $('#select_3').select2({
            placeholder: "اختر السنة",
            dir: "rtl",

            language: {
                "noResults": function () {
                    return "لا توجد نتائج";
                }
            }
        });

    });



</script>--}}
{{--<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>--}}

@stack('scripts')
<!--end::Page Scripts -->