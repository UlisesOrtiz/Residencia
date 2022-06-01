@extends('reports.app-report')

@section('title') Historial Académico | {{ $student->user->name }} @endsection

@section('container')
<div class="row d-flex justify-content-start">
    <img class="p-2 img-fluid" src="{{ asset('img/sep-logo.png') }}" alt="">
</div>
<table class="table table-bordered table-striped w-100 mt-2">
    <thead>
        <tr>
            <th class="border-gray-200 bg-gray-800 text-md text-center font-medium text-white" colspan="4">
                HISTORIAL ACADÉMICO
            </th>
        </tr>
    </thead>
    <tbody class="text-xs leading-4 font-medium">
        <tr>
            <td class="text-bold">Nombre del subsistema:</td>
            <td colspan="3"><span contenteditable="true">DIRECCIÓN
                    GENERAL DE EDUCACIÓN TECNOLÓGICA
                    INDUSTRIAL Y DE SERVICIOS</span></td>
        </tr>
        <tr>
            <td class="text-bold">Nombre del plantel:</td>
            <td colspan="3"><span contenteditable="true">CENTRO DE
                    ESTUDIOS TECNOLÓGICOS INDUSTRIAL Y DE
                    SERVICIOS NO. 87</span></td>
        </tr>
        <tr>
            <td class="text-bold">Nombre del alumno:</td>
            <td><span contenteditable="true">
                    {{ $student->user->name}}
                </span></td>
            <td class="text-bold">Número de Control:</td>
            <td><span contenteditable="true">
                    {{$student->user->control_number }}
                </span></td>
        </tr>
        <tr>
            <td class="text-bold">Modalidad educativa:</td>
            <td><span contenteditable="true">Escolarizada</span></td>
            <td class="text-bold">Opción educativa:</td>
            <td><span contenteditable="true">Presencial</span></td>
        </tr>
        <tr>
            <td class="text-bold">Carrera Técnica en:</td>
            <td colspan="3"><span contenteditable="true">
                    {{$student->myClass->name }}
                </span></td>
        </tr>
        <tr>
            <td class="text-bold">Período de Ingreso:</td>
            <td><span contenteditable="true">
                    {{ $marks[0]->period .' '. $marks[0]->year }}
                </span></td>
            <td class="text-bold">Estatus:</td>
            <td><span contenteditable="true">Estudiante</span></td>
        </tr>
    </tbody>
</table>


<table class="table table-bordered table-striped w-100">
    <thead>
        <tr class="border-gray-200 bg-gray-800 text-xs leading-4 font-medium text-white">
            <th>Semestre</th>
            <th>Materia</th>
            <th class="text-center">
                Calificación
            </th>
            <th>Período Escolar
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($marks as $mark)
        <tr class="text-xs leading-4 font-medium">
            <td>{{ $mark->semester }}</td>
            <td>{{ $mark->subject->name }}</td>
            <td class="text-center">
                <span contenteditable="true">{{ $mark->final_mark == 0 ? 'NA' : $mark->final_mark}}</span>
            </td>
            <td>{{ $mark->period .' '. $mark->year }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('footer')
<footer class="text-center d-flex flex-column justify-content-center">
    <h6 class="text-xs font-medium w-100 mt-3">MIGUEL ANGEL CARRILLO ARCIBA</h6>
    <div class="w-100 d-flex justify-content-center">
        <h6 class="text-xs font-medium border-top border-dark w-25 text-center mt-4">EL DIRECTOR DEL PLANTEL
        </h6>
    </div>
</footer>
@endsection