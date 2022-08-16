<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


function userFulName()
{
    return Auth::user()->name ;

}

function setMenuClass($route,$classe)
{
    //request nous permet de savoir la route actuelle
    //la méthode getName() permet de récupérer la route actuelle
    $routeActuel = request()->route()->getName();

    if(contains($routeActuel , $route))
    {
        return  $classe;
    }
    return "";
}
//cette fonction permet de vérifier si une chaine contient une autre chaine
function contains($container, $contenu)
{
    return Str::contains($container, $contenu);
}


function setMenuActive($route)
{
    //request nous permet de savoir la route actuelle
    //la méthode getName() permet de récupérer la route actuelle
    $routeActuel = request()->route()->getName();

    if($routeActuel === $route)
    {
        return  "active";
    }
    return "";
}


function getRolesName(){
     $rolesName="";
        $i = 0;
        foreach(auth()->user()->roles as $role)
        {
            $rolesName .= $role->nomRole;
            if($i<sizeof(auth()->user()->roles) -1)
            {
                $rolesName .=",";
            }
            $i++;
        }
    return $rolesName;
}
