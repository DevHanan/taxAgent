@extends('layouts.front')

    @section('content')


        <div class="title-page">
            <div class="container">
                <h3>   @lang('privacy') </h3>
            </div>
        </div>

        <div class="main-content">
            <div class="container">
                <div class=" widget ">
                    <div class="content_papper">
                       {!! app()->getLocale()=="ar"?$value->get('usage_ar'):$value->get('usage_en') !!}
                         </div>
                </div>
            </div>
        </div>

    @endsection