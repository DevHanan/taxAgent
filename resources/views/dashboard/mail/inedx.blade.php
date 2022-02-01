<!doctype html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
</head>
<body>
<table border="1px" style="direction: rtl;">

    <tr>
        <th>
            <b>الاسم </b>
        </th>
        <td>
            {{$request->all()['username']}}
        </td>
    </tr>

    <tr>
        <th>
            <b>الدولة</b>
        </th>
        <td>
            {{$request->all()['contry']}}
        </td>
    </tr>

    <tr>
        <th>
            <b>الإيميل</b>
        </th>
        <td>
            {{$request->all()['email']}}
        </td>
    </tr>

    <tr>
        <th>
            <b>رقم الهاتف </b>
        </th>
        <td>
            {{$request->all()['phone']}}
        </td>
    </tr>

    <tr>
        <th>
            <b>نص الرسالة</b>
        </th>
        <td>
            {{$request->all()['msg']}}
        </td>
    </tr>

</table>



</body>
</html>