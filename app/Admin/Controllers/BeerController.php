<?php

namespace App\Admin\Controllers;

use App\Enums\FoldersEnum;
use App\Models\Beer\Beer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BeerController extends AdminController
{
    protected $title = 'Пиво';

    protected function grid(): Grid
    {
        $grid = new Grid(new Beer());

        $grid->model()->orderBy('id', 'desc');
        $grid->disableExport();
        $grid->disableFilter();
        $grid->disableTools();
        $grid->disableRowSelector();

        $grid->column('id', __('fields.id'))
            ->sortable();
        $grid->column('name', __('fields.name'));
        $grid->column('image', __('fields.image'))
            ->image('', 70, 70);
        $grid->column('created_at', __('fields.created_at'));

        return $grid;
    }

    protected function detail($id): Show
    {
        $beer = Beer::findOrFail($id);
        $show = new Show($beer);

        $show->field('id', __('fields.id'));
        $show->field('name', __('fields.name'));
        $show->field('description', __('fields.description'));
        $show->field('image', __('fields.image'))
            ->image();
        $show->field('created_at', __('fields.created_at'));
        $show->field('updated_at', __('fields.updated_at'));

        return $show;
    }

    protected function form(): Form
    {
        $form = new Form(new Beer);

        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->disableCreatingCheck();

        $form->id('id', __('fields.id'));
        $form->text('name', __('fields.name'));
        $form->textarea('description', __('fields.description'));
        $form->image('image', __('fields.image'))
            ->disk('admin')
            ->move(FoldersEnum::Beer->value)
            ->uniqueName();
        $form->display('created_at', __('fields.created_at'));
        $form->display('updated_at', __('fields.updated_at'));

        return $form;
    }
}
