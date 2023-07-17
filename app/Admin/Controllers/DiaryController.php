<?php

namespace App\Admin\Controllers;

use App\Models\Diary;
use App\Traits\Dates;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DiaryController extends AdminController
{
    use Dates;

    protected $title = 'Ежедневник';

    protected function grid(): Grid
    {
        $grid = new Grid(new Diary());

        $grid->model()->orderBy('id', 'desc');
        $grid->disableExport();
        $grid->disableFilter();
        $grid->disableTools();
        $grid->disableRowSelector();

        $grid->column('id', __('fields.id'))->sortable();
        $grid->column('title', __('fields.title'));
        $grid->column('day', __('fields.day'));
        $grid->column('month', __('fields.month'));
        $grid->column('year', __('fields.year'));
        $grid->column('created_at', __('fields.created_at'));

        return $grid;
    }

    protected function detail($id): Show
    {
        $diary = Diary::findOrFail($id);
        $show = new Show($diary);

        $show->field('id', __('fields.id'));
        $show->field('title', __('fields.title'));
        $show->field('day', __('fields.day'));
        $show->field('month', __('fields.month'));
        $show->field('year', __('fields.year'));
        $show->field('created_at', __('fields.created_at'));
        $show->field('updated_at', __('fields.updated_at'));

        return $show;
    }

    protected function form(): Form
    {
        $form = new Form(new Diary);

        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->disableCreatingCheck();

        $form->id('id', __('fields.id'));
        $form->text('title', __('fields.title'));
        $form->select('day', __('fields.day'))
            ->options($this->getDays());
        $form->select('month', __('fields.month'))
            ->options($this->getMonths());
        $form->select('year', __('fields.year'))
            ->options($this->getYears());
        $form->display('created_at', __('fields.created_at'));
        $form->display('updated_at', __('fields.updated_at'));

        return $form;
    }
}
