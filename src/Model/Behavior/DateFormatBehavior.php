<?php 
namespace App\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Query;

class DateformatBehavior extends Behavior {
   //Our  format
   var $dateFormat = 'd/m/Y';
   //datebase Format
   var $databaseFormat = 'Y-m-d';

   function setup(&$model) {
      $this->model = $model;
   }

   function _changeDateFormat($date = null,$dateFormat){        
      $newDate = str_replace("/", "-", $date);
      $time = strtotime($newDate);
         if($time === false){
            return null;
      }else{
         return date($dateFormat, $time);   
      }    
   }

   //This function search an array to get a date or datetime field. 
   function _changeDate($queryDataConditions , $dateFormat){
      foreach($queryDataConditions as $key => $value){
         if(is_array($value)){
            $queryDataConditions[$key] = $this->_changeDate($value,$dateFormat);
         } else {
            $columns = $this->model->getColumnTypes();
            //sacamos las columnas que no queremos
            foreach($columns as $column => $type){
               if(($type != 'date') && ($type != 'datetime')) unset($columns[$column]);
            }
            //we look for date or datetime fields on database model  
            foreach($columns as $column => $type){
               if(strstr($key,$column)){
                  if($type == 'datetime') {
                     $queryDataConditions[$key] = $this->_changeDateFormat($value,$dateFormat.' H:i:s ');                     
                  }
                  if($type == 'date'){
                     //debug($queryDataConditions[$key]);
                     /*
                      * if($column=='data_nascimento'){
                        debug($value);
                        debug(date("d/m/Y", strtotime('27/10/1989')));
                     }*/
                     $queryDataConditions[$key] = $this->_changeDateFormat($value,$dateFormat);
                  }
               }
            }

         }
      }
      return $queryDataConditions;
   }

   // function beforeFind($model, $queryData){
   //    $queryData['conditions'] = $this->_changeDate($queryData['conditions'] , $this->databaseFormat);
   //    return $queryData;
   // }

   function afterFind(&$model, $results){
      $results = $this->_changeDate($results, $this->dateFormat);
      return $results;
   }

   function beforeSave($event, $entity, $options) {
      $entity = $this->_changeDate($entity, $this->databaseFormat);
      return true;
   }
}