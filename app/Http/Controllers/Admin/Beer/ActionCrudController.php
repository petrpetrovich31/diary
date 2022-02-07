<?php

namespace App\Http\Controllers\Admin\Beer;

use App\Models\City\City;
use App\Models\City\CityImage;
use App\Traits\Dates;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class ActionCrudController extends CrudController
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
        $this->crud->setModel("App\Models\Beer\Action");
        $this->crud->setRoute("admin/beer/action");
        $this->crud->setEntityNameStrings('Действия', 'Действия');
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
            'name'    => 'beer.name',
            'label'   => 'Пиво',
        ]);
        $this->crud->addColumn([
            'name'    => 'volume.volume',
            'label'   => 'Объем',
        ]);
        $this->crud->addColumn([
            'name'    => 'day',
            'label'   => 'Дата',
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->addField([
            'label'     => 'Пиво',
            'type'      => 'select',
            'name'      => 'beer_id',
            'entity'    => 'beer',
            'model'     => 'App\Models\Beer\Beer',
            'attribute' => 'name',
        ]);
        $this->crud->addField([
            'label'     => 'Объем',
            'type'      => 'select',
            'name'      => 'volume_id',
            'entity'    => 'volume',
            'model'     => 'App\Models\Beer\Volume',
            'attribute' => 'volume',
        ]);
        $this->crud->addField([
            'label'     => 'Тип',
            'type'      => 'select',
            'name'      => 'type_id',
            'entity'    => 'type',
            'model'     => 'App\Models\Beer\Type',
            'attribute' => 'type',
        ]);
        $this->crud->addField([
            'name'  => 'day',
            'label' => 'Дата',
            'type'  => 'date_picker',
            'date_picker_options' => [
                'todayBtn' => 'linked',
                'format'   => 'yyyy-mm-dd',
                'language' => 'ru'
            ],
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
