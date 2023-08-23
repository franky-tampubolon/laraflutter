<?php

function MenuDashboard(){
    $role = auth()->user()->role;
    if($role === 'super admin'){
        $menu_user = MenuUser::where('role', '=', $role)
    }
}
