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
        $this->setFilters();
    }

    public function setupListOperation()
    {
        $this->crud->addColumn([
            'name'    => 'title',
            'label'   => 'Заголовок',
        ]);
        $this->crud->addColumn([
            'name'    => 'date',
            'label'   => 'Дата',
        ]);
    }

    public function setupCreateOperation()
    {
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

    public function setFilters()
    {
        $this->crud->addFilter([
            'type'  => 'text',
            'name'  => 'title',
            'label' => 'Название'
        ],
            false,
            function($value) {
                $this->crud->addClause('where', 'title', 'LIKE', "%$value%");
            });
    }
}
