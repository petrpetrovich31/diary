<?php

namespace App\Http\Controllers\Admin\Beer;

use App\Models\City\City;
use App\Models\City\CityImage;
use App\Traits\Dates;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class BeerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use Dates;

    private $days = [];
    private $months = [];
    private $years = [];

    public function setup()
    {
        $this->crud->setModel("App\Models\Beer\Beer");
        $this->crud->setRoute("admin/beer/beer");
        $this->crud->setEntityNameStrings('Пиво', 'Пиво');
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
