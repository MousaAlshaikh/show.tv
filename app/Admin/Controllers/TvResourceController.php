<?php

namespace App\Admin\Controllers;

use App\TvResource;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class TvResourceController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('TV Resources')
            ->description('Series and TV shows')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('New series or TV show')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TvResource);

        $grid->id('Id');
        $grid->column('resource_cover' , 'Resource cover')->display(function (){
            return " <img class='image' src='/uploads/{$this->resource_cover}' style='height: 100px;width: 200px'>";

        });
        $grid->title('Title');
        $grid->description('Description');
        $grid->airing_time('Airing Time');
        $grid->resource_type('Resource Type');
        $grid->created_at('Created Date');
        $grid->updated_at('Updated Date');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(TvResource::findOrFail($id));

        $show->id('Id');
        $show->resource_cover()->image(env('APP_URL') . '/uploads/', 100 , 300);
        $show->title('Title');
        $show->description('Description');
        $show->airing_time('Airing time');
        $show->resource_type('Resource type');
        $show->created_at('Created at');
        $show->updated_at('Updated at');
        $show->episodes('Episodes', function ($episodes) {

            $episodes->setResource('/admin/episode');

            $episodes->id();
        });
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new TvResource);

        $form->text('title', 'Title')->rules('required');
        $form->textarea('description', 'Description')->rules('required');
        $form->text('airing_time', 'Airing time')->rules('required');
        $form->select('resource_type', 'Resource type')->rules('required')->options(['series' => 'Series' , 'show' => 'TV Show']);
        $form->image('resource_cover', 'Resource cover')->rules('required|mimes:jpg,jpeg,png,gif|max:30000');

        return $form;
    }
}
