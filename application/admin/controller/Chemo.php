<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class Chemo extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        // 化疗用药首页

        // 0. 获取参数
        // var_dump($request->get('search') );
        $search = $request->has('search') ? $request->get('search') : '';

        // 1. 数据分页, 获取数据
        $list = db('chemotherapy')->where(function ($query) use($search){
            $query->where('chemotherapy', 'like', '%' . $search . '%')->whereOr('rs_site', 'like','%'. $search . '%');
        })->paginate(8, false, [
            'query' => ['search' => $search]
        ]);

        return view('admin@chemo/index', compact('list','search'));
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        // 获取数据
        $data = model('chemotherapy')->where('id',$id)->find();
        return view('admin@chemo/edit', compact('data'));
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        // 获取参数
        $input = $request->put();
        
        // unset($input['_method']);

        // $ret = model('chemotherapy')->where('id',$id)->update($input);
        
        $ret = Db::name('chemotherapy')->strict(false)->where('id',$id)->update($input);

        if($ret){
            return json(array('statu' => 0, 'msg' => '修改成功!'));    
        }else{
            return json(array('statu' => 1, 'msg' => '修改失败!'));
        }

        
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        // 调用模型删除数据
        $id = intval($id);
        $ret = model('chemotherapy')->where('id',$id)->delete();
        if($ret){
            return json(['statu' => 0, 'msg' => '数据已删除']);
        }else{
            return json(['statu' => 1, 'msg' => '数据删除失败']);
        }   
    }

    /**
     * 批量删除
     * @param  str  $ids
     */
    public function delAll(Request $request){

        // 获取参数
        $ids = explode(',', $ids = $request->post('ids'));
        $del_ids =array_map('getInt', $ids);

        $ret = model('chemotherapy')->where('id','in',$del_ids)->delete();

        // var_dump($ret);
        if($ret){
            return json(['statu' => 0, 'msg' => '数据已删除']);
        }else{
            return json(['statu' => 1, 'msg' => '未知错误,数据删除失败']);
        }
    }

    /**
     * 文件上传
     */
    public function upload(){
        // 获取文件
        $file = request()->file('uploadFile');
        $info = $file->move( '../uploads/chemotherapy');

        // 表头
        $fields = array(
            "chemotherapy", // 药物名
            "rs_site",      // rs位点
            "genotype",     // 基因型
            "toxicity",     // 毒性
            "efficacy",     // 疗效
            "detail",       // 详情
            "evidence",     // 证据等级
            "pmid",         // pubmd ID
            "cancer_type"   // 癌症类型
        );

        if($info){
            $ext = $info->getExtension();   // 文件后缀
            $excel = '../uploads/chemotherapy/' . str_replace("\\", "/", $info->getSaveName());  // 文件服务器路径
            $res = exportExcel($excel, $fields, $ext); // 导出excel内容
            if($res['statu'] == 0){ // 文件读取成功
                // return json(array('statu' => 0, 'msg' => '上传成功', 'flag' => $res['msg']));
                // 数据入库
                $flag = db('chemotherapy')->insertAll($res['msg']);
                if($flag){
                    return json(array('statu' => 0, 'msg' => '上传成功', 'flag' => $flag));
                }else{
                    return json(array('statu' => 1, 'msg' => '未知错误,上传失败', 'flag' => $flag));
                }   
            }else{
                return json(array('statu' => 1, 'msg' => '上传失败', 'data' => $res['msg']));
            }
        }else{
            return json(array('statu' => 1, 'msg' => $file->getError()));
        }

    }


}