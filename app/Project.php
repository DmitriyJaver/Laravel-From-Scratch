<?php

namespace App;

use App\Events\ProjectCreated;
use App\Mail\ProjectCtreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Project extends Model
{
    protected $fillable = [
      'title', 'description', 'owner_id'
    ];

    /**
     * DD
     * To get started, define a $dispatchesEvents property on your Eloquent model
     * that maps various points of the Eloquent model's lifecycle
     * EventsEloquent models fire several events, allowing you to hook into the
     * following points in a model's lifecycle:
     * retrieved, creating, created, updating, updated, saving, saved, deleting, deleted, restoring, restored.
     *
     * @var array
     */
    protected $dispatchesEvents = [
            'created' => ProjectCreated::class,
        ];


    public function owner ()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
        /** Дословно здесь сказано Проект имеет много таксов (задач)
         * функция возвращает все таски
         * */
    }
    public function addTask($task)
    {
        /**return Task::create([
            'project_id'     => $this->id,
            'description'    => $description
        ]);
         * 'этот код можно написать короче используя функцию task
         * */
        $this->tasks()->create($task);
    }
   /* protected static function boot()
    {
        /*parent::boot();

        static::created(function ($project){

            Mail::to($project->owner->email)->send(
                new ProjectCtreated($project)
            );
        });
        /**
         * хук created() вклиневается в  процесс create и выполняет дополнительные действия

    }*/

}
