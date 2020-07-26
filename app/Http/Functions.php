<?php

function getModulesArray()
{
    $array = [
        '0' => 'Productos',
        '1' => 'Blog'
    ];

    return $array;
}

function getRoleUser($id)
{
    $rol = [
        '0' => 'Usuario',
        '1' => 'Administrador'
    ];

    return $rol[$id];
}

function getStatusUser($id)
{
    $status = [
        '0' => 'Registrado',
        '1' => 'Verificado',
        '100' =>  'Bloqueado'
    ];

    return $status[$id];
}