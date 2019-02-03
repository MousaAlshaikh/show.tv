<?php

namespace App\Admin\Controllers;

use App\Episode;
use App\Http\Controllers\Controller;
use App\TvResource;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EpisodeController extends Controller
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
            ->header('Episodes')
            ->description('List')
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
            ->header('Episode')
            ->description('Show')
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
            ->header('Episode')
            ->description('Edit')
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
            ->header('Episode')
            ->description('New')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Episode);

        $grid->id('Id');
        $grid->column('Thump')->display(function (){
            return " <img class='image' src='/uploads/{$this->thump}' style='height: 100px;width: 200px'>";
        });
        $grid->video_content()->video();
        $grid->title('Title');
        $grid->description('Description');
        $grid->duration('Duration');
        $grid->airing_time('Airing time');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
        $show = new Show(Episode::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->description('Description');
        $show->duration('Duration');
        $show->airing_time('Airing time');
        $show->thump('Thump');
        $show->video_content()->video(['videoWidth' => 480, 'videoHeight' => 480]);
        $show->resource()->title('Series/Show info');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Episode);

        $form->text('title', 'Title')->rules('required');
        $form->textarea('description', 'Description')->rules('required');
        $form->text('duration', 'Duration')->rules('required');
        $form->text('airing_time', 'Airing time')->rules('required');
        $form->image('thump', 'Thump')->rules('required|mimes:jpg,jpeg,png,gif|max:30000');
        $form->file('video_content', 'Video content')->rules('required|mimes:mp4|max:100000');
        $form->select('tv_resource_id', 'Tv resource')->rules('required')->options(TvResource::all()->pluck('title', 'id'));

        return $form;
    }
}
