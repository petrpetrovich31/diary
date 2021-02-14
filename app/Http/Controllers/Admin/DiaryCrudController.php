<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Models\Diary;
use Carbon\Carbon;

class DiaryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    private $months = [];

    public function setup()
    {
        $this->months[0] = '-';
        for($i = 1; $i <=12; $i++) $this->months[$i] = now()->setMonth($i)->getTranslatedMonthName();

        $this->crud->setModel(Diary::class);
        $this->crud->setRoute("admin/diary");
        $this->crud->setEntityNameStrings('Дата', 'Даты');
        $this->setFilters();
    }

    public function setupListOperation()
    {
        $this->crud->addColumn([
            'name'    => 'title',
            'label'   => 'Заголовок',
        ]);
        $this->crud->addColumn([
            'name'    => 'day',
            'label'   => 'День',
        ]);
        $this->crud->addColumn([
            'name'    => 'month',
            'label'   => 'Месяц',
            'type'    => 'select_from_array',
            'options' => $this->months,
        ]);
        $this->crud->addColumn([
            'name'    => 'year',
            'label'   => 'Год',
        ]);
    }

    public function setupCreateOperation()
    {
        $days = [];
        for($i = 1; $i <= 31; $i++) $days[$i] = $i;

        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => "Описание"
        ]);
        $this->crud->addField([
            'name' => 'day',
            'type' => 'select_from_array',
            'options' => $days,
            'allows_null' => false,
            'label' => "День"
        ]);
        $this->crud->addField([
            'name' => 'month',
            'type' => 'select_from_array',
            'options' => $this->months,
            'allows_null' => false,
            'label' => "Месяц"
        ]);
        $this->crud->addField([
            'name' => 'year',
            'type' => 'text',
            'label' => "Год"
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
