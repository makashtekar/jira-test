<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\select;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const STATUS_TODO = 0;
    public const STATUS_IN_PROGRESS = 1;
    public const STATUS_DONE = 2;

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public static function getStatuses(){
        return [ self::STATUS_TODO, self::STATUS_IN_PROGRESS, self::STATUS_DONE ];
    }

    public static function getStatusesLabelArr(){
        return [ self::STATUS_TODO => 'TO DO', self::STATUS_IN_PROGRESS => "In Progress" , self::STATUS_DONE => "Done" ];
    }

    // NEW WAY
    protected function statusText(): Attribute {
        return Attribute::make(
            get:  function($value){

            }
        );
    }

    protected function getStatusLabelAttribute(){

        $status = intval( $this->status );
         switch ($status){
                case self::STATUS_TODO:
                    return "TO DO";
                case self::STATUS_IN_PROGRESS:
                    return "In Progress";
                case  self::STATUS_DONE:
                    return "Done";
                default:
                    return '-';
        }
}

    protected function getStatusColorAttribute()
    {

        switch ($this->status){
            case self::STATUS_TODO:
                return "text-blue-500";
            case self::STATUS_IN_PROGRESS:
                return "text-yellow-300";
            case  self::STATUS_DONE:
                return 'text-lime-800';
            default:
                return '';
        }
    }

    // OLD WAY
    protected function getDeadlineHumanAttribute(){
        return Carbon::parse( $this->deadline)->diffForHumans();
    }
    // OLD WAY
    protected function getCreatedAtHumanAttribute(){
        return Carbon::parse( $this->created_at)->diffForHumans();
    }
}
