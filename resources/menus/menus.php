<?php

return [
    "title" => "表单提交",
    "url" => "pushbook/index",
    "method" => "GET",
    "slug" => $slug,
    "icon" => "icon-createtask",
    "listorder" => 1075,
    "menu_show" => 1,
    "remark" => "",
    "children" => [
        [
            "title" => "表单提交",
            "url" => "pushbook/index",
            "method" => "GET",
            "slug" => "admin.pushbook.index",
            "icon" => "icon-neirongguanli",
            "listorder" => 5,
            "menu_show" => 1,
            "children" => [
                [
                    "title" => "表单提交",
                    "url" => "pushbook/index",
                    "method" => "GET",
                    "slug" => "admin.pushbook.index",
                    "menu_show" => 0,
                    "listorder" => 15,
                ],
                [
                    "title" => "表单提交数据",
                    "url" => "pushbook/index-data",
                    "method" => "GET",
                    "slug" => "admin.pushbook.index-data",
                    "menu_show" => 0,
                    "listorder" => 14,
                ],
                [
                    "title" => "表单详情",
                    "url" => "pushbook/view",
                    "method" => "GET",
                    "slug" => "admin.pushbook.view",
                    "menu_show" => 0,
                    "listorder" => 13,
                ],
                [
                    "title" => "删除表单",
                    "url" => "pushbook/delete",
                    "method" => "POST",
                    "slug" => "admin.pushbook.delete",
                    "menu_show" => 0,
                    "listorder" => 12,
                ],
            ],
        ],
    ],
];
