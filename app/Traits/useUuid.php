<?php
    namespace App\Traits;
    use Illuminate\Support\Str;
    
    trait useUuid {

        public function getIncrementing(){return false;}
        public function getKeyType(){return 'string';}

        protected static function bootUseUuid(){
            static::creating( function($model){
                if(empty($model->{$model->getKeyName()})){
                    $model->{$model->getKeyName()} = Str::uuid();
                }
            });
        }
    }
?>