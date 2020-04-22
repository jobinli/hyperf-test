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
}
