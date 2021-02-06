<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

class BirthdaysCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\Birthday");
        $this->crud->setRoute("admin/birthdays");
        $this->crud->setEntityNameStrings('День рождения', 'Дни рождения');
    }

    public function setupListOperation()
    {
        $this->crud->setColumns(['title', 'date']);
    }

    public function setupCreateOperation()
    {
        //$this->crud->setValidation(TagCrudRequest::class);

        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => "Описание"
        ]);
        $this->crud->addField([
            'name' => 'date',
            'type' => 'date',
            'label' => "Дата рождения"
        ]);
    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
