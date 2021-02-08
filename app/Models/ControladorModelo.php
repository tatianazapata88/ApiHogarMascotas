<?php

namespace App\Models;

use CodeIgniter\Model;

class ControladorModelo extends Model
{
    protected $table      = 'animal';
    protected $primaryKey = 'codAnimal';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombreAnimal', 'tipoAnimal','descAnimal','comidaAnimal'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}