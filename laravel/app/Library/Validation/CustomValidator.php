<?php

namespace App\Library\Validation;

use Lvgs\Library\ValidationExpansion\Validator;
use Lvgs\Laravel\Lvm\Validation\ValidateEloquentAttribute;

class CustomValidator extends Validator
{
    use ValidateEloquentAttribute;
}
