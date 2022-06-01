<?php

namespace App\Constants;

trait ConstantExport
{
    static function getConstants()
    {
        $refl = new \ReflectionClass(__CLASS__);
        return $refl->getConstants();
    }
}

class Constants
{
    public const ROLE =
    [
        'ADMINISTRADOR' => "ADMINISTRADOR",
        'ESTUDIANTE' => "ESTUDIANTE",
        'DOCENTE' => "DOCENTE",
        'FINANCIERO' => "FINANCIERO",
        'ORIENTACION' => "ORIENTACION"
    ];

    public const ROLE_FILTER =
    [
        'ADMINISTRADOR' => "ADMINISTRADOR",
        'DOCENTE' => "DOCENTE",
        'FINANCIERO' => "FINANCIERO",
        'ORIENTACION' => "ORIENTACION",
    ];

    public const GENDER =
    [
        0 => 'FEMENINO',
        1 => 'MASCULINO'
    ];

    public const TIME =
    [
        0 => 'MATUTINO',
        1 => 'VESPERTINO'
    ];

    public const PHASE =
    [
        1 => '1ER. PERÍODO',
        2 => '2DO. PERÍODO',
        3 => '3ER. PERÍODO',
    ];

    public const PERIOD =
    [
        0 => 'ENERO-JUNIO',
        1 => 'AGOSTO-DICIEMBRE'
    ];

    public const BLOOD_GROUP =
    [
        0 => 'O-',
        1 => 'O+',
        2 => 'A-',
        3 => 'A+',
        4 => 'B-',
        5 => 'B+',
        6 => 'AB-',
        7 => 'AB+'
    ];


    use ConstantExport;
}
