<?php

namespace App\Models;

use CodeIgniter\Model;

class ControladorModelo extends Model
{
    protected $table      = 'animal';
    protected $primaryKey = 'codAnimal';
    protected $allowedFields = ['nombreAnimal', 'tipoAnimal','descAnimal','comidaAnimal'];
}