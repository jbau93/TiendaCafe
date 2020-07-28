<?php

function getModulesArray()
{
    $array = [
        '0' => 'Productos',
        '1' => 'Blog'
    ];

    return $array;
}

function getRoleUser($mode, $id)
{
    $rol = [
        '0' => 'Usuario',
        '1' => 'Administrador'
    ];

    if(!is_null($mode)){

        return $rol;

    }else{

        return $rol[$id];
    }

}

function getStatusUser($mode, $id)
{
    $status = [
        '0' => 'Registrado',
        '1' => 'Verificado',
        '100' =>  'Bloqueado'
    ];

    if(!is_null($mode)){

        return $status;

    }else{

        return $status[$id];
    }
}