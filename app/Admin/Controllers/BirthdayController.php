<?php

namespace App\Admin\Controllers;

use App\Models\Birthday;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Carbon;

class BirthdayController extends AdminController
{
    protected $title = 'Дни Рождений';

    protected function grid(): Grid
    {
        $grid = new Grid(new Birthday());

        $grid->model()->orderBy('id', 'desc');
        $grid->disableExport();
        $grid->disableFilter();
        $grid->disableTools();
        $grid->disableRowSelector();

        $grid->column('id', __('fields.id'))->sortable();
        $grid->column('title', __('fields.title'));
        $grid->column('date', __('fields.date'));
        $grid->column('created_at', __('fields.created_at'));

        return $grid;
    }

    protected function detail($id): Show
    {
        $birthday = Birthday::findOrFail($id);
        $show = new Show($birthday);

        $show->field('id', __('fields.id'));
        $show->field('title', __('fields.title'));
        $show->field('date', __('fields.date'))
            ->as(fn($item) => Carbon::parse($item)->format('Y-m-d'));
        $show->field('created_at', __('fields.created_at'));
        $show->field('updated_at', __('fields.updated_at'));

        return $show;
    }

    protected function form(): Form
    {
        $form = new Form(new Birthday);

        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->disableCreatingCheck();

        $form->id('id', __('fields.id'));
        $form->text('title', __('fields.title'));
        $form->date('date', __('fields.date'));
        $form->display('created_at', __('fields.created_at'));
        $form->display('updated_at', __('fields.updated_at'));

        return $form;
    }
}
