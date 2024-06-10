<?php

declare (strict_types = 1);

namespace Laket\Admin\Pushbook\Model;

use think\Model;

use Laket\Admin\Facade\Admin;


/**
 * 表单提交
 *
 * @create 2024-6-9
 * @author deatil
 */
class Pushbook extends Model
{
    // 设置当前模型对应的数据表名称
    protected $name = 'pushbook';
    
    // 设置主键名
    protected $pk = 'id';
    
    // 时间字段取出后的默认时间格式
    protected $dateFormat = false;

    public static function onBeforeInsert($model)
    {
        $id = md5(mt_rand(10000, 99999) . microtime());
        $model->setAttr('id', $id);
        
        $model->setAttr('add_time', time());
        $model->setAttr('add_ip', request()->ip());
    }

}
