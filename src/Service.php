<?php

declare (strict_types = 1);

namespace Laket\Admin\Pushbook;

use think\facade\Console;

use Laket\Admin\Flash\Menu;
use Laket\Admin\Facade\Flash;
use Laket\Admin\Flash\Service as BaseService;

class Service extends BaseService
{
    /**
     * 包名
     */
    protected $pkg = 'laket/laket-pushbook';
    
    protected $slug = 'laket-admin.flash.pushbook';
    
    /**
     * 启动
     */
    public function boot()
    {
        Flash::extend('laket/laket-pushbook', __CLASS__);
    }
    
    /**
     * 在插件安装、插件卸载等操作时有效
     */
    public function action()
    {
        register_install_hook($this->pkg, [$this, 'install']);
        register_uninstall_hook($this->pkg, [$this, 'uninstall']);
        register_upgrade_hook($this->pkg, [$this, 'upgrade']);
        register_enable_hook($this->pkg, [$this, 'enable']);
        register_disable_hook($this->pkg, [$this, 'disable']);
    }

    /**
     * 开始，只有启用后加载
     */
    public function start()
    {
        // 路由
        $this->loadRoutesFrom(__DIR__ . '/../resources/routes/route.php');
        
        // 视图
        $this->loadViewsFrom(__DIR__ . '/../resources/view', 'laket-pushbook');
    }
    
    /**
     * 安装后
     */
    public function install()
    {
        $slug = $this->slug;
        $menus = include __DIR__ . '/../resources/menus/menus.php';
        
        // 添加菜单
        Menu::create($menus);
        
        // 数据库
        Flash::executeSql(__DIR__ . '/../resources/database/install.sql');
        
        // 推送静态文件
        $this->publishes([
            __DIR__ . '/../resources/assets/' => public_path('static/laket-pushbook'),
        ], 'laket-pushbook-assets');
        
        Console::call('laket-admin:publish', [
            '--tag=laket-pushbook-assets',
            '--force',
        ]);
    }
    
    /**
     * 卸载后
     */
    public function uninstall()
    {
        Menu::delete($this->slug);
        
        // 数据库
        Flash::executeSql(__DIR__ . '/../resources/database/uninstall.sql');
    }
    
    /**
     * 更新后
     */
    public function upgrade()
    {}
    
    /**
     * 启用后
     */
    public function enable()
    {
        Menu::enable($this->slug);
    }
    
    /**
     * 禁用后
     */
    public function disable()
    {
        Menu::disable($this->slug);
    }
    
}
