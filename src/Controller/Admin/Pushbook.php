<?php

declare (strict_types = 1);

namespace Laket\Admin\Pushbook\Controller\Admin;

use Laket\Admin\Flash\Controller as BaseController;
use Laket\Admin\Pushbook\Model\Pushbook as PushbookModel;

/**
 * 表单提交
 *
 * @create 2024-6-9
 * @author deatil
 */
class Pushbook extends BaseController
{
    /**
     * 表单提交首页
     */
    public function index()
    {
        return $this->fetch('laket-pushbook::admin.index');
    }
    
    /**
     * 表单提交数据
     */
    public function indexData()
    {
        $limit = $this->request->param('limit/d', 20);
        $page = $this->request->param('page/d', 1);
        
        $map = $this->buildparams();
        
        $keywords = $this->request->param('keywords/s', '');
        if (! empty($keywords)) {
            $map[] = ['title', 'like', '%' . $keywords . '%'];
            $map[] = ['content', 'like', '%' . $keywords . '%'];
        }
        
        $data = PushbookModel::whereOr($map)
            ->page($page, $limit)
            ->order('add_time desc')
            ->select()
            ->toArray();
        
        $total = PushbookModel::whereOr($map)->count();
        
        return $this->json([
            "code"  => 0, 
            "count" => $total, 
            "data"  => $data,
        ]);
    }
    
    /**
     * 表单详情
     */
    public function view()
    {
        $id = $this->request->param('id');
        if (empty($id)) {
            return $this->error('表单ID错误！', '');
        }
        
        $data = PushbookModel::where([
                "id" => $id,
            ])
            ->find();
        if (empty($data)) {
            return $this->error('表单不存在！', '');
        }
        
        $this->assign("data", $data);
        
        return $this->fetch('laket-pushbook::admin.view');
    }
    
    /**
     * 删除表单
     */
    public function delete()
    {
        $id = $this->request->param('id');
        if (empty($id)) {
            return $this->error('表单不存在！', '');
        }
        
        // 删除权限
        PushbookModel::where([
                'id' => $id,
            ])->delete();
        
        return $this->success("删除表单成功！");
    }
}
