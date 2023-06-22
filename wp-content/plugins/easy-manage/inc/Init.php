<?php
/**
 * @package easy_manage
 */

namespace Inc;

class Init{
    public static function get_services(){
        return [
          
            Pages\ShortCodes::class,
            Pages\CreateTable::class,
            Pages\AdminEndpoints::class,
            Pages\PMEndpoints::class,
            Pages\TrainerEndpoints::class,
            Pages\UserRoles::class,
            Pages\AllProjects::class,
            Pages\AllUsers::class,
            Pages\SoftDelete::class,
            Pages\SearchUsers::class,
            Pages\MarkComplete::class,
        ];
    }

    public static function register_services(){
        foreach(self::get_services() as $class){
            $service = self::instantiate($class);
            if (method_exists($service, 'register')){
                $service->register();
            }
        }
    }

    private static function instantiate($class){
        $service = new $class;
        return $service;
    }
}