<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

class PlaceImageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\Place\PlaceImage");
        $this->crud->setRoute("admin/place-image");
        $this->crud->setEntityNameStrings('Изображение', 'Изображения');
        $this->setFilters();
    }

    public function setupListOperation()
    {
        $this->crud->addColumn([
            'name'    => 'place.name',
            'label'   => 'Место',
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
            'name' => 'place_id',
            'model' => 'App\Models\Place\Place',
            'label' => 'Место',
            'entity' => 'place',
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
            'name'  => 'place_id',
            'type'  => 'select2',
            'label' => 'Место'
        ], function() {
            return \App\Models\Place\Place::all()->pluck('name', 'id')->toArray();
        }, function($value) {
            $this->crud->addClause('where', 'place_id', $value);
        });
    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
