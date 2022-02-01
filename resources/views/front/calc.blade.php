@extends('layouts.front')

    @section('content')


        <div class="title-page">
            <div class="container">
                <h3>@lang('calc')</h3>
            </div>
        </div>

        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="portlet">
                            <div class="portlet-body" id="printPrive">
                                <div class="form-group">
                                    <label> @lang('before') </label>
                                    <input type="number" class="form-control input_1" value="0">
                                </div>
                                <div class="form-group">
                                    <label> @lang('after') </label>
                                    <input type="number" class="form-control input_2" value="0">
                                </div>
                                <div class="form-group mb-0">
                                    <label> @lang('now') </label>
                                    <input type="number" disabled class="form-control total" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mx-auto">
                                    <div class="form-group">
                                        <button onClick="window.print()" class="general-btn-sm rounded js-print-link"> @lang('print') </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@push('scripts')
    <script>

        $('.input_1').on('keyup',function(){
            var input_1 =  105 * parseInt($(this).val()) / 100

            var input_2 =   parseInt($(this).val())

            var total =   Math.round ( 5 / 100  * input_1 )

            $('.input_2').val(input_1.toFixed(2))

            $('.total').val((input_1 - input_2).toFixed(2)   )

        })

        $('.input_2').on('keyup',function(){
             var input_1 =  105 * parseInt($(this).val()) / 100

            var input_2 = 100 * parseInt($(this).val()) / 105

            var total = Math.round(5 / 100  * input_1 )

            $('.input_1').val(input_2.toFixed(2))

             $('.total').val(Math.floor((input_2 * 0.05).toFixed(2))   )
        })




    </script>
@endpush
    @endsection