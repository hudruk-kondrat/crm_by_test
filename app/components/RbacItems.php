<?php

namespace app\components;

/**
 * Class RbacItems
 * @package app\components
 */
class RbacItems
{
  // для администратор
  const TASK_CED_STATUS = 'cedStatus'; //создание/редактирование/удаление статусов лида и сделки
  const TASK_CED_USER = 'cedUser'; //создание/редактирование/удаление пользователей


  //для менеджер
  const TASK_CED_UNIT = 'cedUnit';    //создание/редактирование/удаление лидов и продуктов
  const TASK_MANAGEMENT_STATUS = 'managementStatus';    //управляет статусами лида и сделки


  // роли
  const ROLE_MANAGER = 'manager';        //менеджер
  const ROLE_ADMIN = 'admin';            //администратор


  public static function getRole()
  {

    return [self::ROLE_MANAGER => 'Менеджер',
        self::ROLE_ADMIN => 'Администратор'];
  }

  public static function getRoleName($name)
  {
    $arrayRole = array(
        "manager" => "Менеджер",
        "admin" => "Администратор");
    return $arrayRole[$name];
  }
}