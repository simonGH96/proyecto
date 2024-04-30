<?php

function checkRole($user, $requiredRole) {
    return isset($user->rol) && $user->rol === $requiredRole;
}
