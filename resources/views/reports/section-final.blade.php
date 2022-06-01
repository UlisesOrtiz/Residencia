@extends('reports.app-report')

@section('title') Calificaciones {{ $sectionName }} | Finales @endsection

@section('container')
<div class="row d-flex justify-content-start">
    <img class="p-2 img-fluid" src="{{ asset('img/sep-logo.png') }}" alt="">
</div>
<table class="table table-bordered table-striped w-100 mt-2">
    <thead>
        <tr>
            <th class="border-gray-200 bg-gray-800 text-md text-center font-medium text-white" colspan="4">
                GRUPO: {{ $sectionName }} {{ strtoupper($phase) }}
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
            <td class="text-bold">Modalidad educativa:</td>
            <td><span contenteditable="true">Escolarizada</span></td>
            <td class="text-bold">Opción educativa:</td>
            <td><span contenteditable="true">Presencial</span></td>
        </tr>
        <tr>
            <td class="text-bold">Carrera Técnica en:</td>
            <td colspan="3"><span contenteditable="true">
                    {{ $students[0]['stu']->myClass->name }}
                </span></td>
        </tr>
        <tr>
            <td class="text-bold">Generación:</td>
            <td><span contenteditable="true">
                    {{ $students[0]['stu']->year_admitted . '-'. ($students[0]['stu']->year_admitted +3) }}
                </span></td>
            <td class="text-bold">Estatus:</td>
            <td><span contenteditable="true">Estudiantes</span></td>
        </tr>
    </tbody>
</table>


<table class="table table-responsive table-bordered table-striped w-100">
    <thead>
        <tr class="border-gray-200 bg-gray-800 text-xs leading-4 font-medium text-white align-middle">
            <th>NÚMERO DE CONTROL</th>
            <th>ALUMNO</th>
            <th>GRADO</th>
            <th>GRUPO</th>
            <th>GÉNERO</th>

            @foreach ($subjects as $subject)
            <th>
                {{ $subject->name . ' FINAL' }}
            </th>
            @endforeach
        </tr>
    </thead>
    <tbody>

        @foreach ($students as $student)
        <tr class="text-xs font-medium text-center">
            <td class="text-left">
                {{ $student['stu']->user->control_number }}
            </td>
            <td class="text-left">
                {{ $student['stu']->user->name }}
            </td>
            <td>
                {{ $student['stu']->section->semester }}
            </td>
            <td>
                {{ $student['stu']->section->name }}
            </td>
            <td>
                {{ $student['stu']->user->gender }}
            </td>
            @foreach ($student['marks'] as $mark)
            <td>
                {{ $mark->final_mark }}
            </td>
            @endforeach
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