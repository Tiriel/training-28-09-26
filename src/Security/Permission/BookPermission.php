<?php

namespace App\Security\Permission;

enum BookPermission
{
    public const EDIT_DETAILS        = 'book.edit_details';
    public const CHANGE_AVAILABILITY = 'book.change_availability';
}
