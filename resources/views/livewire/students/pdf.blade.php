<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            font-size: 12px;
            border: 1px solid #ffffff;
            padding: 8px;
        }

        td {
            background-color: #dadada;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            border-style: solid;
            border-color: black;
            border-width: 0px 0px 4px 0px;
        }

        #header,
        #footer {
            position: fixed;
            left: 0;
            right: 0;
            color: #000000;
            font-size: 0.9em;
        }

        #footer {
            bottom: 0;
            border-top: 0.1pt solid #000000;
            padding-top: 10px
        }

        .page-number:before {
            content: counter(page);
        }

        #body {
            margin-top: 25px;
        }
    </style>
</head>

<body>
    <div>
        <img src="{{ url('/images/logo.png') }}" alt=""
            style="margin-bottom: 3px; width: 30px; height:30px; margin-right: 5px">
        <div style="display: inline-block;">
            <h3 style="text-align: left; margin:0">{{ $title }}</h3>
            <p style="text-align: left; font-size: 12px; margin:0">{{ $date }}</p>
        </div>
    </div>
    <div id="body">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Sekolah</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat/Tanggal Lahir</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $student->nisn }}</td>
                        <td>{{ $student->student_name }}</td>
                        <td>{{ $student->school->school_name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->birth_place . ', ' . $student->birth_date }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="footer">
        <div class="page-number"></div>
    </div>
</body>

</html>
