@extends('marksheet.app-marksheet')

@section('title') Boleta de Calificaciones | {{ $student->user->name }} @endsection

@section('content')
<div class="wrapper">
    <button class="btn btn-primary float-right buttonPrint mt-2 mr-2" onclick="window.print()">IMPRIMIR
        BOLETA</button>
    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row d-flex justify-content-start">
            <img class="p-2 img-fluid" src="{{ asset('img/sep-logo.png') }}" alt="">
        </div>

        <div class="row">
            <div class="col-12">
                <h1 class="border-gray-200 bg-gray-800 text-md text-center font-medium text-white p-3">BOLETA DE
                    CALIFICACIONES</h1>
            </div>
            <div class="col-12 d-flex justify-center flex-wrap">
                <div class="w-75 mx-auto">
                    <table class="w-100 text-sm font-medium">
                        <tbody>
                            <tr>
                                <td class="w-50">
                                    <span contenteditable="true">
                                        <b>PLANTEL: </b>CETIS NO. 87
                                    </span>
                                </td>
                                <td class="w-25">
                                    <span contenteditable="true">
                                        <b>CARRERA: </b>{{ $student->myClass->name }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span contenteditable="true">
                                        <b>CLAVE DEL CENTRO DE TRABAJO: </b>08DCT0013D
                                    </span>
                                </td>
                                <td>
                                    <span contenteditable="true">
                                        <b>TURNO:</b> {{ $student->section->time }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span contenteditable="true">
                                        <b>N??MERO DE CONTROL:</b> {{ $student->user->control_number }}
                                    </span>
                                </td>
                                <td>
                                    <span contenteditable="true">
                                        <b>GRUPO:</b> {{ $student->section->name }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span contenteditable="true">
                                        <b>NOMBRE:</b> {{ $student->user->name }}
                                    </span>
                                </td>
                                <td>
                                    <span contenteditable="true">
                                        <b>GENERACI??N:</b> {{ $student->year. '-' . ($student->year + 3) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span contenteditable="true">
                                        <b>SEMESTRE:</b> {{ $student->section->semester }}
                                    </span>
                                </td>
                                <td>
                                    <span contenteditable="true">
                                        <b>MODALIDAD:</b> BT
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <hr class="w-75 p-2 border-gray-800">
            </div>
        </div>
    </div>

    <table class="table table-bordered table-striped w-100">
        <thead>
            <tr class="border-gray-200 bg-gray-800 text-xs leading-4 font-medium text-white">
                <th>ASIGNATURA/ MODULO</th>
                <th>1ER. P.</th>
                <th>2DO. P.</th>
                <th>3ER. P.</th>
                <th>1ER. P. A.</th>
                <th>2DO. P. A.</th>
                <th>3ER. P. A.</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marks as $mark)
            <tr class="text-xs font-medium text-center">
                <td class="text-left">{{ $mark->subject->name }}</td>
                <td>{{ $mark->first_mark }}</td>
                <td>{{ $mark->second_mark }}</td>
                <td>{{ $mark->third_mark }}</td>
                <td>{{ $mark->first_attendance }}</td>
                <td>{{ $mark->second_attendance }}</td>
                <td>{{ $mark->third_attendance }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- /.container-fluid -->
    <footer class="text-center d-flex flex-column justify-content-center">
        <h6 class="text-xs font-medium w-100 mt-3">MIGUEL ANGEL CARRILLO ARCIBA</h6>
        <div class="w-100 d-flex justify-content-center">
            <h6 class="text-xs font-medium border-top border-dark w-25 text-center mt-4">EL DIRECTOR DEL PLANTEL
            </h6>
        </div>
    </footer>
</div>
<!-- ./wrapper -->
@endsection