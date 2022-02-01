<!doctype html>
<html lang="ar">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            direction: rtl;

             {{--background:url("{{asset('storage/'.$contract->image->name)}}") no-repeat cover fixed ;--}}
            /*background : #eee;*/

        }
        header
        {
            height: 110px;
            width: 100%;
            overflow: hidden;
        }
        header > img {
            min-width: 100%;
            max-height: 100%;
        }
        h1
        {
            text-align: center;
        }
        table
        {
            position: fixed;
            top:  95%;
            bottom: 0;
        }
    </style>
    <title> {{$contract->title}} </title>
    <link rel="shortcut icon" href="{{asset('storage/'.$value->get('logo'))}}" />
</head>
<body>
<div>
    <header>
        <img src="{{asset('storage/'.$contract->image->name)}}">
    </header>

    <h1>
       {{$contract->getTranslation('title','ar')}}
    </h1>
    <h1>
        {{$contract->getTranslation('title','en')}}
    </h1>

    <p>
        {!! $contract->getTranslation('body','ar') !!}
     </p>
    <p class="mt-40">
        {!! $contract->getTranslation('body','en') !!}
    </p>

    <hr>
    <table style="width: 100%;" >
        <tr>
            <td>
                <b>الطرف الأول</b>
            </td>
            <td>
                <b>الطرف الثاني</b>
            </td>
        </tr>
        <tr>
            <td>
                {{$value->get('signature_ar')}}<br>
                {{$value->get('signature_en')}}
            </td>
            <td>
              @if(auth('client')->check())

                     {{auth('client')->user()->name}} <br>
                     {{auth('client')->user()->email}}

                  @else

                    - سيتم تعبئته بشكل تلقائي عند طلب خدمة -

              @endif
            </td>
        </tr>
    </table>

 </div>
</body>
</html>


