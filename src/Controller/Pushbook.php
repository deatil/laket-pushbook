<?php

declare (strict_types = 1);

namespace Laket\Admin\Pushbook\Controller;

use think\App;

use Laket\Admin\Pushbook\Model\Pushbook as PushbookModel;

/**
 * 表单提交
 *
 * @create 2024-6-10
 * @author deatil
 */
class Pushbook
{
    /**
     * 应用实例
     * @var \think\App
     */
    protected $app;

    /**
     * Request实例
     * @var \think\Request
     */
    protected $request;

    /**
     * 构造方法
     * @access public
     * @param  App  $app  应用对象
     */
    public function __construct(App $app)
    {
        $this->app     = $app;
        $this->request = $this->app->request;
    }
    
    /**
     * 表单提交首页
     */
    public function index()
    {
        return laket_view('laket-pushbook::index');
    }
    
    /**
     * 表单提交保存
     */
    public function save()
    {
        $data = $this->request->post();
        if (empty($data)) {
            return $this->error('提交数据不能为空');
        }
        
        $v = validate([
            'title|标题' => 'require|min:2',
            'content|内容' => 'require|min:3',
            'contact|联系方式' => 'require|min:3',
            'contact_type|联系方式类型' => 'require',
            'type|类型' => 'require',
        ], [
            'title.require' => '标题不能为空',
        ], false, false);
        if (! $v->check($data)) {
            return json([
                'code' => 1,
                'msg' => $v->getError(),
            ]);
        }

        $r = PushbookModel::create($data);
        if ($r === false) {
            return json([
                'code' => 1,
                'msg' => '提交失败！',
            ]);
        }
        
        return json([
            'code' => 0,
            'msg' => '提交成功！',
        ]);
    }

}
