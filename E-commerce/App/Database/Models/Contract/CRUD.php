<?php

namespace App\Database\Models\Contract;

interface CRUD
{
    function create();
    function read();
    function update();
    function delete();
}
