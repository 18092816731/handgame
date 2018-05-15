<?php
namespace app\api\model;

use think\Model;
use think\Log;
use think\Db;
use think\db\Query;

class AgentCard extends Model
{
    /**
     * 执行发房卡 
     * @param unknown $data
     * @param number $type
     */
    public function send_card($data,$type = 2)
    {
        Log::info("调用发送房卡接口");
        //字段验证
        //参数验证
        $update['card_num']  = $data['card_num'];
        $update['agent_id'] = $data['id'];
        $update['user_id']  = $data['user_id'];
        $update['created_at'] = time();

        //开启事务
        db::startTrans();        
        try{
            //$type = 1 平台发卡  $type = 2 代理发卡
            if($type == 1)
            {
                //获取买卡 代理账号
                $userInfo = db('agent')->where(['account'=>$data['user_id']])->find();
                if(!$userInfo)
                {
                    return  return_json(2,'没有代理信息');
                }
                $update['user_account'] = $userInfo['account'];
                //给代理添加房卡 平台不消耗            
                $upplat['card_num']  = $userInfo['card_num'] + $update['card_num'];
                $upplat['update_at'] =   time();
                
                $response =  db('agent')->where(['account'=>$data['user_id']])->update($upplat);                          
                if(!$response)
                {
                    return  return_json(2,'房卡数未能发放');
                }   
                //添加房卡使用日志
                $result =  db('plat_card')->insert($update);
                if(!$result)
                {
                    return return_json(2,'房卡数未能发放');
                }
            }else{
                //获取代理信息 
                $agentInfo = db('agent')->where(['id'=>$data['id']])->find();
     
                if(!$agentInfo)
                {
                    return  return_json(2,'没有代理信息');
                }
                //代理房卡数量检查
                if($agentInfo['card_num']<$update['card_num'])
                {
                    return return_json(2,'房卡数目不足，请充值.当前房卡为'.$agentInfo['card_num']);
                }     
                
                //获取买卡用户账号
                $update['user_account'] = $data['user_id'];
                //代理房卡消耗 用户房卡逻辑不执行
                $upagent['card_num']  = $agentInfo['card_num'] - $update['card_num'];
                $upagent['update_at'] =   time();
                $response =  db('agent')->where(['id'=>$data['id']])->update($upagent);  
                if(!$response)
                {
                    return return_json(2,'房卡数未能发放');
                }
                            //添加房卡使用日志
                $result = $this->insert($update);
                if(!$result)
                {
                    return return_json(2,'房卡数未能发放');
                }
                //执行给用户加房卡（暂时不用）
            }                     
            // 提交事务
            Db::commit();
            return return_json(1,'房卡数已发放');
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            return return_json(2,'房卡数未能发放');
        }  
    }
    public function  plat_send_log($data=[],$type  = 2)
    {
        //获取查询sql
        if($type==1)
        {
            $sql =  "select a.agent_id,a.user_id,a.card_num,a.created_at,a.user_account,b.account  as  agent_name from hand_plat_card as a,hand_agent as b where a.agent_id  = b.id  ";
        }else{
            $sql =  "select a.agent_id,a.user_id,a.card_num,a.created_at,a.user_account,b.account  as  agent_name from hand_plat_card as a,hand_agent as b where a.agent_id  = b.id and a.user_id = ".$data['id'];
        }
        $res = db()->Query($sql);
        //判断是否为空
        if(!$res)
        {
            return return_json(1,'暂无信息 ');
        }
        //返回结果
        return return_json(1,'平台发卡记录',$res);         
    }
    public function  agent_send_log($data=[],$type  = 2)
    {
        //获取查询sql
        if($type==1)
        {
        $sql =  "select a.agent_id,a.user_id,a.card_num,a.created_at,a.user_account,b.account  as  agent_name from hand_agent_card as a,hand_agent as b where a.agent_id  = b.id  ";
        }else{
        $sql =  "select a.agent_id,a.user_id,a.card_num,a.created_at,a.user_account,b.account  as  agent_name from hand_agent_card as a,hand_agent as b where a.agent_id  = b.id  and a.agent_id = ".$data['id'];
        }
        $res = db()->Query($sql);
        //判断是否为空
        if(!$res)
        {
            return return_json(1,'暂无信息 ');
        }
        //返回结果
        return return_json(1,'平台发卡记录',$res);
    }
}