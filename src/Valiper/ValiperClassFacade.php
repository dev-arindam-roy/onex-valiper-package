<?php
  
namespace Onex\Valiper\Valiper;
  
use Illuminate\Support\Facades\Facade;
  
class ValiperClassFacade extends Facade 
{
    protected static function getFacadeAccessor() 
    { 
        return 'valiperclass'; 
    }
}