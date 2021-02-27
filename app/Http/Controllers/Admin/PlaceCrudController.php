<?php

namespace App\Http\Controllers\Admin;

use App\Traits\Dates;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class PlaceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use Dates;


    public function setup()
    {
        $this->crud->setModel("App\Models\Place\Place");
        $this->crud->setRoute("admin/place");
        $this->crud->setEntityNameStrings('Место', 'Места');
        $this->setFilters();
        $this->setDates();
    }

    public function setupListOperation()
    {
        $this->crud->addColumn([
            'name'    => 'id',
            'label'   => 'ID',
        ]);
        $this->crud->addColumn([
            'name'    => 'name',
            'label'   => 'Название',
        ]);
        $this->crud->addColumn([
            'name' => 'main_image',
            'label' => 'Изображение',
            'type' => 'image',
            'height' => '50px',
            'width'  => '50px',
        ]);
        $this->crud->addColumn([
            'name'    => 'day',
            'label'   => 'День',
        ]);
        $this->crud->addColumn([
            'name'    => 'month',
            'label'   => 'Месяц',
        ]);
        $this->crud->addColumn([
            'name'    => 'year',
            'label'   => 'Год',
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->addField([
            'name'  => 'name',
            'label' => 'Название',
            'type'  => 'text',
        ]);
        $this->crud->addField([
            'name'  => 'description',
            'label' => 'Описание',
            'type'  => 'textarea',
        ]);
        $this->crud->addField([
            'name'  => 'day',
            'label' => 'День',
            'type'    => 'select_from_array',
            'options' => $this->days,
        ]);
        $this->crud->addField([
            'name'  => 'month',
            'label' => 'Месяц',
            'type'    => 'select_from_array',
            'options' => $this->months,
        ]);
        $this->crud->addField([
            'name'  => 'year',
            'label' => 'Год',
            'type'    => 'select_from_array',
            'options' => $this->years,
        ]);
        $this->crud->addField([
            'name'  => 'location',
            'label' => 'Координаты',
            'type'  => 'text',
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
            'name'  => 'name',
            'label' => 'Название'
        ],
            false,
            function($value) {
                $this->crud->addClause('where', 'name', 'LIKE', "%$value%");
            });
    }


}
