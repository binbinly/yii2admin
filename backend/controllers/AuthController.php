<?php

namespace backend\controllers;

use backend\models\User;
use common\models\AuthAssignment;
use Yii;

class AuthController extends BaseController
{
    public $authManager;
    /*
     * ---------------------------------------
     * 构造方法
     * ---------------------------------------
     */
    public function init(){
        parent::init();
        $this->authManager = Yii::$app->authManager;
    }

    /*
     * ---------------------------------------
     * “角色”列表
     * ---------------------------------------
     */
    public function actionIndex()
    {
        /* 添加当前位置到cookie供后续跳转调用 */
        $this->setForward();

        /* 获取角色列表 */
        $roles = $this->authManager->getRoles();

        //var_dump($roles);exit;

        return $this->render('index', [
            'roles' => $roles,
        ]);
    }

    /*
     * ---------------------------------------
     * 添加“角色”
     * ---------------------------------------
     */
    public function actionAdd(){

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post('param');
            /* 创建角色 */
            $role = $this->authManager->createRole($data['name']);
            $role->type = 1;
            $role->description = $data['description'];
            if ($this->authManager->add($role)) {
                $this->success('更新成功', $this->getForward());
            }
            $this->error('更新失败');
        }

        return $this->render('add');
    }

    /*
     * ---------------------------------------
     * 编辑“角色”
     * ---------------------------------------
     */
    public function actionEdit(){

        /* 获取角色信息 */
        $item_name = Yii::$app->request->get('role');
        $role = $this->authManager->getRole($item_name);

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post('param');
            $role->name = $data['name'];
            $role->description = $data['description'];
            if ($this->authManager-> update($item_name, $role)) {
                $this->success('更新成功', $this->getForward());
            }
            $this->error('更新失败');
        }

        return $this->render('edit',[
            'role' => $role,
        ]);
    }

    /*
     * ---------------------------------------
     * 删除“角色”
     * 同时会删除auth_assignment、auth_item_child、auth_item中关于$role的内容
     * @param string $role 角色名称
     * ---------------------------------------
     */
    public function actionDelete($role){
        $role = $this->authManager->getRole($role);
        if ($this->authManager->remove($role)) {
            $this->success('删除成功', $this->getForward());
        }
        $this->error('删除失败');
    }

    /*
     * ---------------------------------------
     * 角色授权
     * ---------------------------------------
     */
    public function actionAuth($role){

        /* 提交后 */
        if (Yii::$app->request->isPost) {
            $rules = Yii::$app->request->post('rules');
            /* 判断角色是否存在 */
            if (!$parent = $this->authManager->getRole($role)) {
                $this->error('角色不存在');
            }
            /* 删除角色所有child */
            $this->authManager->removeChildren($parent);

            if (is_array($rules)) {
                foreach ($rules as $rule) {
                    /* 更新auth_rule表 与 auth_item表 */
                    $this->authManager->saveRule($rule);
                    /* 更新auth_item_child表 */
                    $this->authManager->saveChild($parent->name, $rule);
                }
            }
            $this->success('更新权限成功', $this->getForward());
        }

        /* 获取栏目节点 */
        $node_list  = $this->returnNodes();
        $auth_rules = $this->authManager->getChildren($role);
        $auth_rules = array_keys($auth_rules);//var_dump($auth_rules);exit;

        return $this->render('auth',[
            'node_list' => $node_list,
            'auth_rules' => $auth_rules,
            'role' => $role,
        ]);
    }

    /*
     * ---------------------------------------
     * 授权用户列表
     * ---------------------------------------
     */
    public function actionUser($role){
        /* 添加当前位置到cookie供后续跳转调用 */
        $this->setForward();

        $uids = $this->authManager->getUserIdsByRole($role);
        $uids = implode(',', array_unique($uids));

        $_where = 'uid in('.$uids.')';

        return $this->render('user',[
            'dataProvider' => $this->lists1('\common\models\User', $_where),
        ]);
    }

}
