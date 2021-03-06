<?php

/**
 * 返回附件类型图标
 * @param $file 附件名称
 * @param $type png为大图标，gif为小图标
 */
function file_icon($file, $type = 'png') {
    $ext_arr = array('doc', 'docx', 'ppt', 'xls', 'txt', 'pdf', 'mdb', 'jpg', 'gif', 'png', 'bmp', 'jpeg', 'rar', 'zip', 'swf', 'flv');
    $ext = fileext($file);
    if ($type == 'png') {
        if ($ext == 'zip' || $ext == 'rar')
            $ext = 'rar';
        elseif ($ext == 'doc' || $ext == 'docx')
            $ext = 'doc';
        elseif ($ext == 'xls' || $ext == 'xlsx')
            $ext = 'xls';
        elseif ($ext == 'ppt' || $ext == 'pptx')
            $ext = 'ppt';
        elseif ($ext == 'flv' || $ext == 'swf' || $ext == 'rm' || $ext == 'rmvb')
            $ext = 'flv';
        else
            $ext = 'do';
    }
    if (in_array($ext, $ext_arr))
        return 'statics/images/ext/' . $ext . '.' . $type;
    else
        return 'statics/images/ext/blank.' . $type;
}

/**
 * 附件目录列表，暂时没用
 * @param $dirpath 目录路径
 * @param $currentdir 当前目录
 */
function file_list($dirpath, $currentdir) {
    $filepath = $dirpath . $currentdir;
    $list['list'] = glob($filepath . DIRECTORY_SEPARATOR . '*');
    if (!empty($list['list']))
        rsort($list['list']);
    $list['local'] = str_replace(array(GO_PATH, DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR), array('', DIRECTORY_SEPARATOR), $filepath);
    return $list;
}

/**
 * flash上传初始化
 * 初始化swfupload上传中需要的参数
 * @param $module 模块名称
 * @param $catid 栏目id
 * @param $args 传递参数
 * @param $userid 用户id
 * @param $groupid 用户组id
 * @param $isadmin 是否为管理员模式
 */
function initupload($module, $args, $userid, $isadmin = '0') {
    if ($isadmin == 0 && !$userid)
        return false;
    extract(getswfinit($args));
	$userid = dencrypt($userid.",".time(),'ENCODE');//userid+时间戳
    $file_size_limit = C('upload_maxsize');
    $sess_id = SYS_TIME;
    $swf_auth_key = md5(C('auth_key') . $sess_id);
    $init = 'var swfu = \'\';
		$(document).ready(function(){
		swfu = new SWFUpload({
			flash_url:"' . CDN_PATH . 'js/swfupload/swfupload.swf?"+Math.random(),
			upload_url:"' . APP_PATH . 'index.php?m=attachment&c=attachments&a=swfupload&dosubmit=1",
			file_post_name : "Filedata",
			post_params:{"SWFUPLOADSESSID":"' . $sess_id . '","module":"' . $module . '","userid":"' . $userid . '","dosubmit":"1","thumb_width":"' . $thumb_width . '","thumb_height":"' . $thumb_height . '","watermark_enable":"' . $watermark_enable . '","filetype_post":"' . $file_types_post . '","swf_auth_key":"' . $swf_auth_key . '","isadmin":"' . $isadmin . '"},
			file_size_limit:"' . $file_size_limit . '",
			file_types:"' . $file_types . '",
			file_types_description:"All Files",
			file_upload_limit:"' . $file_upload_limit . '",
			custom_settings : {progressTarget : "fsUploadProgress",cancelButtonId : "btnCancel"},

			button_image_url: "",
			button_width: 75,
			button_height: 28,
			button_placeholder_id: "buttonPlaceHolder",
			button_text_style: "",
			button_text_top_padding: 3,
			button_text_left_padding: 12,
			button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
			button_cursor: SWFUpload.CURSOR.HAND,

			file_dialog_start_handler : fileDialogStart,
			file_queued_handler : fileQueued,
			file_queue_error_handler:fileQueueError,
			file_dialog_complete_handler:fileDialogComplete,
			upload_progress_handler:uploadProgress,
			upload_error_handler:uploadError,
			upload_success_handler:uploadSuccess,
			upload_complete_handler:uploadComplete
			});
		})';
    return $init;
}

/**
 * 读取swfupload配置类型
 * @param array $args flash上传配置信息
 */
function getswfinit($args) {
    $site_allowext = C('upfile_exts');
    $args = explode(',', $args);
    $arr['file_upload_limit'] = intval($args[0]) ? intval($args[0]) : '8';
    $arr_allowext = ($args[1] != '') ? explode('|', $args[1]) : explode(',', $site_allowext);
    foreach ($arr_allowext as $k => $v) {
        $v = '*.' . $v;
        $array[$k] = $v;
    }
    $upload_allowext = implode(';', $array);
    $arr['file_types'] = $upload_allowext;
    $arr['file_types_post'] = $args[1];
    $arr['allowupload'] = intval($args[2]);
    $arr['thumb_width'] = $args[3] ? intval($args[3]) : C('thumb_width');
    $arr['thumb_height'] = $args[4] ? intval($args[4]) : C('thumb_height');
    $arr['watermark_enable'] = ($args[5] == '') ? 1 : intval($args[5]);
    return $arr;
}

/**
 * 判断是否为图片
 */
function is_image($file) {
    $ext_arr = array('jpg', 'gif', 'png', 'bmp', 'jpeg', 'tiff');
    $ext = fileext($file);
    return in_array($ext, $ext_arr) ? $ext_arr : false;
}

/**
 * 判断是否为视频
 */
function is_video($file) {
    $ext_arr = array('rm', 'mpg', 'avi', 'mpeg', 'wmv', 'flv', 'asf', 'rmvb');
    $ext = fileext($file);
    return in_array($ext, $ext_arr) ? $ext_arr : false;
}

?>