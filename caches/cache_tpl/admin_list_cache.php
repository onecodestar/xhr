<?php  !defined('IN_SNYNI') && die('Access Denied!');?>
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title></title>
        <script type="text/javascript">var qingzzStartTime1 = new Date().getTime();</script>
        <link rel="stylesheet" href="statics/admin/css/pintuer.css">
        <link rel="stylesheet" href="statics/admin/css/admin.css">
        <link rel="stylesheet" href="statics/admin/js/layer/2.1/skin/layer.css">
        <link rel="stylesheet" href="statics/admin/js/layer/2.1/skin/layer.ext.css">
        <script src="statics/admin/js/jquery.js"></script>
        <script src="statics/admin/js/layer/2.1/layer.js"></script>
        <script src="statics/admin/js/layer/2.1/extend/layer.ext.js"></script>
        <script src="statics/admin/js/pintuer.js"></script>
        <link rel="stylesheet" href="statics/admin/css/datePicker.css">
        <?php  include template('public-new-ui-header'); ?>
        <script src="statics/admin/js/jquery.min.js" type="text/javascript"></script>
        <script src="statics/admin/js/jquery.date_input.pack.js"></script>   	
        <style type='text/css'>
           /* #page{height: 60px;margin-top: 20px;text-align: center;}
            #page ul li{float: left;margin-right:10px;}
            #page ul .current{ background-color:#0099ff;text-align:center;}
            .table td div.username{
                height: 23px;
                overflow: hidden;
                white-space:nowrap;
                text-overflow: ellipsis;
            }*/
            .col-sm-2.pos-un,
            .input-group.pos-un {position: unset;}
            .dchyDlg{width: 60%;margin: 0 auto;}
           .dchyDlg input{margin: 10px 0px;width: 100%;}

        </style>
    </head>

    <?php 
    $view_title = '';
    if(isset($_GET['flag']) && $_GET['flag']==1){
        if ($data['team'] != '') {
            $view_title = '????????????????????????';
        } else {
            $view_title = '??????????????????';
        }
    }else{
        if ($data['team'] != '') {
            $view_title = '??????????????????';
        } else {
            $view_title = '????????????';
        }
    }?>
    <body class="new_ui_body">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title iboxWTitle">
                        <h5><?php echo $view_title?></h5>
                        <div class="ibox-tools">
                            <button onclick="window.open(location.href)" class="btn btn-white btn-bitbucket">
                                <i class="fa fa-plus-square-o"> </i> ???????????????
                            </button>
                            <button onclick="location.reload();" class="btn btn-white btn-bitbucket">
                                <i class="fa fa-repeat"> </i> ????????????
                            </button>
                            <a href="?m=admin&c=user&a=dummy" onclick="prohibitClick()" class="btn btn-white btn-bitbucket">
                                <i class="fa fa-plus-square-o"> </i> ??????????????????
                            </a>
                            <a href="?m=admin&c=user&a=adddummy" class="btn btn-white btn-bitbucket">
                                <i class="fa fa-plus-square-o"> </i> ??????????????????
                            </a>
                            <?php  if($data['team']>0) { ?>
                            <a onclick="history.back()"  class="btn btn-white btn-bitbucket">
                                <i class="fa fa-reply"> </i> ??????
                            </a>
                            <?php  } ?>
                        </div>
                    </div>
                    <div class="ibox-content" style="width: 100%;">
                        <div class="row">
                            <form action="" id="form" class="form-inline">

                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">????????????</span>
                                        <input type="text" name="username" placeholder="????????????" class="form-control" id="username" value="<?php echo $data['username']?>">
                                    </div>
                                </div>
                                <!-- <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">????????????</span>
                                        <input type="text" name="realname" placeholder="????????????" class="form-control" id="realname">
                                    </div>
                                </div> -->
                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">????????????</span>
                                        <input type="text" name="nickname" placeholder="????????????" class="form-control" id="nickname" value="<?php echo $data['nickname']?>">
                                    </div>
                                </div>

                                <?php  if(in_array(2,$show_user_info)) { ?>
                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">????????????</span>
                                        <input type="text" name="weixin" placeholder="????????????" class="form-control" id="weixin" value="<?php echo $data['weixin']?>">
                                    </div>
                                </div>
                                <?php  } ?>

                                <?php  if(in_array(3,$show_user_info)) { ?>
                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">????????????</span>
                                        <input type="text" name="mobile" placeholder="????????????" class="form-control" id="mobile" value="<?php echo $data['mobile']?>">
                                    </div>
                                </div>
                                <?php  } ?>
                                <?php  if(in_array(1,$show_user_info)) { ?>
                                <!-- <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">?????????</span>
                                        <input type="text" name="bankname" placeholder="?????????" class="form-control" id="bankname" value="<?php echo $data['bankname']?>">
                                    </div>
                                </div> -->
                                <?php  } ?>

                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">????????????</span>
                                        <input type="text" name="bankaccount" placeholder="????????????" class="form-control" id="bankaccount" value="<?php echo $data['bankaccount']?>">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">??????IP</span>
                                        <input type="text" name="loginip" placeholder="??????IP" class="form-control" id="loginip" value="<?php echo $data['loginip']?>">
                                    </div>
                                </div>
                                <div class="col-sm-2 pos-un">
                                    <div class="input-group m-b pos-un"><span class="input-group-addon">????????????</span>
                                        <input type="text" name="regtime" placeholder="????????????" class="form-control" id="datePicker" value="<?php echo $data['regtime']?>">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">??????????????????</span>
                                        <input type="text" name="last_login_source" placeholder="??????????????????" class="form-control" id="last_login_source" value="<?php echo $data['last_login_source']?>">
                                    </div>
                                </div>
                                <?php  if(in_array(1,$show_user_info)) { ?>
                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">????????????</span>
                                        <input type="text" name="realname" placeholder="????????????" class="form-control" id="realname" value="<?php echo $data['realname']?>">
                                    </div>
                                </div>
                                <?php  } ?>
                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">??????</span>
                                    <select name="state" class="form-control" id="state">
                                        <option value="">??????</option>
                                        <option value="0" <?php  if($data['state']==='0') { ?> selected <?php  } ?>>??????</option>
                                        <option value="1" <?php  if($data['state']==1) { ?> selected <?php  } ?>>??????</option>
                                        <option value="2" <?php  if($data['state']==2) { ?> selected <?php  } ?>>??????</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">?????????</span>
                                    <select name="group_id" class="form-control" id="group_id">
                                        <option value="">??????</option>
                                        <?php  if(is_array($group)) { foreach($group as $v) { ?>                                        <option value="<?php echo $v['id']?>" <?php  if($data['group_id']==$v['id']) { ?> selected<?php  } ?>><?php echo $v['name']?></option>
                                        <?php  } } ?>                                    </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">????????????</span>
                                    <select name="layer_id" class="form-control" id="layer_id">
                                        <option value="">??????</option>
                                        <?php  if(is_array($layer)) { foreach($layer as $l) { ?>                                        <option value="<?php echo $l['layer']?>" <?php  if($data['layer_id']==$l['layer']) { ?> selected<?php  } ?>><?php echo $l['layer']?></option>
                                        <?php  } } ?>                                    </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">??????????????????</span>
                                    <select name="lastlogintime" class="form-control" id="lastlogintime">
                                        <option value="">??????</option>
                                        <option <?php  if($data['lastlogintime']==='86400') { ?> selected <?php  } ?> value="86400">??????</option>
                                        <option <?php  if($data['lastlogintime']==='604800') { ?> selected <?php  } ?> value="604800">??????</option>
                                        <option <?php  if($data['lastlogintime']==='2592000') { ?> selected <?php  } ?> value="2592000">??????</option>
                                        <option <?php  if($data['lastlogintime']==='7776000') { ?> selected <?php  } ?> value="7776000">??????</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">????????????</span>
                                    <select name="rg_type" class="form-control" id="rg_type">
                                        <option value="0" <?php  if($data['rg_type']=='') { ?> selected <?php  } ?>>????????????</option>
                                        <option value="8" <?php  if($data['rg_type']==8) { ?> selected <?php  } ?>>??????</option>
                                        <option value="11" <?php  if($data['rg_type']==11) { ?> selected <?php  } ?>>??????</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">????????????</span>
                                    <select name="online" class="form-control" id="online">
                                        <option value="">??????</option>
                                        <option value="1" <?php  if($data['online']==1) { ?> selected <?php  } ?>>??????</option>
                                        <option value="2" <?php  if($data['online']==2) { ?> selected <?php  } ?>>??????</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">??????</span>
                                    <select name="sort" class="form-control" id="sort">
                                        <option value="0">??????</option>
                                        <option value="1" <?php  if($data['sort']==1) { ?> selected <?php  } ?>>????????????</option>
                                        <option value="2" <?php  if($data['sort']==2) { ?> selected <?php  } ?>>??????????????????</option>
                                        <option value="3" <?php  if($data['sort']==3) { ?> selected <?php  } ?>>????????????</option>
                                        <option value="4" <?php  if($data['sort']==4) { ?> selected <?php  } ?>>??????????????????</option>
                                    </select>
                                    </div>
                                </div>
								
								<div class="col-sm-2">
                                    <div class="input-group m-b"><span class="input-group-addon">??????</span>
                                    <select name="filter" class="form-control" id="filter">
                                        <option value="0">??????</option>
                                        <option value="1" <?php  if($data['filter']==1) { ?> selected <?php  } ?>>????????????????????????</option>
                                        <option value="2" <?php  if($data['filter']==2) { ?> selected <?php  } ?>>??????????????????</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="input-group m-b">
                                        <!-- <span class="input-group-addon">??????</span> -->
                                        <button type="button" class="btn btn-primary" id="submit_btn">??????</button>
                                        &nbsp;
                                        <button type="button" class="btn btn-primary" id="cancel_btn">??????</button>
                                        
                                    </div>
                                </div>
								 <div class="col-sm-8">
                                    <div class="input-group m-b">
                                        
                                        <button type="button" class="btn btn-primary" id="getValue">??????????????????</button>
                                        &nbsp;
                                        <button type="button" class="btn btn-primary" id="getGroupValue">???????????????</button>
                                         &nbsp;
                                        <button type="button" class="btn btn-primary" id="class_btn">??????????????????</button>
                                        <?php  if($ex_role==1 && $exportDisplay==1) { ?>
										&nbsp;
                                        <button type="button" class="btn btn-primary" id="export_btn">??????????????????</button>
                                        <?php  } ?>
                                    </div>
                                </div>
                                <div class="form-group hidden">
                                    <label for="sort">?????????</label>
                                    <input type="text"  name="team" value="<?php echo $data['team']?>"/>
                                </div>
                            </form>
                        </div>

                        <div id="editable_wrapper" class="dataTables_wrapper form-inline" role="grid" style="width: 100%">
                            <table class="table table-striped table-bordered table-hover" id="editable" aria-describedby="editable_info">
                                <thead>
                                <tr>
                                    <th>ID&nbsp;<input type="checkbox" id="all">??????</th>
                                    <th>??????</th>
                                    <th>??????</th>
                                    <th>????????????</th>
                                    <!-- <th>?????????</th> -->
                                    <!-- <th>????????????</th> -->
                                    <!-- <th>??????</th> -->
                                    <th>????????????</th>
                                    <th>????????????</th>
                                    <?php  if($data['sort'] == 4) { ?>
                                    <th>????????????</th>
                                    <?php  } ?>
                                    <!-- <th>??????IP</th> -->
                                    <th>?????????</th>
                                    <!-- <th>????????????</th> -->
                                    <th>??????</th>
                                    <th>????????????</th>
                                    <th>??????????????????</th>
                                    <th>????????????IP</th>
                                    <th>??????IP?????????</th>
                                    <!-- <th>??????????????????</th> -->
                                    <!-- <th>??????????????????</th> -->
                                    <!-- <th>????????????</th> -->
                                    <th>??????</th>
                                    <th>????????????</th>
                                    <th>??????</th>
                                </tr>
                                </thead>
                                <tbody id="list">

                                <?php  foreach($userinfo as $k=>$v){?>
                                <tr>
                                    <td><input type="checkbox" value="<?php echo $v['id']?>"><?php echo $v['id']?></td>
                                    <td><a onclick="detail('<?php echo $v['id']?>')" href="javascript:;" style="color: #0099ff;"><div class="username"><?php echo $v['username']?></div></a></td>
                                    <?php  if(in_array(1,$show_user_info)) { ?>
                                    <td><?php echo $v['realname']?></td>
                                    <td><?php echo $v['parent_name']?></td>
                                    <?php  } else { ?>
                                    <td></td>
                                    <td></td>
                                    <?php  } ?>
                                    <!-- <?php  if(in_array(3,$show_user_info)) { ?>
                                    <td><?php echo  decrypt($v['mobile']);?></td>
                                    <?php  } else { ?>
                                    <td></td>
                                    <?php  } ?>
                                    <td title="<?php echo $v['parent']?>"><div class="username"><?php echo $v['parent']?></div></td>
                                    <td><?php echo  decrypt($v['account']);?></td> -->
                                    <td><?php echo $v['money']?></td>
                                    <td><?php echo $v['money_freeze']?></td>
                                    <?php  if($data['sort'] == 4) { ?>
                                    <td><?php echo $v['count']?></td>
                                    <?php  } ?>
                                    <!-- <td><?php  if($v['login_ip_attribution'] == '') { ?> <?php echo $v['loginip']?> <?php  } else { ?> <?php echo $v['loginip']?>(<?php echo $v['login_ip_attribution']?>)<?php  } ?></td> -->
                                    <td><?php echo $v['name']?></td>
                                    <!-- <td><?php echo $v['layer_id']?></td> -->
                                    <td><?php echo $v['state_str']?></td>
                                    <td><?php echo $v['regtime']?></td>
                                    <td><?php echo $v['logintime']?></td>
                                    <td><?php echo $v['loginip']?></td>
                                    <td><?php echo $v['login_ip_attribution']?></td>
                                    <!-- <td>
                                        <?php  if($v['device_flag'] == '1') { ?>
                                            iOS
                                        <?php  } elseif($v['device_flag'] == '2') { ?>
                                            Android
                                        <?php  } elseif($v['device_flag'] == '3') { ?>
                                            H5
                                        <?php  } else { ?>
                                            --
                                        <?php  } ?>
                                    </td>
                                    <td><?php echo $v['last_login_source']?></td>
                                    <td><?php echo $v['source']?></td> -->
                                    <td><a onclick="team('<?php echo $v['id']?>')" href="javascript:;" style="color: #0099ff;">??????</a></td>
                                    <td><a onclick="leaguer('<?php echo $v['id']?>')" href="javascript:;" style="color: #0099ff;">??????</a></td>
                                    <td class="font-icon">
                                        <a href="?m=admin&c=user&a=update_user&id=<?php echo $v['id']?>" style="color: #0099ff;" data-title="????????????"><i class="fa fa-reorder"></i></a>
                                        <a href="?m=admin&c=user&a=update_user_pass&id=<?php echo $v['id']?>" style="color: #0099ff;" data-title="??????????????????"><i class="fa fa-unlock-alt"></i></a>
                                        <a href="?m=admin&c=user&a=update_user_repaypass&id=<?php echo $v['id']?>" style="color: #0099ff;" data-title="??????????????????"><i class="fa fa-key"></i></a>
                                        <a href="?m=admin&c=user&a=user_bank&id=<?php echo $v['id']?>" style="color: #0099ff;" data-title="???????????????"><i class="fa fa-credit-card"></i></a>
                                        <a href="?m=admin&c=user&a=adjust&user_id=<?php echo $v['id']?>&name=<?php echo $v['username']?>" style="color: #0099ff;" data-title="????????????"><i class="fa fa-sliders"></i></a>
                                        <?php  if($v['state'] == 1) { ?>
                                        <a href="javascript:;" onclick="fx(0, <?php echo $v['id']?>)" style="color: #0099ff;" data-title="??????????????????"><i class="fa fa-flag"></i></a>
                                        <?php  } else { ?>
                                        <a href="javascript:;" onclick="fx(1, <?php echo $v['id']?>)" style="color: #0099ff;" data-title="??????????????????"><i class="fa fa-flag-o"></i></a>
                                        <?php  } ?>

                                        <?php  if($v['state'] == 2) { ?>
                                            <a href="javascript:;" onclick="jd(0, <?php echo $v['id']?>);" style="color: #0099ff;" data-title="????????????"><i class="fa fa-frown-o"></i></a>
                                        <?php  } else { ?>
                                            <a href="javascript:;" onclick="jd(2, <?php echo $v['id']?>);" style="color: #0099ff;" data-title="????????????"><i class="fa fa-smile-o"></i></a>
                                        <?php  } ?>

                                        <a href="javascript:;" onclick="offUser(<?php echo $v['id']?>)" style="color: #0099ff;" data-title="????????????"><i class="fa fa-chain-broken"></i></a>
                                    </td>
                                </tr>
                                <?php  }?>
                                </tbody>
                            </table>
                        </div>

                        <div class="row foot_page">
                            <div class="col-sm-6">
                                <div class="dataTables_info" id="editable_info" role="alert" aria-live="polite"
                                     aria-relevant="all">
                                     <span class="back-page">????????????????????????<?php echo $countNum?></span>
                        			 <span class="back-page" id="totalPage"></span>
                                </div>
                            </div>
                            <div class="col-sm-6" id='page'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" class="run_time_value" data-info='<?php echo  json_encode($post_run_data);  ?>'/>


        <script type="text/javascript">
            loading = '';
            function offUser(id)
            {
                layer.confirm('?????????????????????????????????', {icon: 3, title:'??????'}, function(){
                    var data = {'uid':id,}
                    $.ajax({
                        url: "?m=admin&c=user&a=forcedKick",
                        data:data,
                        dataType: 'json',
                        type: 'post',
                        beforeSend: function () {
                            loading = layer.load(1);
                        },
                        error: function () {
                            layer.close(loading);
                            layer.msg('????????????????????????', {icon: 5, shade: [0.5, '#393D49']});
                        },
                        success: function (data) {
                            if(data['code'] != 0)
                            {
                                layer.msg(data['msg'], {icon: 5, shade: [0.5, '#393D49']}, function () {
                                    return false;
                                });
                            }
                            else
                            {
                                layer.msg(data['msg'], {icon: 6, shade: [0.5, '#393D49']}, function () {
                                    location.href = "?m=admin&c=user&a=lst";
                                });
                            }
                        },
                        complete:function(){
                            layer.close(loading);
                        }
                    });
                });
            }
            // function addroob(){
            //     $.ajax({
            //         url: '?m=admin&c=user&a=addroob',
            //         dataType: 'json',
            //         type: 'post',
            //         beforeSend: function () {
            //             loading = layer.load(1);
            //         },
            //         error: function (e) {
            //             layer.close(loading);
            //             console.log(e);
            //             layer.msg('?????????????????????', {icon: 5,shade: [0.5, '#393D49']});
            //         },
            //         success: function (result) {
            //             console.log(result);
                        
            //         }
            //     });
            // }
            //????????????
            function detail(id){
                location.href="?m=admin&c=user&a=detail&id=" + id;
            }
            
            //????????????
            function team(id){
                location.href = "?m=admin&c=user&a=lst&team=" +???id;
            }
            
          //??????????????????
            function leaguer(id){
                location.href = "?m=admin&c=user&a=leaguerList&type=1&team=" +???id;
            }
            
            // leaguer
            //????????????
            function allchk(){
                var chknum = $("#list :checkbox").size();//???????????????
                var chk = 0;
                $("#list :checkbox").each(function () {
                    if($(this).prop("checked")==true){
                        chk++;
                    }
                });
                if(chknum==chk){//??????
                    $("#all").prop("checked",true);
                }else{//?????????
                    $("#all").prop("checked",false);
                }
            }
            function getTotal(obj){
                // var obj = $(obj).parent();
                var data = {
                    'data' : $("#form").serialize(),
                    'type' : 4
                };
                $.ajax({
                    url: '?m=admin&c=finance&a=statisticsData',
                    data: data,
                    dataType: 'json',
                    type: 'post',
                    beforeSend: function () {
                        loading = layer.load(1);
                    },
                    error: function (e) {
                        layer.close(loading);
                        console.log(e);
                        layer.msg('?????????????????????', {icon: 5,shade: [0.5, '#393D49']});
                    },
                    success: function (result) {
                        console.log(result);
                        layer.close(loading);
                        if (result.code == '0') {
                            var html = "<span class='back-page' style='margin-left: 20px;"+result.data[0].auth_style+"'>?????????????????????</span>" +
                                "<span style='padding-right: 20px;"+result.data[0].auth_style+"'>"+result.data[0].countMoney+"</span>" ;
                            $(obj).parent().html(html);
                        } else {
                            layer.msg(result.msg, {icon: 5,shade: [0.5, '#393D49']});
                        }
                    }
                });
            }
            
            function listPage() {
                if(<?php echo $count_data?>==1){
                    return;
                }
            	var listPage = '';
            	var url = "?m=admin&c=user&a=listPage";
            	var data = JSON.parse('<?php echo  json_encode($data) ?>')
            	$.ajax({
                    url: url,
                    data:data,
                    dataType: 'json',
                    type: 'post',
                    beforeSend: function () {
                    	$('#page').append('<span id="loading" style="color: lavender;border:0px;font-style: italic;margin-left: 20px;">???????????????...</span>');
                    	$('#listPage').append('<span id="totaloading" style="color: lavender;border:0px;font-style: italic;margin-left: 20px;">???????????????...</span>');
                    },
                    error: function () {
                    	$('#totaloading').remove();
                    	$('#loading').remove();
                        $('#listPage').after('<span>??????????????????????????????????????????????????????.</span>')
                        $('#page').append('<span>??????????????????????????????????????????????????????.</span>')

                    },
                    success: function (data) {
                    	console.log(data);
                        if(data['code'] != 0)
                        {
                        	$('#totaloading').remove();
                        	$('#loading').remove();
                        	$('#listPage').after('<span>??????????????????????????????????????????????????????.</span>')
                            $('#page').append('<span>??????????????????????????????????????????????????????.</span>')
                        }
                        else
                        {
                        	$('#totaloading').remove();
                        	$('#loading').remove();
                        	var listPage = '<span style="margin-left: 20px;"><a href="javascript:void(0)" onclick="getTotal(this)">??????????????????????????????</a></span>';
                        	$('#totalPage').after(listPage);
                            $('#page').append(data.data.show);
                            pageNum = data.data.pagecount;
                        }
                    }
                });
            	
            }
            
            //????????????
            $(function () {
            	listPage();
                //??????????????????
                $("#all").click(function(){
                    if(this.checked){
                        $("#list :checkbox").prop("checked", true);
                    }else{
                        $("#list :checkbox").prop("checked", false);
                    }
                });
                //?????????????????????
                $("#list :checkbox").click(function(){
                    allchk();
                });

                //????????????????????????
                $("#getGroupValue").click(function(){
                    var valArr = new Array;
                    $("#list :checkbox[checked]").each(function(i){
                        valArr[i] = $(this).val();
                    });
                    var vals = valArr.join(',');
                    if(vals == ''){
                        layer.msg("????????????????????????????????????", {icon: 5, shade: [0.5, '#393D49']});
                        return false;
                    }
                    var index = layer.open({
                        type: 2,
                        area: ['800px','500px'],
                        title: "???????????????",
                        content: "<?php echo url('','',setUserGroup)?>"+"&ids="+vals,
                        end:function () {
                            location.reload(true);
                        }
                    });
//                    layer.full(index);
                });


                //????????????????????????
                $("#getValue").click(function(){
                    var valArr = new Array;
                    $("#list :checkbox[checked]").each(function(i){
                        valArr[i] = $(this).val();
                    });
                    var vals = valArr.join(',');
                    if(vals == ''){
                        layer.msg("????????????????????????????????????", {icon: 5, shade: [0.5, '#393D49']});
                        return false;
                    }
                    var index = layer.open({
                        type: 2,
                        title: "??????????????????",
                        area: ['800px','500px'],
                        content: "<?php echo url('','',setUserLayer)?>"+"&ids="+vals,
                        end:function () {
                            location.reload(true);
                        }
                    });
//                    layer.full(index);
                });

                $('#datePicker').date_input();
                $("#submit_btn").click(function () {
                    var regtime = $("#datePicker").val();
                    var reg = /^(\d{4})-(0\d{1}|1[0-2])-(0\d{1}|[12]\d{1}|3[01])$/;
                    if(regtime != "" && !reg.test(regtime)){
                        layer.msg('????????????????????????????????????', {icon: 5, shade: [0.5, '#393D49']});
                        return false;
                    }
                    location.href = "?m=admin&c=user&a=lst&" + $("#form").serialize();
                });
                $("#cancel_btn").click(function () {
                    location.href = "?m=admin&c=user&a=lst";
                });
                $(".table .username").click(function(){
                    $(this).toggleClass("username");
                });
                
                
                $("#hplus").click(function () {
                    location.href = "?m=admin&c=user&a=hplus";
                });
                $("#bootstrap").click(function () {
                    location.href = "?m=admin&c=user&a=bootstrap";
                });
                
                //?????????????????????
                $("#class_btn").click(function () {
                	 var valArr = new Array;
                     $("#list :checkbox[checked]").each(function(i){
                         valArr[i] = $(this).val();
                     });
                     var vals = valArr.join(',');
                     if(vals == ''){
                         layer.msg("????????????????????????????????????", {icon: 5, shade: [0.5, '#393D49']});
                         return false;
                     }
                     var index = layer.open({
                         type: 2,
                         title: "??????????????????",
                         area: ['800px','500px'],
                         content: "<?php echo url('','',setUserClass)?>"+"&ids="+vals,
                         end:function () {
                             location.reload(true);
                         }
                     });
                });
            });

            $("#export_btn").click(function () {
                layer.open({
                    type: 1,
                    skin: 'layui-layer-rim', //????????????
                    area: ['420px', '280px'], //??????
                    content: '<div class="dchyDlg"><div>???????????????</div><input type="date" id="date"><div>???????????????<input id="pws" type="text"  class="input form-control" /></div></div>',
                    btn: ['??????', '??????'],
                    yes: function () {
                        $.ajax({
                            url: '?m=admin&c=user&a=export_userinfo',
                            dataType: 'json',
                            data:{pws:$('#pws').val()},
                            type: 'post',
                            beforeSend: function () {
                                loading = layer.load(1);
                            },
                            error: function () {
                                layer.close(loading);
                                layer.msg('????????????????????????????????????', {icon: 5, shade: [0.5, '#393D49']});
                            },
                            success: function (result) {
                                layer.close(loading);
                                if (result.code==1) {
                                    layer.msg(result.msg, {icon: 5, shade: [0.5, '#393D49']}, function () {
                                    });
                                } else {

                                    var date = $('#date').val();
                                    window.location.href = "?m=admin&c=user&a=do_export_userinfo&date="+date;
//                            if (result.msg) {
//                                layer.msg(result.msg, {icon: 5, shade: [0.5, '#393D49']}, function () {
//                                    location.reload();
//                                });
//                            }
                                }
                            }
                        });
                    }
                });


            });


            //??????????????????
            function fx(state, user_id) {
                var msg = (state==0)?"????????????????????????????":"????????????????????????????";
                layer.confirm(msg, function(index){
                    $.ajax({
                        type: 'GET',
                        url: "?m=admin&c=user&a=biaoji&id=" + user_id + "&state=" + state,
                        success: function () {
                            layer.msg('?????????????????????', {icon: 6, shade: [0.5, '#393D49']},function(){
                                location.reload();
                            });
                        }
                    });
                    layer.close(index);
                });
            }

            //????????????
            function jd(state, user_id) {
                var msg = (state==0)?"??????????????????????":"??????????????????????";
                layer.confirm(msg, function(index){
                    //do something
                    $.ajax({
                        type: 'GET',
                        url: '?m=admin&c=user&a=biaoji&id=' + user_id + '&state=' + state,
                        success: function () {
                            layer.msg('?????????????????????', {icon: 6, shade: [0.5, '#393D49']},function(){
                                location.reload();
                            });
                        }
                    });
                    layer.close(index);
                });

            }
        </script>
    </body>
</html>