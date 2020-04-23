<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Controller;


use Hyperf\Apidog\Annotation\ApiController;
use Hyperf\Apidog\Annotation\ApiResponse;
use Hyperf\Apidog\Annotation\Body;
use Hyperf\Apidog\Annotation\DeleteApi;
use Hyperf\Apidog\Annotation\FormData;
use Hyperf\Apidog\Annotation\GetApi;
use Hyperf\Apidog\Annotation\Header;
use Hyperf\Apidog\Annotation\PostApi;
use Hyperf\Apidog\Annotation\Query;

/**
 * @ApiController(tag="用户管理", description="用户的新增/修改/删除接口")
 */
class IndexController extends AbstractController
{
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        $db = $this->container->get(\Hyperf\DB\Db::class);
        $userName = md5(uniqid() . microtime(true));
        $date = date('Y-m-d H:i:s');
        $db->execute("INSERT INTO `hyperf`.`users` (`password`, `nickname`, `created_at`, `updated_at`, `deleted_at`) VALUES ('1', '$userName', '$date', '$date', '$date');");

        var_dump(1);

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    /**
     * @GetApi(path="/user", description="获取用户详情")
     * @ApiResponse(code="-1", description="参数错误")
     * @ApiResponse(code="0", schema={"id":1,"name":"张三","age":1})
     */
    public function test()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();
        $db = $this->container->get(\Hyperf\DB\Db::class);
        $userName = md5(uniqid() . microtime(true));
        $date = date('Y-m-d H:i:s');
        $db->execute("INSERT INTO `hyperf`.`users` (`password`, `nickname`, `created_at`, `updated_at`, `deleted_at`) VALUES ('1', '$userName', '$date', '$date', '$date');");

        var_dump(1);

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }
}
