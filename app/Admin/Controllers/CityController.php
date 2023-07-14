<?php

namespace App\Admin\Controllers;

use App\Models\City\City;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CityController extends AdminController
{
    protected $title = 'Города';

    protected function grid(): Grid
    {
        $grid = new Grid(new City());

        $grid->model()->orderBy('id', 'desc');
        $grid->disableExport();
        $grid->disableFilter();
        $grid->disableTools();
        $grid->disableRowSelector();

        $grid->column('id', __('fields.id'))->sortable();
        $grid->column('name', __('fields.name'));
        $grid->column('day', __('fields.day'));
        $grid->column('month', __('fields.month'));
        $grid->column('year', __('fields.year'));
        $grid->column('active', __('fields.active'));
        $grid->column('created_at', __('fields.created_at'));

        return $grid;
    }

    protected function detail($id): Show
    {
        $category = City::findOrFail($id);
        $show = new Show($category);

        $show->field('id', __('fields.id'));
        $show->field('name', __('fields.name'));
        $show->field('description', __('fields.description'));
        $show->field('day', __('fields.day'));
        $show->field('month', __('fields.month'));
        $show->field('year', __('fields.year'));
        $show->field('location', __('fields.location'));
        $show->field('comment', __('fields.comment'));
        $show->field('active', __('fields.active'));
        $show->field('created_at', __('fields.created_at'));
        $show->field('updated_at', __('fields.updated_at'));

        return $show;
    }

    protected function form(): Form
    {
        $form = new Form(new City);

        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->disableCreatingCheck();

        $form->id('id', __('fields.id'));
        $form->text('name', __('fields.name'));
        $form->textarea('description', __('fields.description'));
        $form->select('day', __('fields.day'))
            ->options($this->getDays());
        $form->select('month', __('fields.month'))
            ->options($this->getMonths());
        $form->select('year', __('fields.year'))
            ->options($this->getYears());
        $form->text('location', __('fields.location'));
        $form->textarea('comment', __('fields.comment'));
        $form->switch('active', __('fields.active'));
        $form->display('created_at', __('fields.created_at'));
        $form->display('updated_at', __('fields.updated_at'));

        return $form;
    }

    private function getDays(): array
    {
        $days = [];

        for($i = 1; $i <= 31; $i++) {
            $days[$i] = $i;
        }

        return $days;
    }

    private function getMonths(): array
    {
        $months = [];
        $months[0] = '-';

        for($i = 1; $i <=12; $i++) {
            $months[$i] = now()->setMonth($i)->getTranslatedMonthName();
        }

        return $months;
    }

    private function getYears(): array
    {
        $years = [];

        for($i = 0; $i <= 5; $i++) {
            $year = now()->year - $i;
            $years[$year] = $year;
        }

        return $years;
    }
}
