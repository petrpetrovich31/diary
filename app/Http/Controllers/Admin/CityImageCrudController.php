<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

class CityImageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\City\CityImage");
        $this->crud->setRoute("admin/city-image");
        $this->crud->setEntityNameStrings('Изображение', 'Изображения');
        $this->setFilters();
    }

    public function setupListOperation()
    {
        $this->crud->addColumn([
            'name'    => 'city.name',
            'label'   => 'Город',
        ]);
        $this->crud->addColumn([
            'name' => 'src',
            'label' => 'Изображение',
            'type' => 'image',
            'height' => '50px',
            'width'  => '50px',
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->addField([
            'name' => 'city_id',
            'model' => 'App\Models\City\City',
            'label' => 'Город',
            'entity' => 'city',
            'type' => 'select2',
        ]);
        $this->crud->addField([
            'name'  => 'src',
            'label' => 'Фотография',
            'type'  => 'image',
            'disk' => 'upload',
        ]);

    }

    public function setFilters()
    {
        $this->crud->addFilter([
            'name'  => 'city_id',
            'type'  => 'select2',
            'label' => 'Город'
        ], function() {
            return \App\Models\City\City::all()->pluck('name', 'id')->toArray();
        }, function($value) {
            $this->crud->addClause('where', 'city_id', $value);
        });
    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
