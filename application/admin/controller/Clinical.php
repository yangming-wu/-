<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class Clinical extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        // 1. 获取参数
        $search = $request->has('search') ? $request->get('search') : '';

        // 2. 
        $list = db('clinicaltrial')->where(function ($query) use($search){
            $query->where(
                'variant_type', 'like', '%' . $search . '%'
            )->whereOr(
                'gene', 'like','%'. $search . '%'
            )->whereOr(
                'phgvs', 'like','%'. $search . '%'
            )->whereOr(
                'chgvs', 'like','%'. $search . '%'
            )->whereOr(
                'cancer_type', 'like', '%'. $search . '%'
            )->whereOr(
                'cancer_subtype', 'like', '%'. $search . '%'
            );
        })->paginate(8, false, [
            'query' => ['search' => $search]
        ]);

        return view('admin@clinical/index', compact('list','search'));


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
        $data = db('clinicaltrial')->where('id', $id)->find();
        
        return view('admin@clinical/edit', compact('data'));

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

        $ret = Db::name('clinicaltrial')->strict(false)->where('id',$id)->update($input);
        
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
        $id = intval($id);
        $res = model("clinicaltrial")->where('id', $id)->delete();
        if($res){
            return json(['statu' => 0, 'msg' => '数据已删除']);
        }else{
            return json(['statu' => 1, 'msg' => '数据删除失败']);
        }
    }

    /**
     * 批量删除
     */
    public function delAll(Request $request){
        // 1. 获取要删除的id
        $ids = explode(',', $request->post('ids'));
        $del_ids = array_map('getInt', $ids);

        // 调用模型批量删除
        $res = model('clinicaltrial')->where('id','in',$del_ids)->delete();

        if($res){
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
        $info = $file->move( '../uploads/clinicaltrial');

        // 表头
        $fields = array(
          'variant_type',          
          'gene',       
          'chgvs',                 
          'phgvs',            
          'cancer_type',
          'cancer_subtype',
          'clin_drug',
          'clinicaltrial_id',
          'clinical_detail',
          'clinical_site',
          'state',
          'source',
          'note'
        );

        if($info){
            $ext = $info->getExtension();   // 文件后缀
            $excel = '../uploads/clinicaltrial/' . str_replace("\\", "/", $info->getSaveName());  // 文件服务器路径
            $res = exportExcel($excel, $fields, $ext); // 导出excel内容
            if($res['statu'] == 0){ // 文件读取成功
                // 数据入库
                $flag = db('clinicaltrial')->insertAll($res['msg']);
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
