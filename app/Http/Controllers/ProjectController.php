<?php

namespace App\Http\Controllers;


use App\Events\ProjectCreated;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//->only(['store, update, edit']);->except('show');// здесь мы пропускаем к методам клааса только авторизированих пользователей
    }

    public function index()
    {
        //$projects = Project::where('owner_id', auth()->id())->get(); //select * from `projects` where `owner_id` = n
        $projects = auth()->user()->projects;// cоздадим связь пользователя с проектами и будем делать выборку проектов по юзеру (так красивее)
        //В модели юзер сознадим сявзь (метод projects) //select * from `projects` where `projects`.`owner_id` = 1 and `projects`.`owner_id` is not null

        return view('projects.index', compact('projects'));
    }
    public function create ()
    {
        return view('projects.create');
    }
    public function store()
    {
        //Project::create(request('title', 'description')); а теперь тоже самое только через валидацию:
        /*$attributes = \request()->validate([
            'title'         => ['required', 'min:3'],
            'description'   => ['required', 'min:3']
        ]); вынесли в отдельный метод*/
        $attributes = $this->validateProject();
        $attributes['owner_id'] = auth()->id(); // добавляем в масив переменную owner_id берем ее из сессии, id авторизованого юзера

        $project = Project::create($attributes);

        //event(new ProjectCreated($project)); перенесли в модель использовали хук created
        return redirect('/projects');
    }

    public function show(Project $project)
    {
       /* if ($project->owner_id !== auth()->id())
        {
            abort(403);
        }// для того что бы авторизированый пользователь не мог смотреть чужие проекты через адрессную строку
       можно напискать красивее:*/
      //abort_if($project->owner_id !== auth()->id(), 403); перенесли эту логку в policies
        //сдесь мы пишем: если id владельца не совпадает с авторизированым id то отдать 403
        //теперь напишем абор всех за исключением владельцев проекта (другим методом? , более грамотно)
        //abort_unless(auth()->user()->owns($project), 403);//Call to undefined method App\User::owns()
        abort_if (\Gate::denies/*AllOWS*/('update', $project), 403);//передаем управление методу update in policies но через фасад Gates (проверяет авторизацию так же как и ранее)
       // abort_unless(\Gate::allows('update', $project), 403); тоже самое только наоборот конструкция выстроена

       // $this->authorize('update', $project); //передаем управление методу update in policies

        return view('projects.show', compact('project'));
    }


    public function edit(Project $project)
    {

        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {

        $this->authorize('update', $project); //передаем управление методу update in policies

        $project->update($this->validateProject());
        /*$project->title = request('title');
        $project->description = request('description');
        $project->save();*/

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $this->authorize('update', $project); //передаем управление методу update in policies
    //dd('delete', $id);
        $project->delete();
        return redirect('/projects');
    }
    public function validateProject()
    {
        return request()->validate([
            'title'         => ['required', 'min:3'],
            'description'   => ['required', 'min:3']
        ]);
    }

}

